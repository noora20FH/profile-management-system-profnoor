describe("Login CMS Filament", () => {
  it("berhasil login dengan kredensial valid dan masuk ke dashboard", () => {
    cy.env(["ADMIN_EMAIL", "ADMIN_PASSWORD"]).then(
      ({ ADMIN_EMAIL, ADMIN_PASSWORD }) => {
        cy.visit("/admin/login", { timeout: 60000 });
        cy.get("#form\\.email").clear().type(ADMIN_EMAIL, { log: false });
        cy.get("#form\\.password").clear().type(ADMIN_PASSWORD, { log: false });
        cy.get('button[type="submit"]').click();

        cy.location("pathname", { timeout: 60000 }).should("not.match", /\/admin\/login\/?$/);
        cy.contains(/Dasbor|Academic Profile CMS/i, { timeout: 60000 }).should("exist");
      }
    );
  });

  it("menolak login dengan password salah", () => {
    cy.env(["ADMIN_EMAIL"]).then(({ ADMIN_EMAIL }) => {
      cy.visit("/admin/login", { timeout: 60000 });
      cy.get("#form\\.email").type(ADMIN_EMAIL, { log: false });
      cy.get("#form\\.password").type("password-salah", { log: false });
      cy.get('button[type="submit"]').click();

      cy.location("pathname", { timeout: 60000 }).should("match", /\/admin\/login\/?$/);
      cy.contains(/kredensial|credentials|tidak cocok|incorrect/i, { timeout: 60000 }).should("be.visible");
    });
  });

  it("menolak submit form kosong", () => {
    cy.visit("/admin/login", { timeout: 60000 });
    cy.get('button[type="submit"]').click();

    // PERBAIKAN: Cek native HTML5 validation message
    cy.get("#form\\.email").then(($input) => {
      expect($input[0].validationMessage).to.not.be.empty;
    });
    
    cy.location("pathname").should("match", /\/admin\/login\/?$/);
  });

  it("setelah login, halaman admin lain dapat diakses", () => {
    // Pastikan import commands sudah benar agar ini tidak error
    cy.loginAdmin(); 

    cy.visit("/admin/courses", { timeout: 60000 });
    cy.location("pathname", { timeout: 60000 }).should("not.match", /\/login/);
    cy.get("body").should("be.visible");

        cy.visit("/admin/outreaches", { timeout: 60000 });
    cy.location("pathname", { timeout: 60000 }).should("not.match", /\/login/);
    cy.get("body").should("be.visible");

        cy.visit("/admin/profiles", { timeout: 60000 });
    cy.location("pathname", { timeout: 60000 }).should("not.match", /\/login/);
    cy.get("body").should("be.visible");

            cy.visit("/admin/publications", { timeout: 60000 });
    cy.location("pathname", { timeout: 60000 }).should("not.match", /\/login/);
    cy.get("body").should("be.visible");

            cy.visit("/admin/profiles", { timeout: 60000 });
    cy.location("pathname", { timeout: 60000 }).should("not.match", /\/login/);
    cy.get("body").should("be.visible");

  });
});