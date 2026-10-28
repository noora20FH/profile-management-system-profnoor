// ---------- Konstanta & resolver (sama seperti sebelumnya) ----------
const YEAR_SELECT = 'select[aria-label="Filter berdasarkan tahun"]';
const YEAR_OPTIONS = ["all", "2026", "2025", "2024", "2023", "previous"];

function resolveListingData(props, type) {
  const data = props.page ?? props[type];
  if (!data) throw new Error(`Missing listing data for ${type}`);
  return data;
}

function filterByYear(items, filter) {
  if (filter === "all") return items;
  if (filter === "previous") return items.filter((i) => Number(i.year) < 2023);
  return items.filter((i) => String(i.year) === String(filter));
}

// ---------- Helper: guard empty state ----------
function assertListingCards(expectedItems) {
  const count = expectedItems.length;
  cy.get(".listing-card").should("have.length", count);

  // ⬇️ Kunci perbaikan: berhenti sebelum menyentuh h2 jika 0 kartu
  if (count === 0) return;

  cy.get(".listing-card h2")
    .should("have.length", count)
    .then(($titles) => {
      const actual = Array.from($titles).map((el) => el.textContent.trim());
      const expected = expectedItems.map((i) => i.title);
      expect(actual).to.deep.equal(expected);
    });
}

// ---------- Helper: empty state sebagai skenario eksplisit ----------
function assertEmptyListing(filter) {
  cy.get(".listing-card").should("have.length", 0);
  // Struktur layout tetap utuh — tidak crash, tidak blank
  cy.get(".listing-grid").should("exist");
  cy.get(".listing-filter").should("exist");
  // Filter tetap reflect pilihan user
  cy.get(YEAR_SELECT).should("have.value", filter);
}

// ---------- Test generator ----------
const listingPages = [
  { path: "/penelitian", type: "research", name: "Penelitian" },
  { path: "/mata-kuliah", type: "courses", name: "Pengajaran" },
  { path: "/pengabdian", type: "outreach", name: "Pengabdian" },
];

describe("Filter Tahun - Halaman Listing", () => {
  listingPages.forEach(({ path, type, name }) => {
    describe(`${name} (${path})`, () => {
      beforeEach(() => {
        cy.visit(path);
        cy.get(YEAR_SELECT).should("be.visible");
      });

      it("opsi select sesuai listingFilters", () => {
        cy.get(YEAR_SELECT)
          .find("option")
          .then(($opts) => {
            expect(Array.from($opts).map((o) => o.value)).to.deep.equal(YEAR_OPTIONS);
          });
      });

      it("default state: 'all' dan semua item tampil", () => {
        cy.get(YEAR_SELECT).should("have.value", "all");
        cy.get(".filter-chips button.active").should("have.length", 1);

        cy.inertiaProps().then((props) => {
          const items = resolveListingData(props, type).items;
          assertListingCards(items);
        });
      });

      // ⬇️ Satu test per tahun, dengan dua jalur: ada data / kosong
      ["2026", "2025", "2024", "2023", "previous"].forEach((filter) => {
        it(`filter "${filter}" berperilaku benar (data ada atau kosong)`, () => {
          cy.inertiaProps().then((props) => {
            const items = resolveListingData(props, type).items;
            const expected = filterByYear(items, filter);

            cy.get(YEAR_SELECT).select(filter);

            if (expected.length === 0) {
              // Jalur empty state — tetap diverifikasi, bukan di-skip
              cy.log(`Filter "${filter}": tidak ada data → verifikasi empty state`);
              assertEmptyListing(filter);
            } else {
              // Jalur data — cek jumlah dan urutan judul
              assertListingCards(expected);
            }
          });
        });
      });

      it("reset ke 'all' mengembalikan semua item", () => {
        cy.inertiaProps().then((props) => {
          const items = resolveListingData(props, type).items;
          cy.get(YEAR_SELECT).select("2024");
          cy.get(YEAR_SELECT).select("all");
          assertListingCards(items);
        });
      });

      it("chip → select sinkron", () => {
        cy.get(".filter-chips button")
          .filter((_, el) => el.textContent.trim() === "2024")
          .click();
        cy.get(YEAR_SELECT).should("have.value", "2024");
      });

      it("select → chip sinkron", () => {
        cy.get(YEAR_SELECT).select("2023");
        cy.get(".filter-chips button.active")
          .should("have.length", 1)
          .invoke("text")
          .then((text) => expect(text.trim()).to.equal("2023"));
      });
    });
  });
});