<?php
function theme_parse_video($path){
	$parsedUrl  = parse_url($path);
	
	if($parsedUrl['host'] == 'youtube.com' || $parsedUrl['host'] == 'www.youtube.com'){
		// for youtube  
	    $embed	= $parsedUrl['query'];  
	    parse_str($embed, $out);  
	    $embedUrl   = $out['v']; 
	    return  "http://www.youtube.com/embed/$embedUrl"; 
	}
	
	if($parsedUrl['host'] == 'vimeo.com' || $parsedUrl['host'] == 'www.vimeo.com'){
		// for vimeo
		$embed	= $parsedUrl['path'];
		return "http://player.vimeo.com/video$embed";
	}
}
?>