
describe("Keamanan Akses Panel Admin", () => {
  it("pengunjung tanpa login diminta melakukan autentikasi", () => {
    cy.visit("/admin/login");

    cy.location("pathname")
      .should("match", /\/admin\/login\/?$/);

    cy.get('input[type="email"]')
      .should("be.visible");

    cy.get('input[type="password"]')
      .should("be.visible");
  });
});
