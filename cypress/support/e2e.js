
Cypress.Commands.add("inertiaProps", () => {
  return cy
    .get("#app")
    .invoke("attr", "data-page")
    .then((raw) => {
      expect(raw, "Inertia data-page").to.be.a("string");

      return JSON.parse(raw).props;
    });
});
