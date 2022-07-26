describe("Visit Contect Us Form", () => {
  it("passes", () => {
    cy.visit("http://localhost:8000");

    cy.get('input[type="text"]')
      .type("Yeap Khor Chin")
      .should("have.value", "Yeap Khor Chin");

    cy.get('input[type="email"]')
      .type("fake@email.com")
      .should("have.value", "fake@email.com");

    cy.get("textarea")
      .type(
        "Lorem ipsum dolor sit amet consectetur adipiscing elit, aenean non a in donec nulla. Phasellus aliquam, integer placerat et turpis mi eros nec lobortis taciti, vehicula nisl litora porttitor metus."
      )
      .should(
        "have.value",
        "Lorem ipsum dolor sit amet consectetur adipiscing elit, aenean non a in donec nulla. Phasellus aliquam, integer placerat et turpis mi eros nec lobortis taciti, vehicula nisl litora porttitor metus."
      );

    // cy.contains("Submit").click();
  });
});
