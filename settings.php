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
 * Setting page for the Quick Course List block
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

defined('MOODLE_INTERNAL') || die();

global $ADMIN;

if ($ADMIN->fulltree) {

    $settings->add(
        new admin_setting_heading(
            'block_quickcourselist/displaymode',
            get_string('displaymode', 'block_quickcourselist'),
            ''
        )
    );

    // Possible display modes.
    $displaymode[1] = get_string('shortnamecourse', 'moodle');
    $displaymode[2] = get_string('fullnamecourse', 'moodle');
    $displaymode[3] = $displaymode[2] . ' & ' . $displaymode[1];
    $displaymode[4] = $displaymode[2] . ' & ' . get_string('coursestartdate', 'block_quickcourselist');
    $displaymode[5] = $displaymode[2] . ' & ' . get_string('coursecategory', 'block_quickcourselist');
    $displaymode[6] = $displaymode[1] . ' & ' . $displaymode[5];

    $settings->add(
        new admin_setting_configselect(
            'block_quickcourselist/displaymode', get_string('displaymode', 'block_quickcourselist'),
            get_string('displaymodedescription', 'block_quickcourselist'), $displaymode[4], $displaymode
        )
    );

    $settings->add(
        new admin_setting_heading(
            'block_quickcourselist/title',
            get_string('title', 'block_quickcourselist'),
            ''
        )
    );

    $settings->add(
        new admin_setting_configtext(
            'block_quickcourselist/title',
            get_string('title', 'block_quickcourselist'),
            '',
            get_string('blockname', 'block_quickcourselist')
        )
    );

    $settings->add(
        new admin_setting_heading(
            'block_quickcourselist/splitterms',
            get_string('splitterms', 'block_quickcourselist'),
            ''
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            'block_quickcourselist/splitterms',
            get_string('splitterms', 'block_quickcourselist'),
            get_string('splittermsdescription', 'block_quickcourselist'),
            0
        )
    );

    $settings->add(
        new admin_setting_heading(
            'block_quickcourselist/restrictcontext',
            get_string('restrictcontext', 'block_quickcourselist'),
            ''
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            'block_quickcourselist/restrictcontext',
            get_string('restrictcontext', 'block_quickcourselist'),
            get_string('restrictcontextdescription', 'block_quickcourselist'),
            0
        )
    );
}
