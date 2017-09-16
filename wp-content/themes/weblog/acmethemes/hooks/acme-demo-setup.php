<?php
if( !function_exists( 'weblog_demo_nav_data') ){
	function weblog_demo_nav_data(){
		$demo_navs = array(
			'primary'  => 'Demo Menu'
		);
		return $demo_navs;
	}
}
add_filter('acme_demo_setup_nav_data','weblog_demo_nav_data');