<?php

class block_scratch_pad_renderer extends plugin_renderer_base {

	public function html() {
        $html = '';

        $html .= html_writer::start_tag('div', array('class'=>'tools'));
        foreach(['#f00', '#ff0', '#0f0', '#0ff', '#00f', '#f0f', '#000', '#fff'] as $color) {
        $html .= "<a href='#scratch_pad_canvas' data-color='" .$color. "' style='background: " .$color. ";'></a>";
        }
        $html .= html_writer::end_tag('div');

        $html .= html_writer::start_tag('div', array('class'=>'tools'));
        foreach([3, 5, 10, 15] as $size) {
        $html .= "<a href='#scratch_pad_canvas' data-size='" .$size. "' style='background:#000;padding: " .$size. "px;border-radius: 50%;margin: 0 5px;'></a>";
        }
        $html .= html_writer::end_tag('div');

		$html .= html_writer::tag('a', 'Start', array('class'=>'btn btn-success btn-sm', 'id'=>'startCanvas'));
        return html_writer::tag('div', $html, array('style'=>'text-align:center;min-height: 50px;'));
	}
}