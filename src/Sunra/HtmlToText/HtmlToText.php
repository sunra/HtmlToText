<?php

namespace Sunra\HtmlToText;

/*

    input html and result is in UTF-8

*/


class HtmlToText {

	/*
        Total remove tags. br converted to new lines    
    */
	public static function plain_text( $html ) {
		$only_br = self::filter($html, 'br');
		return str_replace('<br>',"\n", $only_br);
	}
	
	/*
        removed all tags but safest 'br,b,strong,li,ol,ul'    
    */
	public static function safe_html( $html ) {
		return self::filter( $html, 'br,b,strong,li,ol,ul' );
	}
    
    /*  remove unsafe code (XSS attacks) and heals html - close tags etc */
    public static function purify ($html) {
    	return self::filter( $html );
    }
		
	/*
        Remove all tags but allowed
 	    @var $allowed_tags - coma separated
	*/
	public static function filter( $html, $allowed_tags = false ) {
	
	   $config = \HTMLPurifier_Config::createDefault();
	   
	   if ($allowed_tags !== false) {
	       $config->set('HTML.Allowed', $allowed_tags);
	   }
	   
	   $config->set('HTML.Doctype', 'HTML 4.01 Strict');
	   
       $purifier = new \HTMLPurifier($config);
       $clean_html = $purifier->purify($html);
	   
	   return $clean_html;
	
	}

}
