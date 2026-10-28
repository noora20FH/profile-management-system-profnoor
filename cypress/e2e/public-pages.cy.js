const publicPages = [
  { path: "/", name: "Beranda" },
  { path: "/rekam-jejak", name: "Rekam Jejak" },
  { path: "/penelitian", name: "Penelitian" },
  { path: "/mata-kuliah", name: "Pengajaran" },
  { path: "/pengabdian", name: "Pengabdian" },
  { path: "/publikasi", name: "Publikasi" },
];


describe("Smoke Test - Halaman Publik", () => {
  publicPages.forEach(({ path, name }) => {
    it(`halaman ${name} mengembalikan 200`, () => {
      cy.request(path).its("status").should("eq", 200);
    });

    it(`halaman ${name} merender layout utama`, () => {
      cy.visit(path);

      // Layout root selalu ada
      cy.get(".page, main", { timeout: 10000 }).should("exist");

      // Navigasi & footer konsisten di semua halaman fitur
      cy.get('nav[aria-label="Navigasi utama"]').should("exist");
      cy.get("footer").should("exist");

      // Heading: cari h1 di mana pun, jangan bergantung pada <main>
      cy.get("h1", { timeout: 10000 })
        .first()
        .should("be.visible")
        .invoke("text")
        .then((text) => {
          expect(text.trim()).not.to.equal("");
        });

      // Pastikan bukan halaman 404
      cy.contains("404").should("not.exist");
    });
  });

  it("navigasi Penelitian mengarah ke URL yang benar", () => {
    cy.visit("/");

    cy.get('nav[aria-label="Navigasi utama"]')
      .contains("a", "Penelitian")
      .click();

    cy.location("pathname").should("eq", "/penelitian");

    cy.get(".listing-title h1", { timeout: 10000 })
      .should("be.visible")
      .and("contain.text", "Penelitian");
  });
});