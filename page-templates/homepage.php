<?php
/**
 * Template Name: Homepage
 */
get_header();

?>

		<?php
		$section_id=64;
		 get_template_part("sections-templates/banner");
		 ?>
		<?php 
		$section_id=46;
		get_template_part("sections-templates/about");
		?>
		<?php
		$section_id=47;
		 get_template_part("sections-templates/speaker");
		 ?>
		<?php 
		$section_id=48;

		get_template_part("sections-templates/schedule");
		?>
		<?php 
		$section_id=49;

		get_template_part("sections-templates/gallery");
		?>
		<?php 
		$section_id=112;
		
		get_template_part("sections-templates/ticket");
		?>
		<?php 
		$section_id=115;
		get_template_part("sections-templates/sponser");
		?>
		<?php 
		get_template_part("sections-templates/blog");
		?>
		
<?php get_footer();?>
