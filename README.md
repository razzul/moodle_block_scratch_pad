Moodle Block Scratch Pad is based on rough work concept.

![alt tag](https://raw.githubusercontent.com/razzul/moodle_block_scratch_pad/master/pix/scratch_pad_1.png)
![alt tag](https://raw.githubusercontent.com/razzul/moodle_block_scratch_pad/master/pix/scratch_pad_2.png)
![alt tag](https://raw.githubusercontent.com/razzul/moodle_block_scratch_pad/master/pix/scratch_pad_3.png)

To update the block design 
1. Add this is in /theme/your_theme/renderers.php
	require_once('renderers/block_scratch_pad_renderer.php');

2. Create the block_scratch_pad_renderer.php in /theme/your_theme/renderers/

3. Override your code as per as your neeed
<?php
defined('MOODLE_INTERNAL') || die();
include_once($CFG->dirroot . "/blocks/scratch_pad/renderer.php");

class theme_thmemeFolderName_block_scratch_pad_renderer extends block_scratch_pad_renderer {

    public function html() {
    	// your code
    }
}
