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
 * Scratch Pad block
 *
 * @package    block_scratch_pad
 * @copyright  1999 onwards Martin Dougiamas (http://dougiamas.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


class block_scratch_pad extends block_base {

    public static $navcount;
    public $blockname = null;
    protected $contentgenerated = true;
    protected $docked = true;
    protected $headerhidden = false;

    function init() {
        $this->blockname    = get_class($this);
        $this->title        = get_string('pluginname', $this->blockname);
    }

    function instance_allow_multiple() {
        return false;
    }

    function applicable_formats() {
        return array(
            'site-index' => false,
           'course-view' => false, 
    'course-view-social' => false,
                   'mod' => false,
              'mod-quiz' => true
        );
    }

    function instance_allow_config() {
        return true;
    }

    function  instance_can_be_hidden() {
        return true;
    }

    function instance_can_be_docked() {
        return (parent::instance_can_be_docked() && (empty($this->config->enabledock) || $this->config->enabledock=='yes'));
    }

    function get_content() {
        global $CFG;
        require_once($CFG->libdir . '/pagelib.php');
        global $PAGE;

        if($this->content !== NULL) {
            return $this->content;
        }
        
        $PAGE->requires->js('/blocks/scratch_pad/javascript/myscript.js');

        if (empty($this->instance)) {
            return '';
        }

        $renderer = $this->page->get_renderer($this->blockname);
        $this->content = new stdClass;
        $this->content->text = '';
        $this->content->items = array();
        $this->content->icons = array();
        $this->content->footer = '';
        $this->title = 'Scratch Pad';

        $this->content->text = $renderer->html();


        return $this->content;
    }

    public function get_required_javascript() {
        parent::get_required_javascript();
    }

    public function get_aria_role() {
        return 'navigation';
    }

}


