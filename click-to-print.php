<?php
/*
Plugin Name: Click To Print
Plugin URI: https://www.daynightprint.co.uk/contact-us/
Description: Use [ctp_print] shortcode to add "Print" button to print contents of any page or post.
Tags: print, daynightprint.co.uk
Version: 1.0
Author:	Daynightprint.co.uk
Author URI: https://www.daynightprint.co.uk/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/
	
function ctp_head()
{
	echo "<script>";
	?>
	
	function ctp_click()
	{
		window.print();
	}
	
	<?php
	echo "</script>";
	
	$post = get_post();
	
	echo "<style>";
	?>
		@media print {
		  body * {
			visibility: hidden;
		  }
		  #post-<?php echo $post->ID; ?>, #post-<?php echo $post->ID; ?> * {
			visibility: visible;
		  }
		  #post-<?php echo $post->ID; ?>{
			position: absolute;
			left: 0;
			top: 0;
		  }
		  
		  #comment-wrap, #comment-wrap *, .ctp-button {
			display: none!important;
			visibility: hidden!important;
		  }
		}
		
	<?php	
	echo "</style>";
}

function ctp_shortcode() {
     return '<button class="ctp-button" onclick="ctp_click()">Print</button>';
}

add_shortcode('ctp_print', 'ctp_shortcode');
	
add_action('wp_head', 'ctp_head');
