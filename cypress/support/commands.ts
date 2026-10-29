/// <reference types="cypress" />
export {};

// cypress/support/commands.ts
declare global {
  namespace Cypress {
    interface Chainable {
      loginAdmin(email?: string, password?: string): Chainable<void>;
    }
  }
}
Cypress.Commands.add("loginAdmin", (email?: string, password?: string) => {
  // Gunakan cy.env() untuk mengambil nilai sensitif saat dibutuhkan
  cy.env(["ADMIN_EMAIL", "ADMIN_PASSWORD"]).then((envVars) => {
    const emailToUse = email || envVars.ADMIN_EMAIL;
    const passwordToUse = password || envVars.ADMIN_PASSWORD;

    if (!emailToUse || !passwordToUse) {
      throw new Error(
        "Kredensial admin tidak ditemukan di environment variables.",
      );
    }

    cy.session(
      [emailToUse, passwordToUse],
      () => {
        cy.visit("/admin/login", { timeout: 60000 });

        cy.get("#form\\.email", { timeout: 60000 })
          .should("be.visible")
          .clear()
          .type(emailToUse, { log: false });

        cy.get("#form\\.password", { timeout: 60000 })
          .should("be.visible")
          .clear()
          .type(passwordToUse, { log: false });

        cy.get('button[type="submit"]', { timeout: 60000 })
          .should("be.visible")
          .and("not.be.disabled")
          .click();

        cy.location("pathname", { timeout: 60000 }).should(
          "not.match",
          /\/admin\/login\/?$/,
        );
      },
      {
        cacheAcrossSpecs: true,
      },
    );
  });
});
