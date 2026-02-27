<?php

$version = '1.0.2';

// ======================================= //
//            CONTENT BLOCKS UI            //
// ======================================= // 


// remove author meta from shared  links
if (function_exists('wpseo_init')) {
	add_filter( 'wpseo_meta_author', '__return_false' );
	add_filter('wpseo_enhanced_slack_data', '__return_false' );
}

// add icons to Springboard blocks
function spr_block_titles($title, $field, $layout, $i) {
    $blocktype = $layout['name'];
    if (is_array(get_sub_field(str_replace('block_', '', $blocktype) . '_display'))) {
        $blockname = get_sub_field(str_replace('block_', '', $blocktype) . '_display')['block_name'];
    }
    if (!isset($blockname) || $blockname == '') {
        $title = '<span class="icon ' . $blocktype . '">' . $layout['label'] . '</span>';
    } else {
        $title = '<span class="icon ' . $blocktype . '">' . $blockname . ' </span><span class="block-type">(' . $layout['label'] . ')</span>';
    }
    return $title;
}
add_filter('acf/fields/flexible_content/layout_title/name=content_blocks', 'spr_block_titles', 10, 4);


// allow Page Link fields to accept attachments
function spr_page_link_allow_attachments($args, $field, $post_id) {

    // Only modify if this picker is querying attachments
    $pt = isset($args['post_type']) ? (array) $args['post_type'] : array();
    
    if (!in_array('attachment', $pt, true)) {
        return $args;
    }

    // Normalize post_status and add 'inherit' (used by attachments)
    if (!isset($args['post_status']) || $args['post_status'] === '') {
        $args['post_status'] = array();
    } elseif (!is_array($args['post_status'])) {
        $args['post_status'] = array($args['post_status']);
    }

    if (!in_array('inherit', $args['post_status'], true)) {
        $args['post_status'][] = 'inherit';
    }

    return $args;
}
// add_filter('acf/fields/page_link/query', 'spr_page_link_allow_attachments', 10, 3);


?>