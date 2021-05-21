/// <reference types="Cypress" />

Cypress.on('uncaught:exception', (err, runnable) => {
    // returning false here prevents Cypress from
    // failing the test
    return false
  })

  describe('Leave a comment on a Comic', () => {
    it('User should write a comment and post it', () => {
        cy.visit('http://127.0.0.1:8000/').wait(3)
        cy.get('.navbar-nav > :nth-child(2) > .btn').click()
        cy.get(':nth-child(3) > .form-control').type('Emiliano')
        cy.get(':nth-child(4) > .form-control').type('ff@gmail.mx')
        cy.get(':nth-child(5) > .form-control').type('12345')
        cy.get(':nth-child(6) > .form-control').type('12345')
        cy.get(':nth-child(7) > .btn').click().wait(8)
        cy.get(':nth-child(3) > .form-control').type('ff@gmail.mx')
        cy.get(':nth-child(4) > .form-control').type('12345')
        cy.get(':nth-child(5) > .btn').click()
        cy.get(':nth-child(1) > .card-deck > .card > .card-body > .card-title').click()
        cy.get('input[type=text]').type('Great commic')
        cy.get('.col > .btn').click()
        cy.get('#tableRow5 > td > :nth-child(1) > .col').should('contain', 'Emiliano')
    })
  })
