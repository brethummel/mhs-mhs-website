<?php

function acf_bkgnd_choices_colors( $field ) {
    $field['choices'] = array(
		'bkgnd-white|light' => 'White',
		'bkgnd-light|light' => 'Light Grey',
		'bkgnd-primary|dark' => 'Green',
		'bkgnd-secondary|dark' => 'Dark Blue',
		'bkgnd-tertiary|dark' => 'Blue'
	);
    return $field;
}

function acf_bkgnd_choices_greys( $field ) {
    $field['choices'] = array(
		'bkgnd-white|light' => 'White',
		'bkgnd-light|light' => 'Light Grey'
	);
    return $field;
}

function acf_button_choices_colors( $field ) {
    $field['choices'] = array(
		'primary' => 'Green',
		'secondary' => 'Dark Blue',
		'tertiary' => 'Blue'
	);
    return $field;
}

function acf_rule_choices_colors( $field ) {
    $field['choices'] = array(
		'light' => 'Light Grey',
		'primary' => 'Green',
		'secondary' => 'Dark Blue',
		'tertiary' => 'Blue'
	);
    return $field;
}


// ======================================= //
//              MASTER FIELDS              //
// ======================================= // 

// Button Colors
add_filter('acf/load_field/key=field_60d3c6bbff86a', 'acf_button_choices_colors'); // Settings : Background



// ======================================= //
//            MILD (CORE) BLOCKS           //
// ======================================= // 

// Accordion
add_filter('acf/load_field/key=field_6137c069cb56d', 'acf_bkgnd_choices_colors'); // Settings : Background

// Bio
add_filter('acf/load_field/key=field_610c472909076', 'acf_bkgnd_choices_colors'); // Settings : Background

// Buttons
add_filter('acf/load_field/key=field_614cb4452911b', 'acf_bkgnd_choices_colors'); // Settings : Background

// Contact Form
add_filter('acf/load_field/key=field_61326efe8ad38', 'acf_bkgnd_choices_colors'); // Settings : Background

// Full Image
add_filter('acf/load_field/key=field_610c42acd8ab0', 'acf_bkgnd_choices_colors'); // Settings : Background

// Legal
add_filter('acf/load_field/key=field_610c426e9c0a2', 'acf_bkgnd_choices_colors'); // Settings : Background

// People Grid
add_filter('acf/load_field/key=field_6130f79cbf296', 'acf_bkgnd_choices_greys'); // Settings : Background

// Rule
add_filter('acf/load_field/key=field_614b9cf7267dd', 'acf_bkgnd_choices_greys'); // Settings : Background
add_filter('acf/load_field/key=field_614b9d97b610a', 'acf_rule_choices_colors'); // Settings : Rule Color

// Strip
add_filter('acf/load_field/key=field_61451828202a0', 'acf_bkgnd_choices_colors'); // Settings : Background

// Testimonials
add_filter('acf/load_field/key=field_60d65566d6dec', 'acf_bkgnd_choices_greys'); // Settings : Background

// Text
add_filter('acf/load_field/key=field_60d3a88eed232', 'acf_bkgnd_choices_colors'); // Settings : Background
add_filter('acf/load_field/key=field_618d7dcf02b72', 'acf_bkgnd_choices_colors'); // Columns : Backgrounds : Column 1
add_filter('acf/load_field/key=field_618d7e5002b73', 'acf_bkgnd_choices_colors'); // Columns : Backgrounds : Column 2

// Text + Image
add_filter('acf/load_field/key=field_60d6209fcb6c9', 'acf_bkgnd_choices_colors'); // Settings : Background

// Tiles
add_filter('acf/load_field/key=field_610c4d141012d', 'acf_bkgnd_choices_colors'); // Settings : Background



// ======================================= //
//              MEDIUM BLOCKS              //
// ======================================= //

// Audio Player
add_filter('acf/load_field/key=field_6261d1d951228', 'acf_bkgnd_choices_colors'); // Settings : Background
add_filter('acf/load_field/key=field_6262f91f092b0', 'acf_button_choices_colors'); // Settings : Background

// Gallery
add_filter('acf/load_field/key=field_61ae4e5eb8419', 'acf_bkgnd_choices_colors'); // Settings : Background

// Logo Grid
add_filter('acf/load_field/key=field_61c49c43bbb97', 'acf_bkgnd_choices_colors'); // Settings : Background

// Resources
add_filter('acf/load_field/key=field_61bfbed0c964e', 'acf_bkgnd_choices_colors'); // Settings : Background




// ======================================= //
//               SPICY BLOCKS              //
// ======================================= // 

?>