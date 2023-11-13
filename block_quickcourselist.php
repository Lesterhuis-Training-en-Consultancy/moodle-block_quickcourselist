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
 * Defines the class for the Quick Course List block
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

/**
 * Class definition for the Quick Course List Block
 *
 * @uses block_base
 */
class block_quickcourselist extends block_base {

    /**
     * @var mixed hash-like object or single value, return false no config found
     */
    private $globalconf;

    /**
     * @return void
     */
    public function init() {
        $this->content_type = BLOCK_TYPE_TEXT;
        $this->globalconf = get_config('block_quickcourselist');

        if (isset($this->globalconf->title) && !empty($this->globalconf->title)) {
            $this->title = $this->globalconf->title;
        } else {
            $this->title = get_string('efquicklist', 'block_quickcourselist');
        }
    }

    /**
     * Stop it showing up on any add block lists
     *
     * @return array
     */
    public function applicable_formats(): array {
        return [
            'all' => false,
            'site' => true,
            'my' => true,
            'course-index' => true,
        ];
    }

    /**
     * Returns whether the current block has a configuration.
     *
     * @return true if the current view has a configuration, false otherwise
     */
    public function has_config(): bool {
        return true;
    }

    /**
     * Displays the form for searching courses, and the results if a search as been submitted
     *
     * @access public
     * @return object
     */
    public function get_content() {
        global $OUTPUT;
        if ($this->content !== null) {
            return $this->content;
        }

        $this->content = new stdClass();
        $context_block = context_block::instance($this->instance->id);
        $search = optional_param('efquicklistsearch', '', PARAM_TEXT);
        $quickcoursesubmit = optional_param('quickcoursesubmit', false, PARAM_TEXT);
        if (has_capability('block/efquicklist:use', $context_block)) {

            $list_contents = '';
            $anchor = html_writer::tag('a', '', ['name' => 'efquicklistanchor']);
            $inputattrs = [
                'autocomplete' => 'off',
                'name' => 'efquicklistsearch',
                'id' => 'efquicklistsearch',
                'value' => $search,
            ];
            $input = html_writer::empty_tag('input', $inputattrs);

            $progressattrs = [
                'src' => $OUTPUT->image_url('i/loading_small', 'moodle'),
                'class' => 'quickcourseprogress',
                'id' => 'quickcourseprogress',
                'alt' => get_string('loading', 'block_quickcourselist'),
            ];
            $progress = html_writer::empty_tag('img', $progressattrs);
            $submitattrs = [
                'type' => 'submit',
                'name' => 'quickcoursesubmit',
                'class' => 'submitbutton',
                'value' => get_string('search'),
            ];
            $submit = html_writer::empty_tag('input', $submitattrs);
            $formattrs = [
                'id' => 'quickcourseform',
                'method' => 'post',
                'action' => $this->page->url->out() . '#efquicklistanchor',
            ];
            $form = html_writer::tag('form', $input . $progress . $submit, $formattrs);

            if (!empty($quickcoursesubmit)) {

                $courses = self::get_courses(
                    $search,
                    $context_block,
                    $this->globalconf->splitterms,
                    $this->globalconf->restrictcontext,
                    $this->page->context
                );
                if (!empty($courses)) {
                    foreach ($courses as $course) {
                        $url = new moodle_url('/course/view.php', ['id' => $course->id]);
                        $resultstr = null;
                        if (isset($this->globalconf->displaymode)) {
                            $displaymode = $this->globalconf->displaymode;
                        } else {
                            $displaymode = 3;
                        }
                        switch ($displaymode):
                            case 1:
                                $resultstr = $course->shortname;
                                break;
                            case 2:
                                $resultstr = $course->fullname;
                                break;
                            case 5:
                                $resultstr = $course->fullname . ' - ' . $course->category;
                                break;
                            case 6:
                                $resultstr = $course->shortname . ' - ' . $course->fullname . ' - ' . $course->category;
                                break;
                            default:
                                $resultstr = $course->shortname . ': ' . $course->fullname;
                                break;
                        endswitch;

                        $link = html_writer::tag(
                            'a',
                            $resultstr,
                            ['href' => $url->out()]
                        );
                        $li = html_writer::tag('li', $link);
                        $list_contents .= $li;
                    }
                }
            }
            if (!isset($this->globalconf->displaymode)) {
                $this->globalconf->displaymode = '3';
            }
            $list = html_writer::tag('ul', $list_contents, ['id' => 'efquicklist']);

            $this->content->text = $anchor . $form . $list;

            $jsmodule = [
                'name' => 'block_quickcourselist',
                'fullpath' => '/blocks/efquicklist/module.js',
                'requires' => ['base', 'node', 'json', 'io'],
            ];
            $jsdata = [
                'instanceid' => $this->instance->id,
                'sesskey' => sesskey(),
                'displaymode' => $this->globalconf->displaymode,
                'contextid' => $this->page->context->id,
            ];

            $this->page->requires->js_init_call(
                'M.block_quickcourselist.init',
                $jsdata,
                false,
                $jsmodule
            );
        }
        $this->content->footer = '';

        return $this->content;
    }

    /**
     * Get courses matching search string
     *
     * @param string $search
     * @param context $blockcontext
     * @param bool $splitterms
     * @param bool $restrictcontext
     * @param null $pagecontext
     * @return moodle_recordset
     */
    public static function get_courses(
        string $search,
        context $blockcontext,
        bool $splitterms = false,
        bool $restrictcontext = false,
        $pagecontext = null
    ): moodle_recordset {
        global $DB;
        $params = [SITEID];
        $where = 'id != ? AND (';
        if ($splitterms) {
            $terms = explode(' ', $search);
            $like = '%1$s LIKE';
            foreach ($terms as $key => $term) {
                $like .= ' ?';
                if ($key < count($terms) - 1) {
                    $like .= ' AND %1$s LIKE';
                }
                $terms[$key] = '%' . $term . '%';
            }
            $params = array_merge($params, $terms);
            $where .= sprintf($like, 'shortname')
                . ' OR ' . sprintf($like, 'fullname')
                . ' OR ' . sprintf($like, 'idnumber');

        } else {
            $params = array_merge($params, ["%$search%", "%$search%", "%$search%"]);
            $where .= 'shortname LIKE ? OR fullname LIKE ? OR idnumber like ? ';
        }
        $where .= ')';
        if (!has_capability('moodle/course:viewhiddencourses', $blockcontext)) {
            $where .= ' AND visible=1';
        }
        if ($restrictcontext) {
            if ($pagecontext && $pagecontext->get_level_name() == get_string('category')) {
                $where .= ' AND category = ?';
                $params[] = $pagecontext->instanceid;
            }
        }

        $order = 'shortname';
        $fields = 'id, shortname, fullname, idnumber, startdate, category';

        return $DB->get_recordset_select('course', $where, $params, $order, $fields);
    }

    /**
     * @param int $categoryid
     *
     * @return string
     */
    public static function get_coursecategory(int $categoryid): string {

        static $categorylist = [];

        if (empty($categorylist)) {
            $categorylist = \core_course_category::make_categories_list('');
        }

        return $categorylist[$categoryid] ?? '';
    }

}

