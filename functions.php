<?php

class yukeiChild{
	private static $instance;
	private function __construct(){
		add_action('wp_enqueue_scripts', array($this, 'enqueueFrontStuff'));
		add_action('after_setup_theme', array($this, 'registerImageSizes'));
		add_filter('post_class', array($this, 'filterPostClass'));
		add_filter('syntaxhighlighter_themes', array($this, 'filterHighlighterThemes'));
		add_filter('baylys_header_image_width', array($this, 'filterHeaderImgWidth'));
		add_filter('baylys_image_height', array($this, 'filterHeaderImgHeight'));
		add_action('wp_print_styles', array($this, 'removeRedundantStyles'), 20);
	}
	public static function getInstance(){
		if ( !isset(self::$instance) ){
			$c = __CLASS__;
			self::$instance = new $c;
		}
		return self::$instance;
	}
	public function __clone(){
		trigger_error('Clone is not allowed.', E_USER_ERROR);
	}
	public function removeRedundantStyles(){
		wp_dequeue_style('googleFonts');
	}
	public function filterHeaderImgWidth(){
		return 1920;
	}
	public function filterHeaderImgHeight(){
		return 500;
	}
	public function enqueueFrontStuff(){
		wp_enqueue_style('yukei-fonts', 'http://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic,900');
		wp_enqueue_style('baylys-parent-css', get_template_directory_uri() .'/style.css', array('yukei-fonts') );
		wp_enqueue_style('yukei-style', get_stylesheet_uri(), array('baylys-parent-css', 'yukei-fonts') );
		wp_register_style('syntaxhighlighter-theme-github', get_stylesheet_directory_uri()  .'/shThemeGitHub.css', array('syntaxhighlighter-core'));
	}
	public function registerImageSizes(){
		add_image_size('loop-feature', 772, 303, true);
		add_image_size('project-thumbnail', 340, 280, true);
	}
	public function filterPostClass( $classes ){
		if ( get_post_type() === 'project' ) {
			$classes[] = 'post';
		}
		return $classes;
	}
	public function filterHighlighterThemes( $themes ){
		$themes['github'] = 'GitHub';
		return $themes;
	}
}
// Instantiate the class object
yukeiChild::getInstance();