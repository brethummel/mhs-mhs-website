<?php
/*
Template Name: Default
Partial Name: singlet_post-default
*/
?>
<?php $result = $args; 
	$date = get_query_var('date');
	$excerpt = get_query_var('excerpt');
	$columns = get_query_var('columns');
	$filters = get_query_var('filters');
	$classes = '';
	if ($columns == 4) {
		$classes .= ' col-12 col-md-6 col-lg-3';
	} elseif ($columns == 3) {
		$classes .= ' col-12 col-md-6 col-lg-4';
	} elseif ($columns == 2) {
		$classes .= ' col-12 col-md-6';
	} elseif ($columns == 1) {
		$classes .= ' col-12';
	}
	
	if ($result && $filters) {
		$catids = wp_get_post_categories($result->ID); 
		$cats = '';
		foreach ($catids as $i => $id) {
			$cat = get_category($id);
			$cats .= $cat->slug . ',';
			if ($i == 0) { $mycat = $cat->slug; } 
		} 
		$cats = rtrim($cats, ', '); 
	}
	
	$catmap = array(
		'blog' => array('id' => '3', 'label' => 'Blog Post', 'filter' => 'Blog Posts'),
		'news' => array('id' => '4', 'label' => 'In the News', 'filter' => 'News'),
		'video' => array('id' => '5', 'label' => 'Video', 'filter' => 'Videos'),
		'download' => array('id' => '6', 'label' => 'Download', 'filter' => 'Downloads'),
		'solutions' => array('id' => '10', 'label' => 'Solution Brief', 'filter' => 'Solution Briefs'),
	);
	set_query_var('catmap', $catmap);

?>
<?php if ($result) { ?>
<?php if (isset($_POST['page'])) {
	$pagenum = $_POST['page'];
} else {
	$pagenum = 1;
} ?>
<!-- BEGIN POST SINGLET -->
<div class="post-container<?php echo($classes); ?><?php if ($filters) { echo(' ' . $mycat); }?><?php if ($pagenum > 1) { ?> just-loaded<?php } ?>"<?php if ($filters) { ?> data-cats="<?php echo($cats); ?>" <?php } ?> data-page="<?php echo($pagenum); ?>">
	<div class="post col-12">
		<div class="image-container">
			<a href="<?php echo(get_permalink($result->ID)); ?>">
			<div class="image" style="background-image: url(<?php echo(get_field('excerpt_image', $result->ID)['url']); ?>);"></div>
			</a>
		</div>
		<div class="text-container">
			<?php if ($filters) { ?><p class="type"><?php echo($catmap[$mycat]['label']); ?></p><?php } ?>
			<h4><a href="<?php echo(get_permalink($result->ID)); ?>"><?php echo(get_field('excerpt_title', $result->ID)); ?></a></h4>
			<?php if ($date) { ?><p class="date"><?php echo(get_the_date('M j, Y', $result->ID)); ?></p><?php } ?>
			<?php if ($excerpt) { ?><p><?php echo(get_field('excerpt_excerpt', $result->ID)); ?></p><?php } ?>
			<p class="read-more"><a class="button small tertiary" href="<?php echo(get_permalink($result->ID)); ?>">read more</a></p>
		</div>
	</div>
</div>
<!-- END POST SINGLET -->
<?php } ?>