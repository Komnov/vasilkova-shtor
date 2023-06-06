<?php
function load_style_script() {
		// wp_enqueue_style('style', get_template_directory_uri() . '/assets/style.css?' . date('jmYHis'));
		wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css?16');
		wp_enqueue_style('owl', get_template_directory_uri() . '/assets/css/owl.carousel.min.css');
		wp_enqueue_style('owl_theme', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css');
		wp_enqueue_script('jquery_my', get_template_directory_uri() . '/assets/js/jquery.js', null, true);
		wp_enqueue_script('owl', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', null, true);
		wp_enqueue_script('marquiz', '//script.marquiz.ru/v1.js');
		wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/script.js?1', null, true);
	};
	add_action('wp_enqueue_scripts', 'load_style_script');

// Menu
function theme_register_nav_menu() {
	register_nav_menu( 'menu-head', 'Меню в шапке' );
}
add_action('after_setup_theme', 'theme_register_nav_menu');

// Виджет
// $blog = array(
// 	'name' => 'Рубрики',
// 	'id' => 'blog',
// 	'description' => 'Категории записей',
// 	'before_widget' => '<ul class="blog-gerb">',
// 	'after_widget' => '</ul>',
// 	'before_title' => '<h1 style="display:none;">',
// 	'after_title' => '</h1>'
// );
// register_sidebar($blog);

// Поддержка миниатюр
add_theme_support('post-thumbnails');
// set_post_thumbnail_size(auto, auto, false);