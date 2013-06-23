<?php

class yukeiChild{
	private static $instance;
	private function __construct(){
		add_action('wp_enqueue_scripts', array($this, 'enqueueFrontStuff'));
		add_action('after_setup_theme', array($this, 'registerImageSizes'));
		add_filter('post_class', array($this, 'filterPostClass'));
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
	public function enqueueFrontStuff(){
		wp_enqueue_style('yukei-fonts', 'http://fonts.googleapis.com/css?family=Alegreya:900|Source+Sans+Pro:400italic,700italic,400,700');
		wp_enqueue_style('baylys-parent-css', get_template_directory_uri() .'/style.css', array('yukei-fonts') );
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
}
// Instantiate the class object
yukeiChild::getInstance();