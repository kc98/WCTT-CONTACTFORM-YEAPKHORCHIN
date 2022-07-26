/// <reference types="Cypress" />
describe("Contect Us Form", () => {

  it('submits a valid form', () => {
    cy.intercept('/form').as('submitForm');
    cy.visit("http://localhost:8000");

    cy.get('div.py-2:nth-child(1) > input:nth-child(2)')
      .type("Yeap Khor Chin");

    cy.get('div.py-2:nth-child(2) > input:nth-child(2)')
      .type("fake@email.com");

    cy.get("textarea.font-mono")
      .type("Test description");
    
    cy.get("#submitButton").click();
    
    cy.wait('@submitForm');
    cy.get(".block")
      .should("have.text", "Thank you for filling out your information!");
  });

  it('submits form with empty name', () => {
    cy.visit("http://localhost:8000");

    cy.get('div.py-2:nth-child(1) > input:nth-child(2)');

    cy.get('div.py-2:nth-child(2) > input:nth-child(2)')
      .type("fake@email.com");

    cy.get("textarea.font-mono")
      .type("Test description");
    
    cy.get("#submitButton").click();

    cy.get("div.py-2:nth-child(1) > input:nth-child(2)").then((input) => {
      expect(input[0].validationMessage).to.eq('Please fill out this field.');
    });
  });

  it('submits form with empty email', () => {
    cy.visit("http://localhost:8000");

    cy.get('div.py-2:nth-child(1) > input:nth-child(2)')
      .type("Yeap Khor Chin");

    cy.get('div.py-2:nth-child(2) > input:nth-child(2)');

    cy.get("textarea.font-mono")
      .type("Test description");
    
    cy.get("#submitButton").click();

    cy.get("div.py-2:nth-child(2) > input:nth-child(2)").then((input) => {
      expect(input[0].validationMessage).to.eq('Please fill out this field.');
    });
  });

  it('submits form with empty description', () => {
    cy.visit("http://localhost:8000");

    cy.get('div.py-2:nth-child(1) > input:nth-child(2)')
      .type("Yeap Khor Chin");

    cy.get('div.py-2:nth-child(2) > input:nth-child(2)')
      .type("fake@email.com");

    cy.get("textarea.font-mono");
    
    cy.get("#submitButton").click();

    cy.get("textarea.font-mono").then((input) => {
      expect(input[0].validationMessage).to.eq('Please fill out this field.');
    });
  });

  it('submits a form with invalid email', () => {
    cy.visit("http://localhost:8000");

    cy.get('div.py-2:nth-child(1) > input:nth-child(2)')
      .type("Yeap Khor Chin");

    cy.get('div.py-2:nth-child(2) > input:nth-child(2)')
      .type("fake");

    cy.get("textarea.font-mono")
      .type("Test description");
    
    cy.get("#submitButton").click();
    
    cy.get("div.py-2:nth-child(2) > input:nth-child(2)").then((input) => {
      expect(input[0].validationMessage).to.have.value
    });
  });
});
