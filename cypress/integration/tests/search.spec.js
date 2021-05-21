/// <reference types="Cypress" />

Cypress.on('uncaught:exception', (err, runnable) => {
    // returning false here prevents Cypress from
    // failing the test
    return false
  })

  describe('Search for a comic and see it', () => {
    it('User should search for a comic and see it', () => {
        cy.visit('http://127.0.0.1:8000/series').wait(3)
        cy.get('.form-control').type('Hulk')
        cy.get('.input-group > .btn').click().wait(7)
        cy.get(':nth-child(2) > .card-deck > .card > .card-body > .card-title').click()
        cy.get('h1').should('contain', 'Incredible Hulk')
    })
  })

