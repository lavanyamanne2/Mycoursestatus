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
 * Mycoursestatus block
 *
 * @package    block_mycoursestatus
 * @copyright  2014 Lavanya Manne
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once('../../config.php');
global $CFG, $DB, $PAGE, $COURSE, $USER, $SITE;
require_once($CFG->dirroot.'/blocks/mycoursestatus/classes/module.php');
$PAGE->requires->css('/blocks/mycoursestatus/styles.css');

$courseid = required_param('id', PARAM_INT);
$PAGE->set_url(new moodle_url('/blocks/mycoursestatus/report.php', array('id' => $courseid)));

if (!$course = $DB->get_record('course', array('id' => $courseid))) {
    print_error('nocourseid');
}
require_login($courseid);
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=report.doc");
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
?>
<style type="text/css">
body {
   font-family:calibri;
}

.report {
    /* border: 1px solid blue; */
    padding-right: 4px;
    padding-bottom: 8px;
    margin-top: 20px;
}

.cond1 {
    /* border: 1px solid blue; */
   margin-top: 40px;
}

.cond2 {
    /* border: 1px solid blue; */
    padding-right: 4px;
    padding-bottom: 8px;
    margin-top: 20px;
}

.mtable {
    /* border: 1px solid blue; */
    margin-top: 15px;
    margin-bottom: 17px;
    min-width: 90%;
    width: 95%;
}

.mtable th {
    /* border: 1px solid blue; */
    background: #dee2e6;
    width: 50%;
    text-align: center;
}

.mtable th,
td {
    border: 1px solid #dee2e6;
    padding: 8px;
    width: 50%;
}
</style>
<?php
echo "<body>";
$modreport = new module($CFG, $DB);
echo html_writer::div('<center><b>'.get_string('creport', 'block_mycoursestatus').'</center></b>');
echo html_writer::div('<b>Fullname : '.$USER->firstname.'&nbsp;'.$USER->lastname.'</b>', 'report');
echo html_writer::div('<b>Course : '.$course->fullname.'</b>', 'report');

if ($modreport->module_conds()) {
    echo html_writer::div('The course <b>'.$course->fullname.'</b> has set to <b>' .
                           get_string('cconda', 'block_mycoursestatus').'</b> and the modules required for
                           completion are:', 'cond1');
    echo html_writer::div($modreport->module_conds(), 'cond2');
}

if ($modreport->modcourse_mod()) {
    echo html_writer::div('The course <b>'.$course->fullname.'</b> has set to <b>' .
                           get_string('ccondb', 'block_mycoursestatus').'</b> and the modules required for
                           completion are:', 'cond1');
    echo html_writer::div($modreport->modcourse_mod(), 'cond2');
}

if ($modreport->course_grade()) {
    echo html_writer::div('The course <b>'.$course->fullname.'</b> has set to <b>' .
                           get_string('ccondc', 'block_mycoursestatus').'</b> and the required course grade for
                           completion is <b>'.$modreport->course_grade().'</b>', 'cond1');
}
echo html_writer::div(get_string('status', 'block_mycoursestatus'), 'cond1');
$notgradetable = new html_table();
$notgradetable->head = array('Resource Modules', 'Status');
$notgradetable->attributes['class'] = 'mtable';
$modinfo = get_fast_modinfo($courseid);
foreach ($cms = $modinfo->get_cms() as $cminfo) {
    $notgraded = $DB->get_recordset_sql('SELECT cmc.coursemoduleid
                                          FROM {course_modules_completion} cmc
                                          JOIN {course_modules} cm ON cm.id = cmc.coursemoduleid
                                          JOIN {modules} m ON m.id= cm.module
                                          WHERE cm.deletioninprogress=0
                                          AND m.id IN (3,8,11,12,15,17,20)
                                          AND cmc.viewed = 1
                                          AND cmc.coursemoduleid = '.$cminfo->id.'
                                          AND cmc.userid= '.$USER->id.'
                                          AND cm.course = '.$courseid.' ');
    foreach ($notgraded as $ngd) {
         $notgradetable->data[] = new html_table_row(array(implode(array($cminfo->get_formatted_name())),
                                  '<center>Viewed</center>'));
    }
}
echo html_writer::table($notgradetable);
$gradetable = new html_table();
$gradetable->head = array('Activity Modules', 'Grade');
$gradetable->attributes['class'] = 'mtable';
$graded = $DB->get_recordset_sql('SELECT gi.itemname,
                                         gg.finalgrade
                                  FROM {grade_items} gi JOIN {grade_grades} gg ON gi.id = gg.itemid
                                  WHERE gi.itemtype IN ("mod")
                                  AND gg.finalgrade IS NOT NULL
                                  AND gi.courseid = '.$courseid.'
                                  AND gg.userid = '.$USER->id.'');
foreach ($graded as $gd) {
    $gradetable->data[] = new html_table_row(array(implode(array($gd->itemname)), '<center>'.$gd->finalgrade.'</center>'));
}
echo html_writer::table($gradetable);
echo "</body>";
