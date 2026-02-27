<?php

$version = '1.0.2';

// ======================================= //
//          "ADD BUTTON" BUTTON            //
// ======================================= // 

// add "add button" button to tinymce
function spr_addbutton_init() {
	//abort early if the user will never see tinymce
	if (!current_user_can('edit_posts') && !current_user_can('edit_pages') && get_user_option('rich_editing') == 'true') {
		return;
	}
	add_filter("mce_external_plugins", "spr_register_tinymce_plugin"); // add callback to register our tinymce plugin
	add_filter('mce_buttons', 'spr_add_tinymce_button'); // add a callback to add our button to the tinymce toolbar
}
add_action('init', 'spr_addbutton_init');

// this callback registers our plug-in
function spr_register_tinymce_plugin($plugin_array) {
	$themeurl = get_template_directory_uri();
	$sprpath = $GLOBALS['springboard_path'];
    $plugin_array['spr_addbutton_button'] = admin_url('admin-ajax.php?action=spr_tinymce_plugin');
    return $plugin_array;
}

// this callback adds our button to the toolbar
function spr_add_tinymce_button($buttons) {
    $buttons[] = "spr_addbutton_button"; // add the button ID to the $button array
    return $buttons;
}

add_action( 'wp_ajax_spr_tinymce_plugin', function () {
	// Send proper headers and avoid caching
	header( 'Content-Type: application/javascript; charset=UTF-8' );
	header( 'Cache-Control: no-cache, must-revalidate, max-age=0' );

	$themeurl = get_template_directory_uri();
	$sprpath  = isset( $GLOBALS['springboard_path'] ) ? $GLOBALS['springboard_path'] : '';
	$img_url  = $themeurl . $sprpath . '/admin/images/add_button.svg';

	// Output the JS. This mirrors your admin.js logic, but delivered as a TinyMCE plugin file.
	echo <<<JS
(function(){
	if (typeof tinymce === 'undefined') { return; }

	tinymce.create('tinymce.plugins.spr_addbutton_plugin', {
		init: function(editor, url) {
			// Command when the button is clicked
			editor.addCommand('spr_addbutton', function() {
				var content = '<a class="button medium primary" href="../relative-path-to-your-page"><span class="button-text">Learn More</span></a>';
				tinymce.execCommand('mceInsertContent', false, content);
			});

			// Register toolbar button — use the theme image URL (do NOT rely on 'url' because this JS is served via AJAX)
			editor.addButton('spr_addbutton_button', {
				title: 'Add Button',
				cmd: 'spr_addbutton',
				image: '{$img_url}'
			});
		}
	});

	// Map plugin ID to the plugin we just created
	tinymce.PluginManager.add('spr_addbutton_button', tinymce.plugins.spr_addbutton_plugin);
})();
JS;

	exit;
} );

// ======================================= //
//            FORMATS DROPDOWN             //
// ======================================= // 

// add formats dropdown to WYSIWYG editor
if ($mcestyles) {
	function spr_mce_buttons($buttons) {
		array_splice($buttons, 1, 0, 'styleselect');
		return $buttons;
	}
	add_filter('mce_buttons', 'spr_mce_buttons');
	
	function spr_tiny_mce_before_init($settings) {  
		// print_r($GLOBALS['styleformats']);
		// echo('Running tiny_mce_before_init');
		$settings['style_formats'] = json_encode($GLOBALS['styleformats']);
		return $settings;
	}
	add_filter('tiny_mce_before_init', 'spr_tiny_mce_before_init'); 
	
}


?>