# Quick Course List Block Tests

This directory contains Behat tests for the Quick Course List block functionality.

## Test Files

### Active Tests
- `basic_search.feature`: Tests the basic non-JavaScript search functionality using the search button
- `simple_search.feature`: Tests the JavaScript-based AJAX search functionality

### Disabled Tests
- `ajax.feature.disabled`: Original complex AJAX tests (disabled)
- `quickcourselist.feature.disabled`: Original basic tests (disabled)

## Running the Tests

To run the tests locally:

```bash
# Run all tests
php admin/tool/behat/cli/run.php --tags="block_quickcourselist"

# Run only JavaScript tests
php admin/tool/behat/cli/run.php --tags="@javascript&&@block_quickcourselist"

# Run only non-JavaScript tests
php admin/tool/behat/cli/run.php --tags="@block_quickcourselist&&~@javascript"
```

## Test Development Notes

- The JavaScript tests can be sensitive to timing issues. If tests fail, consider adjusting the wait times.
- For debugging: `php admin/tool/behat/cli/run.php -vvv --tags="@block_quickcourselist" --suite="default"`
