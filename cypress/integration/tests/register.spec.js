/// <reference types="Cypress" />

Cypress.on('uncaught:exception', (err, runnable) => {
    // returning false here prevents Cypress from
    // failing the test
    return false
  })
describe('User register', () => {
  it('User should be created and access to the portal', () => {
      cy.visit('http://127.0.0.1:8000/').wait(3)
      cy.get('.navbar-nav > :nth-child(2) > .btn').click()
      cy.get(':nth-child(3) > .form-control').type('Emiliano')
      cy.get(':nth-child(4) > .form-control').type('dd@gmail.mx')
      cy.get(':nth-child(5) > .form-control').type('12345')
      cy.get(':nth-child(6) > .form-control').type('12345')
      cy.get(':nth-child(7) > .btn').click().wait(8)
      cy.get(':nth-child(3) > .form-control').type('dd@gmail.mx')
      cy.get(':nth-child(4) > .form-control').type('12345')
      cy.get(':nth-child(5) > .btn').click()
      cy.get('h4 > .btn-secundary').should('contain', 'Emiliano')
  })
})
