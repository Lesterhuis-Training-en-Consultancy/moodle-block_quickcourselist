# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/)

# Plugin version.php information

```php
// Example

// Plugin release number corresponds to the lasest tested Moodle version in which the plugin has been tested.
$plugin->release = '3.5.7'; // [3.5.7]

// Plugin version number corresponds to the latest plugin version.
$plugin->version = 2019010100; // 2019-01-01
```

# How do I make a good changelog?

Guiding Principles

* Changelogs are for humans, not machines.
* There should be an entry for every single version.
* The same types of changes should be grouped.
* The latest version comes first.
* The release date of each version is displayed.

Types of changes

* **Added** for new features.
* **Changed** for changes in existing functionality.
* **Deprecated** for soon-to-be removed features.
* **Removed** for now removed features.
* **Fixed** for any bug fixes.
* **Security** in case of vulnerabilities.

## Version (4.4.1) - 2024-07-18
- Solves  Accessibility issue https://github.com/Lesterhuis-Training-en-Consultancy/moodle-block_quickcourselist/issues/1

## Version (4.4.0) - 2024-04-05
- Tested for Moodle 4.4 and PHP 8.1

## Version (4.3.0) - 2024-04-05
- Tested for Moodle 4.3 and PHP 8.1

## Version (4.2.0) - 2024-03-05
- Refactored and upgraded for Moodle 4.2

## Version (4.1.2) - 2023-03-19

##### Updated

- Refactor to block_quickcourselist
- Fix behat 
- Fix code guidelines
- Fix issues with query `splitterms` setting


## Version (4.1.1) - 2023-03-19

- 4.1 / PHP 80 check - no issues found
- Version bump

## Version (3.10.2) - 2022-03-25

##### Added

- Course Short name, Course Full name and Categorie format
- Adding new licentie agreement
- Version number no issue found in Moodle 3.11 and Moodle 4.0

## Version (3.10.1) - 2022-03-23

##### Added

- Course Full name and Categorie format
- Dutch translations

## Version (3.10) - 2020-11-13

##### Updated

- Version number no issues found in Moodle 3.10
- TODO convert to more Moodle standard format

##### Added

- Add some missing defined('MOODLE_INTERNAL') || die;

## Version (3.9) - 2020-05-09

##### Updated

- Version number no issues found in Moodle 3.9

## Version (3.8) - 2019-10-30

##### Updated

- Version number no issues found in Moodle 3.8

## Added

- Changelog in a separate file

## Version (2.1) - 2018-11-20

##### Added

- Release of the first official stable version.
