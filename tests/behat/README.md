# Quick Course List Block Behat Tests

This directory contains Behat tests for the Quick Course List block functionality.

## Test Files

- `simplified_tests.feature`: Basic tests for the Quick Course List block search functionality

## Running the Tests

To run the tests locally:

```bash
# Run all tests
php admin/tool/behat/cli/run.php --tags="block_quickcourselist"

# Run only JavaScript tests
php admin/tool/behat/cli/run.php --tags="@javascript&&@block_quickcourselist"
```
