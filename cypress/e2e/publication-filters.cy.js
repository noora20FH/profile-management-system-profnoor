const YEAR_SELECT = 'select[aria-label="Filter berdasarkan tahun"]';
const TYPE_FILTER = ".publication-filter";

// Selector sesuai app.css
const PUB_CARD  = ".publication-card";   // kartu publikasi
const PUB_EMPTY = ".publication-empty";  // empty state

// Mirror konstanta `filters` di PublicationFilter.tsx
// ⬇️ SELALU pisahkan `value` (dipakai state) dan `label` (teks tombol)
const TYPE_FILTERS = [
  { value: "all",               label: "Semua" },
  { value: "artikel_jurnal",    label: "Artikel Jurnal" },
  { value: "artikel_prosiding", label: "Artikel Prosiding" },
  { value: "paten",             label: "Paten" },
  { value: "hak_cipta",         label: "Hak Cipta" },
  { value: "prototipe",         label: "Prototipe" },
  { value: "ttg",               label: "Teknologi Tepat Guna" },
  { value: "buku",              label: "Buku" },
];

// Mirror logika PublicationPage + FeaturePageLayout
function expectedPublications(publicationItems, yearFilter, typeFilter) {
  const mapped = publicationItems.map((i) => ({
    id: String(i.id),
    year: i.year ?? "",
  }));

  const validIds = new Set(
    mapped
      .filter((i) => {
        if (yearFilter === "all") return true;
        if (yearFilter === "previous") return Number(i.year) < 2023;
        return String(i.year) === String(yearFilter);
      })
      .map((i) => i.id),
  );

  return publicationItems
    .filter((p) => validIds.has(String(p.id)))
    .filter((p) => typeFilter === "all" || p.type === typeFilter);
}

// Helper dengan guard empty state — cek .publication-empty, bukan .publication-list
function assertPublicationList(expectedItems) {
  const count = expectedItems.length;

  if (count === 0) {
    cy.get(PUB_CARD).should("have.length", 0);
    cy.get(PUB_EMPTY).should("exist"); // ← empty state adalah skenario sah
    return;
  }

  cy.get(PUB_EMPTY).should("not.exist");
  cy.get(PUB_CARD).should("have.length", count);

  // Verifikasi urutan judul (PublicationList merender <h3> di dalam .publication-card)
  cy.get(`${PUB_CARD} h3`).then(($titles) => {
    const actual = Array.from($titles).map((el) => el.textContent.trim());
    const expected = expectedItems.map((p) => p.title);
    expect(actual).to.deep.equal(expected);
  });
}

describe("Filter pada Halaman Publikasi", () => {
  beforeEach(() => {
    cy.visit("/publikasi");
    cy.get(YEAR_SELECT).should("be.visible");
    cy.get(TYPE_FILTER).should("exist");
  });

  it("default: 'all' + Semua, tampil semua publikasi", () => {
    cy.get(YEAR_SELECT).should("have.value", "all");
    cy.get(`${TYPE_FILTER} button.active`)
      .should("have.length", 1)
      .and("contain.text", "Semua");

    cy.inertiaProps().then((props) => {
      const items = expectedPublications(props.publication.items, "all", "all");
      assertPublicationList(items);
    });
  });

  // ⬇️ Satu test per tahun × iterasi tipe, mudah dilokalisasi jika gagal
  ["2026", "2025", "2024", "2023", "previous"].forEach((year) => {
    it(`filter tahun "${year}" untuk semua tipe`, () => {
      cy.inertiaProps().then((props) => {
        const publicationItems = props.publication.items;

        cy.get(YEAR_SELECT).select(year);

        TYPE_FILTERS.forEach(({ value, label }) => {
          cy.get(TYPE_FILTER).contains("button", label).click();

          const expected = expectedPublications(publicationItems, year, value);

          if (expected.length === 0) {
            cy.log(`Tahun ${year} + "${label}": kosong → verifikasi empty state`);
          } else {
            cy.log(`Tahun ${year} + "${label}": ${expected.length} item`);
          }

          assertPublicationList(expected);
        });
      });
    });
  });

  it("klik chip tipe 'Semua' mereset filter tipe", () => {
    cy.get(TYPE_FILTER).contains("button", "Paten").click();
    cy.get(`${TYPE_FILTER} button.active`).should("contain.text", "Paten");

    cy.get(TYPE_FILTER).contains("button", "Semua").click();
    cy.get(`${TYPE_FILTER} button.active`).should("contain.text", "Semua");
  });

  it("sinkronisasi chip tahun ↔ select di halaman publikasi", () => {
    cy.get(".filter-chips button")
      .filter((_, el) => el.textContent.trim() === "2025")
      .click();
    cy.get(YEAR_SELECT).should("have.value", "2025");
  });
});