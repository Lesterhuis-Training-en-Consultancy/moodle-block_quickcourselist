<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Defines lang strings for Quick Course List
 *
 * @package     block_quickcourselist
 * @author      Mark Johnson <mark.johnson@tauntons.ac.uk> v2.0
 * @author      Onno Schuit v2.1 commissioned by Lesterhuis Training en Consultancy
 * @author      Luuk Verhoeven v3.8 to 3.10.1 commissioned by Lesterhuis Training en Consultancy
 * @author      Gemma Lesterhuis v3.10.2 commissioned by Lesterhuis Training en Consultancy
 * @copyright   2010 Tauntons College, UK v2.0 and Lesterhuis Training en Consultancy v2.1 and further
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later till v2.1, for other versions Freeware
 *              https://ltnc.nl/ltc-plugin-freeware-licentie
 */
defined('MOODLE_INTERNAL') || die;

$string['blockname'] = 'Quick Course List';
$string['loading'] = 'Loading...';
$string['pluginname'] = 'Quick Course List';
$string['pluginnameplural'] = 'Quick Course Lists';
$string['quickcourselist:use'] = 'Use Quickcourse List';
$string['quickcourselist'] = 'Quick Course List';
$string['displaymode'] = 'Format of search results';
$string['displaymodedescription'] = 'In which way the results should be displayed.';
$string['title'] = 'Block Title';
$string['splitterms'] = 'Split search terms';
$string['splittermsdescription'] =
    'When enabled, terms seperated by spaces will be searched seperately, rather than as a complete phrase (e.g. "Course 101" will find "Course Maths 101" and "Course Science 101").  Enabling this may slow down searches on sites with lots of courses.';
$string['restrictcontext'] = 'Restrict results by category';
$string['restrictcontextdescription'] =
    'When enabled, only courses under the current category will be returned from searches on category pages.';
$string['coursestartdate'] = 'Start date';
$string['coursecategory'] = 'Category';
$string['quickcourselist:myaddinstance'] = 'Add a new quickcourselist block to Dashboard';
$string['quickcourselist:addinstance'] = 'Add a new quickcourselist block';
$string['privacy:metadata'] = 'The block_quickcourselist doesn\'t store any data.';
