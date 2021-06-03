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
 * Panopto Student Submission index file
 *
 * @package mod_panoptosubmission
 * @copyright  Panopto 2021
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once("../../config.php");

$id = required_param('id', PARAM_INT); // Course ID.

$course = $DB->get_record('course', array('id' => $id), '*', MUST_EXIST);

require_login($course);

global $SESSION, $CFG;

$PAGE->set_url('/mod/panoptosubmission/index.php', array('id' => $id));
$PAGE->set_pagelayout('incourse');

$modulename = get_string("modulenameplural", "mod_panoptosubmission");
$PAGE->navbar->add($modulename);
$PAGE->set_title($modulename);
$PAGE->set_heading($course->fullname);

echo $OUTPUT->header();

$renderer = $PAGE->get_renderer('mod_panoptosubmission');
$renderer->display_panoptosubmission_activities_table($course);

echo $OUTPUT->footer();
