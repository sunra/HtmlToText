<?php

namespace Sunra\HtmlToText;


class HtmlToText {
	
	/*
	
	
	    $allowed_tags - br b strong ul li ol
	
	*/
	
	public static function convert( $html, $allowed_tags = '' ) {
	
	   $config = HTMLPurifier_Config::createDefault();
       $purifier = new HTMLPurifier($config);
       $clean_html = $purifier->purify($html);
	   
	   return $clean_html;
	
	}

}