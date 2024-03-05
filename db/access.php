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
 * Defines the block/quickcourselist:use capability for the Quick Course List block
 *
 * @package     block_quickcourselist
 * @author      Mark Johnson <mark.johnson@tauntons.ac.uk> v2.0
 * @author      Onno Schuit v2.1 commissioned by Lesterhuis Training en Consultancy
 * @author      Luuk Verhoeven v3.8 to 4.2.0 commissioned by Lesterhuis Training en Consultancy
 * @author      Gemma Lesterhuis v3.10.2 commissioned by Lesterhuis Training en Consultancy
 * @copyright   2010 Tauntons College, UK v2.0 and Lesterhuis Training en Consultancy v2.1 and further
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later till v2.1, for other versions Freeware
 *              https://ltnc.nl/ltc-plugin-freeware-licentie
 */

defined('MOODLE_INTERNAL') || die;

$capabilities = [

    'block/quickcourselist:use' => [

        'captype' => 'view',
        'contextlevel' => CONTEXT_SYSTEM,
        'legacy' => [
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'coursecreator' => CAP_ALLOW,
            'manager' => CAP_ALLOW,
        ],
    ],
    'block/quickcourselist:myaddinstance' => [
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => [
            'manager' => CAP_ALLOW,
        ],
    ],
    'block/quickcourselist:addinstance' => [
        'riskbitmask' => RISK_SPAM | RISK_XSS,
        'captype' => 'write',
        'contextlevel' => CONTEXT_BLOCK,
        'archetypes' => [
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW,
        ],
        'clonepermissionsfrom' => 'moodle/site:manageblocks',
    ],
];
