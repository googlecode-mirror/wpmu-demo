<?php if(is_array($slides)) {
	$data = '';
	//if($slides['properties']['forceresponsive'] == 'true') {
		//$data .= '<div class="ls-wp-forceresponsive-container">';
			//$data .= '<div class="ls-wp-forceresponsive-helper">';
	//}

				$data .= '<div id="layerslider_'.$id.'" style="margin: 0px auto; width: '.layerslider_check_unit($slides['properties']['width']).'; height: '.layerslider_check_unit($slides['properties']['height']).'; '.$slides['properties']['sliderstyle'].'">';
					if(is_array($slides['layers'])) {
						foreach($slides['layers'] as $layerkey => $layer) {
						
						$bg = !empty($layer['properties']['background']) ? 'background-image: url('.$layer['properties']['background'].');' : '';
						
						$data .= '<div class="ls-layer" style="'.$bg.'slidedirection: '.$layer['properties']['slidedirection'].'; slidedelay: '.$layer['properties']['slidedelay'].'; durationin: '.$layer['properties']['durationin'].'; durationout: '.$layer['properties']['durationout'].'; easingin: '.$layer['properties']['easingin'].'; easingout: '.$layer['properties']['easingout'].'; delayin: '.$layer['properties']['delayin'].'; delayout: '.$layer['properties']['delayout'].';">';
				
					
							if(is_array($layer['sublayers'])) {
								foreach($layer['sublayers'] as $sublayer) {
									
									// SlideDirection
									if(!empty($sublayer['slidedirection']) && $sublayer['slidedirection'] != 'auto') {
										$slidedirection = 'slidedirection : '.$sublayer['slidedirection'].';';
									} else {
										$slidedirection = '';
									}
									
									// SlideOutDirection
									if(!empty($sublayer['slideoutdirection']) && $sublayer['slideoutdirection'] != 'auto') {
										$slideoutdirection = 'slideoutdirection : '.$sublayer['slideoutdirection'].';';
									} else {
										$slideoutdirection = '';
									}
								
									if(!empty($sublayer['url'])) {
										$data .= '<a href="'.$sublayer['url'].'" target="'.$sublayer['target'].'" class="ls-s'.$sublayer['level'].'" style="position: absolute; top: '.layerslider_check_unit($sublayer['top']).'; left:'.layerslider_check_unit($sublayer['left']).'; '.$slidedirection.' '.$slideoutdirection.' parallaxin : '.$sublayer['parallaxin'].'; parallaxout : '.$sublayer['parallaxout'].'; durationin : '.$sublayer['durationin'].'; durationout : '.$sublayer['durationout'].'; easingin : '.$sublayer['easingin'].'; easingout : '.$sublayer['easingout'].'; delayin : '.$sublayer['delayin'].'; delayout : '.$sublayer['delayout'].';">';
											
											if(empty($sublayer['type']) || $sublayer['type'] == 'img') { 
												if(!empty($sublayer['image'])) {
													$data .= '<img src="'.$sublayer['image'].'" alt="sublayer">';
												}
											} else {
												$data .= '<'.$sublayer['type'].' class="ls-s'.$sublayer['level'].'" style="'.$sublayer['style'].'"> '.stripslashes($sublayer['html']).' </'.$sublayer['type'].'>';
											}
										$data .= '</a>';
									} else {
										if(empty($sublayer['type']) || $sublayer['type'] == 'img') {
											if(!empty($sublayer['image'])) {
												$data .= '<img class="ls-s'.$sublayer['level'].'" src="'.$sublayer['image'].'" alt="sublayer" style="position: absolute; top: '.layerslider_check_unit($sublayer['top']).'; left: '.layerslider_check_unit($sublayer['left']).';" rel="'.$slidedirection.' '.$slideoutdirection.' parallaxin : '.$sublayer['parallaxin'].'; parallaxout : '.$sublayer['parallaxout'].'; durationin : '.$sublayer['durationin'].'; durationout : '.$sublayer['durationout'].'; easingin : '.$sublayer['easingin'].'; easingout : '.$sublayer['easingout'].'; delayin : '.$sublayer['delayin'].'; delayout : '.$sublayer['delayout'].';">';
											}
										} else {
											$data .= '<'.$sublayer['type'].' class="ls-s'.$sublayer['level'].'" style="position: absolute; top:'.layerslider_check_unit($sublayer['top']).'; left: '.layerslider_check_unit($sublayer['left']).'; '.$slidedirection.' '.$slideoutdirection.' parallaxin : '.$sublayer['parallaxin'].'; parallaxout : '.$sublayer['parallaxout'].'; durationin : '.$sublayer['durationin'].'; durationout : '.$sublayer['durationout'].'; easingin : '.$sublayer['easingin'].'; easingout : '.$sublayer['easingout'].'; delayin : '.$sublayer['delayin'].'; delayout : '.$sublayer['delayout'].'; '.$sublayer['style'].'"> '.stripslashes($sublayer['html']).' </'.$sublayer['type'].'>';
										}
									}
								}
							}
						$data .= '</div>';
						}
					}
				$data .= '</div>';
	//if($slides['properties']['forceresponsive'] == 'true') {
			//$data .= '</div>';
		//$data .= '</div>';
	//}
}
?>