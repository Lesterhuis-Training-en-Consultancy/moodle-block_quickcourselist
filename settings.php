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
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.	 See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {

	$settings->add(new admin_setting_heading('block_efquicklist/displaymode', get_string('displaymode', 'block_efquicklist'), ''));

	// Possible display modes
	$displaymode[1] = get_string('shortnamecourse', 'moodle');
	$displaymode[2] = get_string('fullnamecourse', 'moodle');
	$displaymode[3] = $displaymode[2].' & '.$displaymode[1];
        $displaymode[4] = $displaymode[2].' & '. get_string('coursestartdate', 'block_efquicklist');

	$settings->add(new admin_setting_configselect('block_efquicklist/displaymode', get_string('displaymode', 'block_efquicklist'), 
						get_string('displaymodedescription', 'block_efquicklist'), $displaymode[4], $displaymode));

	$settings->add(new admin_setting_heading('block_efquicklist/title', get_string('title', 'block_efquicklist'), ''));

	$settings->add(new admin_setting_configtext('block_efquicklist/title', get_string('title', 'block_efquicklist'), '', get_string('blockname', 'block_efquicklist')));
    
	$settings->add(new admin_setting_heading('block_efquicklist/splitterms', get_string('splitterms', 'block_efquicklist'), ''));

	$settings->add(new admin_setting_configcheckbox('block_efquicklist/splitterms', get_string('splitterms', 'block_efquicklist'), get_string('splittermsdescription', 'block_efquicklist'), 0));
    
	$settings->add(new admin_setting_heading('block_efquicklist/restrictcontext', get_string('restrictcontext', 'block_efquicklist'), ''));

	$settings->add(new admin_setting_configcheckbox('block_efquicklist/restrictcontext', get_string('restrictcontext', 'block_efquicklist'), get_string('restrictcontextdescription', 'block_efquicklist'), 0));
}