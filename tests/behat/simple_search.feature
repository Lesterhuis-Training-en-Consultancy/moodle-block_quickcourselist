@block @block_quickcourselist @javascript
Feature: Quick course list block search functionality
  In order to navigate to courses quickly
  As an admin
  I need to be able to search for courses using the quick course list block

  Background:
    Given the following "categories" exist:
      | name  | category | idnumber |
      | Cat A | 0        | CATA     |
      | Cat B | 0        | CATB     |
    And the following "courses" exist:
      | fullname      | shortname | category |
      | Test Course 1 | TC1       | CATA     |
      | Test Course 2 | TC2       | CATB     |
    And I log in as "admin"
    And I am on site homepage
    And I turn editing mode on
    And I add the "EF Quick Course List" block
    And I configure the "EF Quick Course List" block
    And I set the field "Display on page types" to "Any page"
    And I press "Save changes"

  @block_quickcourselist_basic
  Scenario: Search for a course
    When I set the field "efquicklistsearch" to "Test"
    And I wait "5" seconds
    Then I should see "TC1: Test Course 1" in the "block_quickcourselist" "block"
    And I should see "TC2: Test Course 2" in the "block_quickcourselist" "block"
