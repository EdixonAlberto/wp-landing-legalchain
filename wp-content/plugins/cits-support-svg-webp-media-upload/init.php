<?php 
/*
Plugin Name: CITS Support svg, webp Media and TTF,OTF File Upload
Plugin URI: https://coderitsolution.com
Author: Ashik
Author URI: https://ashik.me
Description: WordPress doesn't allow the .svg,.webp format for media upload and .ttf,.otf fonts files upload gives an error. Active the Plugin and Enjoy. uploads your Svg, Webp Images, TTF, OTF fonts file Safely without Erros.
Tags: Support svg, Support webp, cits support svg,  cits support webp,CITS Support svg, webp Media Upload, fonts file upload support, ttf upload, otf upload, eot upload, woff upload. 
Version: 2.1.0
Requires at least:5.0
Tested up to: 6.0.3
Requires PHP version: 7.0
License: GPL2
*/
class CITS_SUPPORT_SVG_WEBP_MEDIA{
	public function __construct(){
		add_filter('upload_mimes', array($this,'cits_upload_media_mimes'));
		add_filter('file_is_displayable_image', array($this,'cits_is_displayable_webp'), 10, 2);
		// svg response 
		add_filter( 'wp_prepare_attachment_for_js', array($this,'cits_response_for_svg'), 10, 3 );
		add_filter( 'wp_check_filetype_and_ext', array($this,'cits_check_types'), 10, 4 );
		add_filter( 'wp_check_filetype_and_ext', array($this,'cits_allow_svg_upload'), 10, 4 );
	}
	function cits_upload_media_mimes($cits_mimes) {
	    $cits_mimes['webp'] = 'image/webp'; 
	    $cits_mimes['svg'] = 'image/svg+xml';
		$cits_mimes['svgz'] = 'image/svg+xml';
		$cits_mimes['ttf'] = 'application/x-font-ttf';
		$cits_mimes['otf'] = 'application/x-font-otf';
		$cits_mimes['eot'] = 'application/x-font-eot';
		$cits_mimes['woff'] = 'application/x-font-woff';
		$cits_mimes['woff2'] = 'application/x-font-woff2';
	    return $cits_mimes;
	}

	function cits_is_displayable_webp($result, $path) {
	    if ($result === false) {
	        $image_types = array( IMAGETYPE_WEBP );
	        $info = @getimagesize( $path ); 
	        if (empty($info)) {
	            $result = false;
	        } elseif (!in_array($info[2], $image_types)) {
	            $result = false;
	        } else {
	            $result = true;
	        }
	    }

	    return $result;
	}
	// Check Types
	function cits_check_types( $checked, $file, $filename, $mimes ) {

		if ( ! $checked['type'] ) { 
			$check_filetype		= wp_check_filetype( $filename, $mimes );
			$ext				= $check_filetype['ext'];
			$type				= $check_filetype['type'];
			$proper_filename	= $filename; 
			if ( $type && 0 === strpos( $type, 'image/' ) && $ext !== 'svg' ) {
				$ext = $type = false;
			} 
			$checked = compact( 'ext','type','proper_filename' );
		} 
		return $checked; 
	}
	function cits_allow_svg_upload( $data, $file, $filename, $mimes ) { 
		global $wpversion;
		if ( $wpversion !== '4.7.1' || $wpversion !== '4.7.2' ) {
			return $data;
		} 
		$filetype = wp_check_filetype( $filename, $mimes ); 
		return [
			'ext'				=> $filetype['ext'],
			'type'				=> $filetype['type'],
			'proper_filename'	=> $data['proper_filename']
		]; 
	} 
	// Response
	function cits_response_for_svg( $response, $attachment, $meta ) { 
		if ( $response['mime'] == 'image/svg+xml' && empty( $response['sizes'] ) ) { 
			$svg_path = get_attached_file( $attachment->ID ); 
			if ( ! file_exists( $svg_path ) ) { 
				$svg_path = $response['url'];
			} 
			$dimensions = $this->cits_get_dimensions( $svg_path ); 
			$response['sizes'] = array(
				'full' => array(
					'url' => $response['url'],
					'width' => $dimensions->width,
					'height' => $dimensions->height,
					'orientation' => $dimensions->width > $dimensions->height ? 'landscape' : 'portrait'
				)
			); 
		} 
		return $response; 
	} 
	function cits_get_dimensions( $svg ) {
		$svg = simplexml_load_file( $svg );
		if ( $svg === FALSE ) { 
			$width = '0';
			$height = '0'; 
		} else { 
			$attributes = $svg->attributes();
			$width = (string) $attributes->width;
			$height = (string) $attributes->height;

		} 
		return (object) array( 'width' => $width, 'height' => $height );
	}
  

}
new CITS_SUPPORT_SVG_WEBP_MEDIA();
