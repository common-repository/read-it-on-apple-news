<?php
/*
Plugin Name: Read it on Apple News
Description: Add "Read it on Apple News" button on single post.
Plugin URI: https://wpdeveloper.net
Author: M Asif Rahman
Author URI: https://asif.im
Version: 0.1.0
License: GPL2+
Text Domain: read-it-on-apple-news
Min WP Version: 2.5.0
Max WP Version: 4.9
*/


function mobify_ANShareU()
{
	global $wp_query;
$postid = $wp_query->post->ID;
$mobify_anu = get_post_meta($postid, 'apple_news_api_share_url', true);
return $mobify_anu;
}

function mobify_RIOAN($apnurl){
if ( is_single() && mobify_ANShareU() ) {	
	$apnurl .= '<center><a href="'. mobify_ANShareU() .'" target="_blank" ><img alt="Read it on Apple News" src="'. plugins_url("",__FILE__ ) .'/AppleNews-Read_it_on-V1_0.png" width="300" /> </a></center>';
}
	return $apnurl;
}

add_filter( "the_content", "mobify_RIOAN" );	
// eof