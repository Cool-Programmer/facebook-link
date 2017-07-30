<?php
	function ffl_add_content($content)
	{
		global $ffl_options;

		$footer_output = "<hr>";
		$footer_output .= "<div class='footer_content'>";
		$footer_output .= "<span class='dashicons dashicons-facebook'></span>";
		$footer_output .= __('<span style="color: '.$ffl_options['text_color'].'">Find me on</span> <a href="'.$ffl_options['facebook_url'].'" target="_blank" style="color: '.$ffl_options['link_color'].'">Facebook</a>');
		$footer_output .= "</div>";

		if (is_single() && $ffl_options['enable'] == 1) {
			return $content . $footer_output;
		}

		return $content;
	}

	add_filter('the_content', 'ffl_add_content');