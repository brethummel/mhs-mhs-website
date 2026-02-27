<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php 
    global $post;
	if (isset($post)) {
    	$slug = $post->post_name;
	} else {
		$slug = '';
		$section = 'error-404';
	}
	$ancestors = get_post_ancestors($post);
	if (count($ancestors) > 0) {
		$section = get_post_field('post_name', $ancestors[count($ancestors)-1]) . ' ';
	} else {
		if (!isset($section)) {
			if (get_post_type() != 'page') {
				$section = get_post_type() . ' ';
			} else {
				$section = '';
			}
		}
	}
	$dev = false;
	if (isset($GLOBALS['produrl'])) {
		$produrl = $GLOBALS['produrl']; 
		$server = $_SERVER['SERVER_NAME'];
		if (strpos($server, $produrl) === false) {
			$dev = true;
		}
	}
	$blocks = get_field('content_blocks');
	if ($blocks) {
		$block0type = $blocks[0]['acf_fc_layout'];
		$block0bkgnd = str_replace('|', ' ', $blocks[0][str_replace('block_', '', $blocks[0]['acf_fc_layout']) . '_settings']['background']);
	} else {
		$block0type = 'block_text';
		$block0bkgnd = 'bkgnd-white light';
	}
?>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset='<?php bloginfo('charset'); ?>' />
    <title><?php wp_title(''); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!--[if lt IE 9]>
        <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('stylesheet_directory'); ?>/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo('stylesheet_directory'); ?>/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('stylesheet_directory'); ?>/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('stylesheet_directory'); ?>/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('stylesheet_directory'); ?>/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('stylesheet_directory'); ?>/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('stylesheet_directory'); ?>/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('stylesheet_directory'); ?>/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('stylesheet_directory'); ?>/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php bloginfo('stylesheet_directory'); ?>/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('stylesheet_directory'); ?>/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php bloginfo('stylesheet_directory'); ?>/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('stylesheet_directory'); ?>/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php bloginfo('stylesheet_directory'); ?>/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php bloginfo('stylesheet_directory'); ?>/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
    <?php wp_head(); ?>
</head>
<body class="<?php echo($section); ?><?php echo($slug); ?><?php if ($dev) { ?> dev-env<?php } ?><?php if (is_user_logged_in()) { ?> logged-in<?php } ?>" data-slug="<?php echo($slug); ?>">
    <?php wp_body_open(); ?>
	<?php $sitebanner = false; ?>
	<?php if (isset(get_field('sitebanner_settings', 'options')['display'])) { $sitebanner = get_field('sitebanner_settings', 'options')['display']; } ?>
	<?php if ($sitebanner) { ?>
		<div class="top-bar" data-nosnippet>
			<div class="container">
				<div class="row">
					<div class="col-12 notice" data-nosnippet>
						<?php $type = get_field('sitebanner_settings', 'options')['type']; 
							if ($type == 'internal') {
								$dest = get_field('sitebanner_settings', 'options')['page'];
							} elseif ($type == 'external') {
								$dest = get_field('sitebanner_settings', 'options')['url'];
							} elseif ($type == 'email') {
								$dest = "mailto:" . get_field('sitebanner_settings', 'options')['email'];
							}
							if ($type != 'email' && get_field('sitebanner_settings', 'options')['new_tab']) {
								$target = "_blank";
							}
						?>
						<a class="more" <?php if(isset($target)) { ?>target=<?php echo($target); ?> <?php } ?>href="<?php echo($dest); ?>"><?php echo(preg_replace('/<\/p>\s*$/', '&nbsp;&nbsp;</p>', get_field('sitebanner_text', 'options'))); ?><?php echo(get_field('sitebanner_settings', 'options')['text']); ?></a>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<header class="transparent <?php echo($block0type . ' ' . $block0bkgnd); ?>">
		<div class="container">
            <div class="row align-items-center">
                <div class="logo col-4">
                    <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/company_logo.png" alt="<?php echo(get_field('company', 'options')); ?>"/></a>
                </div>
                <div class="hamburger d-lg-none">
					<div class="hamburger-container">
						<div class="line top"></div>
						<div class="line middle"></div>
						<div class="line bottom"></div>
					</div>
				</div>
                <div class="main-menu col-lg-8">
                    <ul>
                        <li class="<?php $me = 'item-1'; echo($me); ?><?php if ($slug == $me || $me == $section) { ?> current<?php } ?>"><a href="<?php bloginfo('url'); ?>/<?php echo($me); ?>">Item 1</a></li>
                        <li class="<?php $me = 'item-2'; echo($me); ?><?php if ($slug == $me || $me == $section) { ?> current<?php } ?>"><a href="<?php bloginfo('url'); ?>/<?php echo($me); ?>">Item 2</a></li>
                        <li class="<?php $me = 'item-3'; echo($me); ?><?php if ($slug == $me || $me == $section) { ?> current<?php } ?>"><a href="<?php bloginfo('url'); ?>/<?php echo($me); ?>">Item 3</a></li>
                        <li class="<?php $me = 'item-4'; echo($me); ?><?php if ($slug == $me || $me == $section) { ?> current<?php } ?>"><a href="<?php bloginfo('url'); ?>/<?php echo($me); ?>">Item 4</a></li>
                    </ul>
                </div>
            </div>
        </div>
	</header>
    <div class="content-container">
        <div class="content">