const publicPages = [
  { path: "/", name: "Beranda" },
  { path: "/rekam-jejak", name: "Rekam Jejak" },
  { path: "/penelitian", name: "Penelitian" },
  { path: "/mata-kuliah", name: "Pengajaran" },
  { path: "/pengabdian", name: "Pengabdian" },
  { path: "/publikasi", name: "Publikasi" },
];



// ============================================================
// 2. RESPONSIVE MOBILE - viewport iPhone X (375x812)
// ============================================================
describe("Responsive - Mobile", () => {
  beforeEach(() => {
    // 375x812 (iPhone X). Bisa diganti ke 'iphone-se2' (375x667)
    // atau [width, height] jika ingin breakpoint kustom.
    cy.viewport("iphone-x");
  });

  publicPages.forEach(({ path, name }) => {
    it(`halaman ${name} tidak overflow horizontal di mobile`, () => {
      cy.visit(path);

      // Pastikan lebar dokumen tidak melebihi viewport.
      // Toleransi +1 px untuk pembulatan sub-pixel.
      cy.document().then((doc) => {
        const root = doc.documentElement;
        expect(root.scrollWidth).to.be.at.most(root.clientWidth + 1);
      });
    });

    it(`halaman ${name} menampilkan hamburger dan menyembunyikan nav desktop`, () => {
      cy.visit(path);

      // Tombol hamburger harus terlihat di mobile
      cy.get(".menu-toggle")
        .should("be.visible")
        .and("have.attr", "aria-expanded", "false")
        .and("have.attr", "aria-controls", "mobile-navigation");

      // Menu desktop harus benar-benar display:none di mobile.
      // Cek via getComputedStyle, karena Cypress menganggap elemen
      // dengan transform/opacity masih "visible".
      cy.get(".primary-nav").should(($nav) => {
        expect(getComputedStyle($nav[0]).display).to.eq("none");
      });

      // Menu mobile dalam keadaan tertutup (tidak ada class "open")
      cy.get(".mobile-nav").should("not.have.class", "open");
    });
  });

  it("hamburger membuka menu mobile dan mengubah aria-expanded", () => {
    cy.visit("/");

    cy.get(".menu-toggle").click();
    cy.get(".menu-toggle").should("have.attr", "aria-expanded", "true");
    cy.get(".mobile-nav").should("have.class", "open");

    // Link di dalam menu mobile harus bisa diklik/terlihat
    cy.get(".mobile-nav.open a").contains("Penelitian").should("be.visible");
  });

  it("hamburger kedua menutup menu mobile kembali", () => {
    cy.visit("/");

    cy.get(".menu-toggle").click();
    cy.get(".mobile-nav").should("have.class", "open");

    cy.get(".menu-toggle").click();
    cy.get(".menu-toggle").should("have.attr", "aria-expanded", "false");
    cy.get(".mobile-nav").should("not.have.class", "open");
  });

  it("klik link di menu mobile menavigasi dan menutup menu", () => {
    cy.visit("/");

    cy.get(".menu-toggle").click();
    cy.get(".mobile-nav.open a").contains("Penelitian").click();

    cy.location("pathname").should("eq", "/penelitian");
    cy.get(".mobile-nav").should("not.have.class", "open");
    cy.get(".listing-title h1").should("be.visible");
  });

  it("gambar tidak melebihi lebar viewport mobile", () => {
    cy.visit("/");

    cy.get("img").each(($img) => {
      const width = $img[0].getBoundingClientRect().width;
      expect(width).to.be.at.most(Cypress.config("viewportWidth"));
    });
  });
});

// ============================================================
// 3. RESPONSIVE DESKTOP - viewport 1280x800
// ============================================================
describe("Responsive - Desktop", () => {
  beforeEach(() => {
    cy.viewport(1280, 800);
  });

  it("hamburger tersembunyi dan nav desktop tampil", () => {
    cy.visit("/");

    // Tombol hamburger harus disembunyikan di desktop
    cy.get(".menu-toggle").should(($btn) => {
      expect(getComputedStyle($btn[0]).display).to.eq("none");
    });

    // Nav desktop harus terlihat
    cy.get(".primary-nav").should(($nav) => {
      expect(getComputedStyle($nav[0]).display).not.to.eq("none");
    });
  });
});

describe("Responsive - Tablet", () => {
  beforeEach(() => cy.viewport("ipad-2"));
  it("layout tablet tidak overflow", () => {
    cy.visit("/");
    cy.document().then((doc) => {
      const r = doc.documentElement;
      expect(r.scrollWidth).to.be.at.most(r.clientWidth + 1);
    });
  });
});