<?php get_header(); ?>
<!-- Main -->
<?php		
		if(have_posts()) {
						while(have_posts()) {
								the_post();
								the_content();
							}
					}
					?>
		<!-- End of Main -->
<?php get_footer(); ?>