<div class="wrap">
<h2 class="ls-maintitle">LayerSlider Admin Page</h2>

<div id="layerslider-sample-tab" class="layerslider_tabs">
	<table class="form-table ls-global-table">
		<tbody>
		<tr>
			<td colspan="2">
				<h2>Global Settings</h2>
				<a class="ls-openclose" href="#">minimize</a>
			</td>
		</tr>
	    <tr valign="top">
	    	<th scope="row"><strong>width</strong></th>
	    	<td>
	 			<input type="text" name="width" value="940" />
	 			<br/>
	 			<span class="description">Width of the slider.</span>
	 		</td>
	 	</tr>
	    <tr valign="top">
	    	<th scope="row"><strong>height</strong></th>
	    	<td>
	    		<input type="text" name="height" value="387" />
	    		<br/>
	    		<span class="description">Height of the slider.</span>
	    	</td>
	    </tr>
	    <tr valign="top">
	        <th scope="row"><strong>sliderStyle</strong></th>
	        <td>
	        	<input class="big" type="text" name="sliderstyle" value="" />
	        	<br/>
	        	<span class="description">You can add your own style to the LayerSlider container if you want (for exampe margin top / bottom, etc). You can use any CSS properties.</span>
	        </td>
	    </tr>
	    <tr valign="top">
	    	<th scope="row"><strong>autoStart</strong> : true or false</th>
	    	<td>
	    		<input type="text" name="autostart" value="true" />
	    		<br/>
	    		<span class="description">If true, slideshow will automatically start after loading the page.</span>
	    	</td>
	    </tr>
	    <tr valign="top">
	    	<th scope="row"><strong>pauseOnHover</strong> : true or false</th>
	    	<td>
	    		<input type="text" name="pauseonhover" value="true" />
	    		<br/>
	    		<span class="description">SlideShow will pause when mouse pointer is over LayerSlider.</span>
	    	</td>
	    </tr>
	    <tr valign="top">
	    	<th scope="row"><strong>firstLayer</strong> : number (positive integer)</th>
	    	<td>
	    		<input type="text" name="firstlayer" value="1" />
	    		<br/>
	    		<span class="description">LayerSlider will begin with this layer.</span>
	    	</td>
	    </tr>
	    <tr valign="top">
	    	<th scope="row"><strong>animateFirstLayer</strong> : true or false</th>
	    	<td>
	    		<input type="text" name="animatefirstlayer" value="false" />
	    		<br/>
	    		<span class="description">If true, first layer will animate (slide in) instead of fading</span>
	    	</td>
	    </tr>
	    <tr valign="top">
	    	<th scope="row"><strong>twoWaySlideshow</strong> : true or false</th>
	    	<td>
	    		<input type="text" name="twowayslideshow" value="true" />
	    		<br/>
	    		<span class="description">If true, slideshow will go backwards if you click the prev button.</span>
	    	</td>
	     </tr>
	    <tr valign="top">
	    	<th scope="row"><strong>keybNav</strong> : true or false</th>
	    	<td>
	    		<input type="text" name="keybnav" value="true" />
	    		<br/>
	    		<span class="description">Keyboard navigation. You can navigate with the left and right arrow keys.</span>
	    	</td>
	    </tr>
        <tr valign="top">
        	<th scope="row"><strong>imgPreload</strong> : true or false</th>
        	<td>
        		<input type="text" name="imgpreload" value="true" />
        		<br/>
        		<span class="description">Image preload. Preloads all images and background-images of the next layer.</span>
        	</td>
	    </tr>
	    <tr valign="top">
        	<th scope="row"><strong>navPrevNext</strong> : true or false</th>
        	<td>
        		<input type="text" name="navprevnext" value="true" />
        		<br/>
        		<span class="description">If false, Prev and Next buttons will be invisible.</span>
        	</td>
        </tr>
        <tr valign="top">
        	<th scope="row"><strong>navStartStop</strong> : true or false</th>
        	<td>
        		<input type="text" name="navstartstop" value="true" />
        		<br/>
        		<span class="description">If false, Start and Stop buttons will be invisible.</span>
        	</td>
        </tr>
        <tr valign="top">
        	<th scope="row"><strong>navButtons</strong> : true or false</th>
        	<td>
        		<input type="text" name="navbuttons" value="true" />
        		<br/>
        		<span class="description">If false, slide buttons will be invisible.</span>
        	</td>
        </tr>
        <tr valign="top">
        	<th scope="row"><strong>backgroundColor</strong></th>
        	<td>
        		<input type="text" name="backgroundcolor" value="white" class="bgchange" />
        		<br/>
        		<span class="description">Background color of LayerSlider. You can use all CSS methods, like hexa colors, rgb(r,g,b) method, color names, etc. Note, that background sublayers are covering the background.</span>
        	</td>
        </tr>
        <tr valign="top">
        	<th scope="row"><strong>backgroundImage</strong></th>
        	<td>
        		<input type="text" name="backgroundimage" value="" class="layerslider_upload_input bgchange" />
        		<button class="button-primary layerslider-bg-reset empty">Reset</button>
        		<br/>
        		<span class="description">Background image of LayerSlider. This will be a fixed background image of LayerSlider by default. Note, that background sublayers are covering the global background image.</span>
        	</td>
        </tr>
			<td colspan="2">
				<h2>LayerSlider API Callback Events</h2>
			</td>
		</tr>
    	<tr valign="top">
    	    <th scope="row"><strong>cbInit</strong></th>
    	    <td>
    	    	<textarea name="cbinit">function() { }</textarea>
    	    	<br/>
    	    	<span class="description">Calling when the LayerSlider loaded.</span>
    	    </td>
    	</tr>
        <tr valign="top">
        	<th scope="row"><strong>cbStart</strong></th>
        	<td>
        		<textarea name="cbstart">function() { }</textarea>
        		<br/>
        		<span class="description">Calling when you click the slideshow start.</span>
        	</td>
        </tr>
        <tr valign="top">
        	<th scope="row"><strong>cbStop</strong></th>
        	<td>
        		<textarea name="cbstop">function() { }</textarea>
        		<br/>
        		<span class="description">Calling when click the slideshow stop / pause button.</span>
        	</td>
        </tr>
        <tr valign="top">
        	<th scope="row"><strong>cbPause</strong></th>
        	<td>
        		<textarea name="cbpause">function() { }</textarea>
        		<br/>
        		<span class="description">Calling when slideshow pauses (if pauseOnHover is true).</span>
        	</td>
        </tr>
        <tr valign="top">
        	<th scope="row"><strong>cbAnimStart</strong></th>
        	<td>
        		<textarea name="cbanimstart">function() { }</textarea>
        		<br/>
        		<span class="description">Calling when animation starts.</span>
        	</td>
        </tr>
        <tr valign="top">
        	<th scope="row"><strong>cbAnimStop</strong></th>
        	<td>
        		<textarea name="cbanimstop">function() { }</textarea>
        		<br/>
        		<span class="description">Calling when the animation of current layer ends, but the sublayers of this layer still may be animating.</span>
        	</td>
        </tr>
        <tr valign="top">
        	<th scope="row"><strong>cbPrev</strong></th>
        	<td>
        		<textarea name="cbprev">function() { }</textarea>
        		<br/>
        		<span class="description">Calling when you click the previous button (or if you use keyboard or touch navigation).</span>
        	</td>
        </tr>
        <tr valign="top">
        	<th scope="row"><strong>cbNext</strong></th>
        	<td>
        		<textarea name="cbnext">function() { }</textarea>
        		<br/>
        		<span class="description">Calling when you click the next button (or if you use keyboard or touch navigation).</span>
        	</td>
        </tr>
		</tbody>
	</table>
	<ul class="layerslider_slides_wrapper"></ul>
	<button class="layerslider_add_slide button-primary">Add New Layer</button>
	<button class="layerslider_sort_layers button-primary">Reorder Layers</button>
</div>


<ul id="layerslider_slides_code">
    <li class="layerslider_slides">
		
		<div class="draggable_wrapper">
    		<div class="draggable" style="position: relative;"></div>
    	</div>

    	<h2 class="layertitle">Layer Properties:</h2>
    	<table>
    		<tr>
    			<td>Title</td>
    			<th>Background</th>
    			<th>SlideDirection</th>
    			<th>SlideDelay</th>
    			<th>DurationIn</th>
    			<th>DurationOut</th>
    			<th>EasingIn</th>
    			<th>EasingOut</th>
    			<th>DelayIn</th>
    			<th>DelayOut</th>
    		</tr>
    		<tr>
    			<td><input type="text" name="title"></td>
    			<td>
    				<input type="text" name="background" class="layerslider_upload_input">
    				<button class="button-primary layerslider-bg-reset empty">Reset</button>
    			</td>
    			<td>
    				<select name="slidedirection">
    					<option>left</option>
    					<option selected="selected">right</option>
    					<option>top</option>
    					<option>bottom</option>
    				</select>
    			</td>
    			<td><input type="text" name="slidedelay" value="4000"></td>
    			<td><input type="text" name="durationin" value="1500"></td>
    			<td><input type="text" name="durationout" value="1500"></td>
    			<td>
    				<select name="easingin">
    					<option>linear</option>
    					<option>swing</option>
    					<option>easeInQuad</option>
    					<option>easeOutQuad</option>
    					<option>easeInOutQuad</option>
    					<option>easeInCubic</option>
    					<option>easeOutCubic</option>
    					<option>easeInOutCubic</option>
    					<option>easeInQuart</option>
    					<option>easeOutQuart</option>
    					<option>easeInOutQuart</option>
    					<option>easeInQuint</option>
    					<option>easeOutQuint</option>
    					<option selected="selected">easeInOutQuint</option>
    					<option>easeInSine</option>
    					<option>easeOutSine</option>
    					<option>easeInOutSine</option>
    					<option>easeInExpo</option>
    					<option>easeOutExpo</option>
    					<option>easeInOutExpo</option>
    					<option>easeInCirc</option>
    					<option>easeOutCirc</option>
    					<option>easeInOutCirc</option>
    					<option>easeInElastic</option>
    					<option>easeOutElastic</option>
    					<option>easeInOutElastic</option>
    					<option>easeInBack</option>
    					<option>easeOutBack</option>
    					<option>easeInOutBack</option>
    					<option>easeInBounce</option>
    					<option>easeOutBounce</option>
    					<option>easeInOutBounce</option>
    				</select>
    			</td>
    	    	<td>
    	    		<select name="easingout">
    	    			<option>linear</option>
    	    			<option>swing</option>
    	    			<option>easeInQuad</option>
    	    			<option>easeOutQuad</option>
    	    			<option>easeInOutQuad</option>
    	    			<option>easeInCubic</option>
    	    			<option>easeOutCubic</option>
    	    			<option>easeInOutCubic</option>
    	    			<option>easeInQuart</option>
    	    			<option>easeOutQuart</option>
    	    			<option>easeInOutQuart</option>
    	    			<option>easeInQuint</option>
    	    			<option>easeOutQuint</option>
    	    			<option selected="selected">easeInOutQuint</option>
    	    			<option>easeInSine</option>
    	    			<option>easeOutSine</option>
    	    			<option>easeInOutSine</option>
    	    			<option>easeInExpo</option>
    	    			<option>easeOutExpo</option>
    	    			<option>easeInOutExpo</option>
    	    			<option>easeInCirc</option>
    	    			<option>easeOutCirc</option>
    	    			<option>easeInOutCirc</option>
    	    			<option>easeInElastic</option>
    	    			<option>easeOutElastic</option>
    	    			<option>easeInOutElastic</option>
    	    			<option>easeInBack</option>
    	    			<option>easeOutBack</option>
    	    			<option>easeInOutBack</option>
    	    			<option>easeInBounce</option>
    	    			<option>easeOutBounce</option>
    	    			<option>easeInOutBounce</option>
    	    		</select>
    	    	</td>
    	    	<td><input type="text" name="delayin" value="0"></td>
    	    	<td><input type="text" name="delayout" value="0"></td>
    	    </tr>
    	</table>
    	<h2 class="layertitle">Sublayers:</h2>
    	<table>
    		<tbody class="sortable">
    		<tr>
    			<th></th>
    			<th></th>
    			<th>Type</th>
    			<th>HTML</th>
    			<th>Style</th>
    			<th>Top</th>
    			<th>Left</th>
    			<th>Image</th>
    			<th>Link</th>
    			<th>Target</th>
    			<th>P.Level</th>
    			<th>SlideDirection</th>
    			<th>SlideOutDirection</th>
    			<th>ParallaxIn</th>
    			<th>ParallaxOut</th>
    			<th>DurationIn</th>
    			<th>DurationOut</th>
    			<th>EasingIn</th>
    			<th>EasingOut</th>
    			<th>DelayIn</th>
    			<th>DelayOut</th>
    			<th></th>
    		</tr>
    		<tr class="layerslider_sublayer">
    			<td><input type="checkbox" name="selected" class="layerslider-layer-select"></td>
    			<td><div class="moveable"></div></td>
    			<td>
    				<select name="type">
    					<option>img</option>
    					<option>div</option>
    					<option>p</option>
    					<option>span</option>
    					<option>h1</option>
    					<option>h2</option>
    					<option>h3</option>
    					<option>h4</option>
    					<option>h5</option>
    					<option>h6</option>
    				</select>
    			</td>
    			<td><input type="text" name="html" value="" class="resize"></td>
				<td><input type="text" name="style" value="" class="resize"></td>
    			<td><input type="text" name="top" value="0"></td>
    			<td><input type="text" name="left" value="0"></td>
    			<td><input type="text" name="image" class="layerslider_upload_input"></td>
    			<td><input type="text" name="url" value="" class="resize"></td>
    			<td>
    				<select name="target">
    					<option>_self</option>
    					<option>_blank</option>
    					<option>_parent</option>
    					<option>_top</option>
    				</select>
    			</td>
    			<td><input type="text" name="level" value="2"></td>
    			<td>
    				<select name="slidedirection">
    					<option selected="selected">auto</option>
    					<option>left</option>
    					<option>right</option>
    					<option>top</option>
    					<option>bottom</option>
    					<option>fade</option>
    				</select>
    			</td>
 				<td>
				    <select name="slideoutdirection">
				    	<option selected="selected">auto</option>
				    	<option>left</option>
				    	<option>right</option>
				    	<option>top</option>
				    	<option>bottom</option>
				    	<option>fade</option>
				    </select>					
				</td>
    			<td><input type="text" name="parallaxin" value=".45"></td>
    			<td><input type="text" name="parallaxout" value=".45"></td>
    			<td><input type="text" name="durationin" value="1500"></td>
    			<td><input type="text" name="durationout" value="1500"></td>
    			<td>
    				<select name="easingin">
    					<option>linear</option>
    					<option>swing</option>
    					<option>easeInQuad</option>
    					<option>easeOutQuad</option>
    					<option>easeInOutQuad</option>
    					<option>easeInCubic</option>
    					<option>easeOutCubic</option>
    					<option>easeInOutCubic</option>
    					<option>easeInQuart</option>
    					<option>easeOutQuart</option>
    					<option>easeInOutQuart</option>
    					<option>easeInQuint</option>
    					<option>easeOutQuint</option>
    					<option selected="selected">easeInOutQuint</option>
    					<option>easeInSine</option>
    					<option>easeOutSine</option>
    					<option>easeInOutSine</option>
    					<option>easeInExpo</option>
    					<option>easeOutExpo</option>
    					<option>easeInOutExpo</option>
    					<option>easeInCirc</option>
    					<option>easeOutCirc</option>
    					<option>easeInOutCirc</option>
    					<option>easeInElastic</option>
    					<option>easeOutElastic</option>
    					<option>easeInOutElastic</option>
    					<option>easeInBack</option>
    					<option>easeOutBack</option>
    					<option>easeInOutBack</option>
    					<option>easeInBounce</option>
    					<option>easeOutBounce</option>
    					<option>easeInOutBounce</option>
    				</select>
    			</td>
    			<td>
    				<select name="easingout">
    					<option>linear</option>
    					<option>swing</option>
    					<option>easeInQuad</option>
    					<option>easeOutQuad</option>
    					<option>easeInOutQuad</option>
    					<option>easeInCubic</option>
    					<option>easeOutCubic</option>
    					<option>easeInOutCubic</option>
    					<option>easeInQuart</option>
    					<option>easeOutQuart</option>
    					<option>easeInOutQuart</option>
    					<option>easeInQuint</option>
    					<option>easeOutQuint</option>
    					<option selected="selected">easeInOutQuint</option>
    					<option>easeInSine</option>
    					<option>easeOutSine</option>
    					<option>easeInOutSine</option>
    					<option>easeInExpo</option>
    					<option>easeOutExpo</option>
    					<option>easeInOutExpo</option>
    					<option>easeInCirc</option>
    					<option>easeOutCirc</option>
    					<option>easeInOutCirc</option>
    					<option>easeInElastic</option>
    					<option>easeOutElastic</option>
    					<option>easeInOutElastic</option>
    					<option>easeInBack</option>
    					<option>easeOutBack</option>
    					<option>easeInOutBack</option>
    					<option>easeInBounce</option>
    					<option>easeOutBounce</option>
    					<option>easeInOutBounce</option>
    				</select>
    			</td>
    			<td><input type="text" name="delayin" value="0"></td>
    			<td><input type="text" name="delayout" value="0"></td>
    			<td><a href="#" class="remove button-primary">remove</a></a></td>
    		</tr>
    	</tbody>
    	</table>
		<p>
			<button class="layerslider_add_sublayer button-primary">Add New Sublayer</button>
			<button class="layerslider_remove_layer button-primary">Remove This Layer</button>
		</p>
    </li>
</ul>

<?php $slides = unserialize(get_option('layerslider-slides')); ?>
<?php $slides = !empty($slides) ? $slides : array(); ?>

<form method="post" action="<?php echo $_SERVER['REQUEST_URI']?>" id="layerslider_form">
    <div id="layerslider-tabs">
    	<button id="layerslider-add-tab" class="button-primary">Create new slider</button><input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    	<ul>
    		<?php foreach($slides as $slidekey => $slide) : ?>
			<li><a href="#tabs-<?php echo $slidekey+1?>"><i class="ls-hidden">LayerSlider </i>#<?php echo $slidekey+1?></a><span class="ui-icon ui-icon-close">X</span></li>
			<?php endforeach; ?>
		</ul>

		<?php foreach($slides as $slidekey => $slide) : ?>
		<div id="tabs-<?php echo $slidekey+1?>" class="layerslider_tabs">
			<table class="form-table ls-global-table">
				<tbody>
				<tr>
					<td colspan="2">
						<h2>Global Settings</h2>
						<a class="ls-openclose" href="#">minimize</a>
					</td>
				</tr>
				<tr valign="top">
  					<th scope="row"><strong>width</strong></th>
					<td>
   		     			<input type="text" name="width" value="<?php echo $slide['properties']['width']?>" />
   		     			<br/>
   		     			<span class="description">Width of the slider (for responsive layout you can use % as well). If you want to create a slider with responsive width which is compared to the width of the browser, don't forget to change forceResponsive to true.</span>
   		     		</td>
   		     	</tr>
        		<tr valign="top">
        			<th scope="row"><strong>height</strong></th>
        			<td>
        				<input type="text" name="height" value="<?php echo $slide['properties']['height']?>" />
        				<br/>
        				<span class="description">Height of the slider</span>
        			</td>
        		</tr>
	    		<tr valign="top">
	    			<th scope="row"><strong>forceResponsive</strong> : true or false</th>
	    			<td>
	    				<input type="text" name="forceresponsive" value="<?php echo $slide['properties']['forceresponsive']?>" />
	    				<br/>
	    				<span class="description">
	    					Change this property to true if you want to force responsive layout. Set the width value in percentage, for example: 90%
	    				</span><br><br>
	    				<strong class="description">Note, that in WordPress plugin you cannot use responsive height, unless you are CSS / HTML expert. To use responsive height, you must add specified height to the main container (where you are including LayerSlider), if you cannot do this, responsive height will not work because of HTML limitations. The forceResponsive property is only for responsive width with constant value of height (which is set in pixels).</strong>
	    			</td>
	    		</tr>
	    		<tr valign="top">
	    		    <th scope="row"><strong>sliderStyle</strong></th>
	    		    <td>
	    		    	<input class="big" type="text" name="sliderstyle" value="<?php echo $slide['properties']['sliderstyle']?>" />
	    		    	<br/>
	    		    	<span class="description">You can add your own style to the LayerSlider container if you want (for exampe margin top / bottom, etc). You can use any CSS properties.</span>
	    		    </td>
	    		</tr>
        		<tr valign="top">
        			<th scope="row"><strong>autoStart</strong> : true or false</th>
        			<td>
        				<input type="text" name="autostart" value="<?php echo $slide['properties']['autostart']?>" />
        				<br/>
        				<span class="description">If true, slideshow will automatically start after loading the page.</span>
        			</td>
        		</tr>
	    		<tr valign="top">
	    			<th scope="row"><strong>pauseOnHover</strong> : true or false</th>
	    			<td>
	    				<input type="text" name="pauseonhover" value="<?php echo $slide['properties']['pauseonhover']?>" />
	    				<br/>
	    				<span class="description">SlideShow will pause when mouse pointer is over LayerSlider.</span>
	    			</td>
	    		</tr>
				<tr valign="top">
        			<th scope="row"><strong>firstLayer</strong> : number (positive integer)</th>
        			<td>
        				<input type="text" name="firstlayer" value="<?php echo $slide['properties']['firstlayer']?>" />
        				<br/>
        				<span class="description">LayerSlider will begin with this layer.</span>
        			</td>
        		</tr>
				<tr valign="top">
					<th scope="row"><strong>animateFirstLayer</strong> : true or false</th>
					<td>
						<input type="text" name="animatefirstlayer" value="<?php echo !empty($slide['properties']['animatefirstlayer']) ? $slide['properties']['animatefirstlayer'] : 'false'?>" />
						<br/>
						<span class="description">If true, first layer will animate (slide in) instead of fading</span>
					</td>
				</tr>
        		<tr valign="top">
        			<th scope="row"><strong>twoWaySlideshow</strong> : true or false</th>
        			<td>
        				<input type="text" name="twowayslideshow" value="<?php echo $slide['properties']['twowayslideshow']?>" />
        				<br/>
        				<span class="description">If true, slideshow will go backwards if you click the prev button.</span>
        			</td>
       			 </tr>
				<tr valign="top">
        			<th scope="row"><strong>keybNav</strong> : true or false</th>
        			<td>
        				<input type="text" name="keybnav" value="<?php echo $slide['properties']['keybnav']?>" />
        				<br/>
        				<span class="description">Keyboard navigation. You can navigate with the left and right arrow keys.</span>
        			</td>
        		</tr>
        		<tr valign="top">
        			<th scope="row"><strong>imgPreload</strong> : true or false</th>
        			<td>
        				<input type="text" name="imgpreload" value="<?php echo $slide['properties']['imgpreload']?>" />
        				<br/>
        				<span class="description">Image preload. Preloads all images and background-images of the next layer.</span>
        			</td>
				</tr>
				<tr valign="top">
        			<th scope="row"><strong>navPrevNext</strong> : true or false</th>
        			<td>
        				<input type="text" name="navprevnext" value="<?php echo $slide['properties']['navprevnext']?>" />
        				<br/>
        				<span class="description">If false, Prev and Next buttons will be invisible.</span>
        			</td>
        		</tr>
        		<tr valign="top">
        			<th scope="row"><strong>navStartStop</strong> : true or false</th>
        			<td>
        				<input type="text" name="navstartstop" value="<?php echo $slide['properties']['navstartstop']?>" />
        				<br/>
        				<span class="description">If false, Start and Stop buttons will be invisible.</span>
        			</td>
        		</tr>
        		<tr valign="top">
        			<th scope="row"><strong>navButtons</strong> : true or false</th>
        			<td>
        				<input type="text" name="navbuttons" value="<?php echo $slide['properties']['navbuttons']?>" />
        				<br/>
        				<span class="description">If false, slide buttons will be invisible.</span>
        			</td>
        		</tr>
        		<tr valign="top">
        			<th scope="row"><strong>skin</strong> : name_of_the_skin</th>
        			<td>
        				<input type="text" name="skin" value="<?php echo $slide['properties']['skin']?>" />
        				<br/>
        				<span class="description">You can change the skin of the slider. Pre-defined skins are: defaultskin, lightskin, darkskin and if you don't want to show any skin, use: noskin</span>
        			</td>
        		</tr>
        		<tr valign="top">
        			<th scope="row"><strong>skinsPath</strong> : path_of_the_skins_folder/</th>
        			<td>
        				<input type="text" name="skinspath" value="<?php echo $slide['properties']['skinspath']?>" />
        				<br/>
        				<span class="description">You can change the default path of the skins folder. Note, that you must use the slash at the end of the path.</span>
        			</td>
        		</tr>
    		    <tr valign="top">
    		    	<th scope="row"><strong>backgroundColor</strong></th>
    		    	<td>
    		    		<input type="text" name="backgroundcolor" value="<?php echo $slide['properties']['backgroundcolor']?>" class="bgchange"/>
    		    		<br/>
    		    		<span class="description">
Background color of LayerSlider. You can use all CSS methods, like hexa colors, rgb(r,g,b) method, color names, etc. Note, that background sublayers are covering the background.</span>
    		    	</td>
    		    </tr>
    		    <tr valign="top">
    		    	<th scope="row"><strong>backgroundImage</strong></th>
    		    	<td>
    		    		<input type="text" name="backgroundimage" value="<?php echo $slide['properties']['backgroundimage']?>" class="layerslider_upload_input bgchange" />
    		    		<button class="button-primary layerslider-bg-reset empty">Reset</button>
    		    		<br/>
    		    		<span class="description">Background image of LayerSlider. This will be a fixed background image of LayerSlider by default. Note, that background sublayers are covering the global background image.</span>
    		    	</td>
    		    </tr>
        		<tr valign="top">
        			<th scope="row"><strong>yourLogo</strong></th>
        			<td>
        				<input type="text" name="yourlogo" value="<?php echo $slide['properties']['yourlogo']?>" class="layerslider_upload_input" />
        				<button class="button-primary layerslider-bg-reset empty">Reset</button>
        				<br/>
        				<span class="description">This is a fixed layer that will be shown above of LayerSlider container. For example if you want to display your own logo, etc., you can upload an image or choose one from the Media Library.</span>
        			</td>
        		</tr>
        		<tr valign="top">
        			<th scope="row"><strong>yourLogoStyle</strong></th>
        			<td>
        				<input type="text" name="yourlogostyle" class="big" value="<?php echo !empty($slide['properties']['yourlogostyle']) ? $slide['properties']['yourlogostyle'] : 'position: absolute; left: 10px; top: 10px; z-index: 1000;' ?>" class="layerslider_upload_input" />
        				<br/>
        				<span class="description">You can style your logo. You can use any CSS properties, for example you can add left and top properties to place the image inside the LayerSlider container anywhere you want.</span>
        			</td>
        		</tr>
        		<tr valign="top">
        			<th scope="row"><strong>yourLogoLink</strong></th>
        			<td>
        				<input type="text" name="yourlogolink" value="<?php echo $slide['properties']['yourlogolink']?>" />
        				<button class="button-primary layerslider-bg-reset empty">Reset</button>
        				<br/>
        				<span class="description">You can add a link to your logo. Set false is you want to display only an image without a link.</span>
        			</td>
        		</tr>
        		<tr valign="top">
        			<th scope="row"><strong>yourLogoTarget</strong></th>
        			<td>
        				<select name="yourlogotarget">
        					<option <?=($slide['properties']['yourlogotarget'] == '_self') ? 'selected="selected"' : ''?>>_self</option>
        					<option <?=($slide['properties']['yourlogotarget'] == '_blank') ? 'selected="selected"' : ''?>>_blank</option>
        				</select>
        				<br/>
        				<span class="description">If '_blank', the clicked url will open in a new window.</span>
        			</td>
        		</tr>

				<tr>
					<td colspan="2">
						<h2>LayerSlider API Callback Events</h2>
					</td>
				</tr>
    		    <tr valign="top">
    		    	<th scope="row"><strong>cbInit</strong></th>
    		    	<td>
    		    		<textarea name="cbinit"><?php echo !empty($slide['properties']['cbinit']) ? stripslashes($slide['properties']['cbinit']) : 'function() { }'?></textarea>
    		    		<br/>
    		    		<span class="description">Calling when the LayerSlider loaded.</span>
    		    	</td>
    		    </tr>
    		    <tr valign="top">
    		    	<th scope="row"><strong>cbStart</strong></th>
    		    	<td>
    		    		<textarea name="cbstart"><?php echo !empty($slide['properties']['cbstart']) ? stripslashes($slide['properties']['cbstart']) : 'function() { }'?></textarea>
    		    		<br/>
    		    		<span class="description">Calling when you click the slideshow start.</span>
    		    	</td>
    		    </tr>
    		    <tr valign="top">
    		    	<th scope="row"><strong>cbStop</strong></th>
    		    	<td>
    		    		<textarea name="cbstop"><?php echo !empty($slide['properties']['cbstop']) ? stripslashes($slide['properties']['cbstop']) : 'function() { }'?></textarea>
    		    		<br/>
    		    		<span class="description">Calling when click the slideshow stop / pause button.</span>
    		    	</td>
    		    </tr>
    		    <tr valign="top">
    		    	<th scope="row"><strong>cbPause</strong></th>
    		    	<td>
    		    		<textarea name="cbpause"><?php echo !empty($slide['properties']['cbpause']) ? stripslashes($slide['properties']['cbpause']) : 'function() { }'?></textarea>
    		    		<br/>
    		    		<span class="description">Calling when slideshow pauses (if pauseOnHover is true).</span>
    		    	</td>
    		    </tr>
    		    <tr valign="top">
    		    	<th scope="row"><strong>cbAnimStart</strong></th>
    		    	<td>
    		    		<textarea name="cbanimstart"><?php echo !empty($slide['properties']['cbanimstart']) ? stripslashes($slide['properties']['cbanimstart']) : 'function() { }'?></textarea>
    		    		<br/>
    		    		<span class="description">Calling when animation starts.</span>
    		    	</td>
    		    </tr>
    		    <tr valign="top">
    		    	<th scope="row"><strong>cbAnimStop</strong></th>
    		    	<td>
    		    		<textarea name="cbanimstop"><?php echo !empty($slide['properties']['cbanimstop']) ? stripslashes($slide['properties']['cbanimstop']) : 'function() { }'?></textarea>
    		    		<br/>
    		    		<span class="description">Calling when the animation of current layer ends, but the sublayers of this layer still may be animating.</span>
    		    	</td>
    		    </tr>
    		    <tr valign="top">
    		    	<th scope="row"><strong>cbPrev</strong></th>
    		    	<td>
    		    		<textarea name="cbprev"><?php echo !empty($slide['properties']['cbprev']) ? stripslashes($slide['properties']['cbprev']) : 'function() { }'?></textarea>
    		    		<br/>
    		    		<span class="description">Calling when you click the previous button (or if you use keyboard or touch navigation).</span>
    		    	</td>
    		    </tr>
    		    <tr valign="top">
    		    	<th scope="row"><strong>cbNext</strong></th>
    		    	<td>
    		    		<textarea name="cbnext"><?php echo !empty($slide['properties']['cbnext']) ? stripslashes($slide['properties']['cbnext']) : 'function() { }'?></textarea>
    		    		<br/>
    		    		<span class="description">Calling when you click the next button (or if you use keyboard or touch navigation).</span>
    		    	</td>
    		    </tr>
				</tbody>
			</table>
			
			<ul class="layerslider_slides_wrapper">
				<?php if(is_array($slide)) : ?>
				<?php if(is_array($slide['layers'])) : ?>
				<?php foreach($slide['layers'] as $layerkey => $layer) : ?>
				<li class="layerslider_slides">
					
					<div class="draggable_wrapper" style="width: <?php echo layerslider_check_unit($slide['properties']['width'])?>; height: <?php echo layerslider_check_unit($slide['properties']['height'])?>; position: relative;">
						<?php if(!empty($slide['properties']['yourlogo'])) : ?>
						<img src="<?php echo $slide['properties']['yourlogo']?>" style="<?php echo $slide['properties']['yourlogostyle']?>" class="layerslider-yourlogo-img">
						<?php endif;?>
						<div class="draggable" style="position: relative; background-image: url(<?php echo !empty($layer['properties']['background']) ? $layer['properties']['background'] : $slide['properties']['backgroundimage'] ?>); <?php echo  !empty($slide['properties']['backgroundcolor']) ? 'background-color: '.$slide['properties']['backgroundcolor'].'' : ''?>;">
							<?php if(is_array($layer['sublayers'])) : ?>
							<?php foreach($layer['sublayers'] as $sublayerkey => $sublayer) : ?>
								<?php if(empty($sublayer['type']) || $sublayer['type'] == 'img') { ?>
									<img src="<?php echo $sublayer['image']?>" style="position: absolute; top: <?php echo layerslider_check_unit($sublayer['top'])?>; left: <?php echo layerslider_check_unit($sublayer['left'])?>; z-index: <?php echo $sublayerkey?>;">
								<?php } else { ?>
									<<?php echo $sublayer['type']?> style="position: absolute; top:<?php echo layerslider_check_unit($sublayer['top'])?>; left:<?php echo layerslider_check_unit($sublayer['left'])?>; z-index: <?php echo $sublayerkey?>; <?php echo $sublayer['style']?>"><?php echo stripslashes($sublayer['html'])?></<?php echo $sublayer['type']?>>
								<?php } ?>
							<?php endforeach; ?>
							<?php endif; ?>
						</div>
					</div>

			    	<h2 class="layertitle">Layer Properties:</h2>
					<table>
						<tr>
							<th>Title</th>
							<th>Background</th>
							<th>SlideDirection</th>
							<th>SlideDelay</th>
							<th>DurationIn</th>
							<th>DurationOut</th>
							<th>EasingIn</th>
							<th>EasingOut</th>
							<th>DelayIn</th>
							<th>DelayOut</th>
						</tr>
						<tr>
							<td><input type="text" name="title" value="<?php echo $layer['properties']['title']?>" class="resize"></td>
							<td>
								<input type="text" name="background" class="layerslider_upload_input" value="<?php echo $layer['properties']['background']?>">
								<button class="button-primary layerslider-bg-reset empty">Reset</button>
							</td>
							<td>
								<select name="slidedirection">
									<option <?php echo ($layer['properties']['slidedirection'] == 'left') ? 'selected="selected"' : ''?>>left</option>
									<option <?php echo ($layer['properties']['slidedirection'] == 'right') ? 'selected="selected"' : ''?>>right</option>
									<option <?php echo ($layer['properties']['slidedirection'] == 'top') ? 'selected="selected"' : ''?>>top</option>
									<option <?php echo ($layer['properties']['slidedirection'] == 'bottom') ? 'selected="selected"' : ''?>>bottom</option>
								</select>
							</td>
							<td><input type="text" name="slidedelay" value="<?php echo $layer['properties']['slidedelay']?>"></td>
							<td><input type="text" name="durationin" value="<?php echo $layer['properties']['durationin']?>"></td>
							<td><input type="text" name="durationout" value="<?php echo $layer['properties']['durationout']?>"></td>
							<td>
								<select name="easingin">
									<option <?php echo ($layer['properties']['easingin'] == 'linear')				? 'selected="selected"' : ''?>>linear</option>
									<option <?php echo ($layer['properties']['easingin'] == 'swing')				? 'selected="selected"' : ''?>>swing</option>
									<option <?php echo ($layer['properties']['easingin'] == 'easeInQuad')			? 'selected="selected"' : ''?>>easeInQuad</option>
									<option <?php echo ($layer['properties']['easingin'] == 'easeOutQuad')		? 'selected="selected"' : ''?>>easeOutQuad</option>
									<option <?php echo ($layer['properties']['easingin'] == 'easeInOutQuad')		? 'selected="selected"' : ''?>>easeInOutQuad</option>
									<option <?php echo ($layer['properties']['easingin'] == 'easeInCubic')		? 'selected="selected"' : ''?>>easeInCubic</option>
									<option <?php echo ($layer['properties']['easingin'] == 'easeOutCubic')		? 'selected="selected"' : ''?>>easeOutCubic</option>
									<option <?php echo ($layer['properties']['easingin'] == 'easeInOutCubic')		? 'selected="selected"' : ''?>>easeInOutCubic</option>
									<option <?php echo ($layer['properties']['easingin'] == 'easeInQuart')		? 'selected="selected"' : ''?>>easeInQuart</option>
									<option <?php echo ($layer['properties']['easingin'] == 'easeOutQuart')		? 'selected="selected"' : ''?>>easeOutQuart</option>
									<option <?php echo ($layer['properties']['easingin'] == 'easeInOutQuart')		? 'selected="selected"' : ''?>>easeInOutQuart</option>
									<option <?php echo ($layer['properties']['easingin'] == 'easeInQuint')		? 'selected="selected"' : ''?>>easeInQuint</option>
									<option <?php echo ($layer['properties']['easingin'] == 'easeOutQuint')		? 'selected="selected"' : ''?>>easeOutQuint</option>
									<option <?php echo ($layer['properties']['easingin'] == 'easeInOutQuint')		? 'selected="selected"' : ''?>>easeInOutQuint</option>
									<option <?php echo ($layer['properties']['easingin'] == 'easeInSine')			? 'selected="selected"' : ''?>>easeInSine</option>
									<option <?php echo ($layer['properties']['easingin'] == 'easeOutSine')		? 'selected="selected"' : ''?>>easeOutSine</option>
									<option <?php echo ($layer['properties']['easingin'] == 'easeInOutSine')		? 'selected="selected"' : ''?>>easeInOutSine</option>
									<option <?php echo ($layer['properties']['easingin'] == 'easeInExpo')			? 'selected="selected"' : ''?>>easeInExpo</option>
									<option <?php echo ($layer['properties']['easingin'] == 'easeOutExpo')		? 'selected="selected"' : ''?>>easeOutExpo</option>
									<option <?php echo ($layer['properties']['easingin'] == 'easeInOutExpo')		? 'selected="selected"' : ''?>>easeInOutExpo</option>
									<option <?php echo ($layer['properties']['easingin'] == 'easeInCirc')			? 'selected="selected"' : ''?>>easeInCirc</option>
									<option <?php echo ($layer['properties']['easingin'] == 'easeOutCirc')		? 'selected="selected"' : ''?>>easeOutCirc</option>
									<option <?php echo ($layer['properties']['easingin'] == 'easeInOutCirc')		? 'selected="selected"' : ''?>>easeInOutCirc</option>
									<option <?php echo ($layer['properties']['easingin'] == 'easeInElastic')		? 'selected="selected"' : ''?>>easeInElastic</option>
									<option <?php echo ($layer['properties']['easingin'] == 'easeOutElastic')		? 'selected="selected"' : ''?>>easeOutElastic</option>
									<option <?php echo ($layer['properties']['easingin'] == 'easeInOutElastic')	? 'selected="selected"' : ''?>>easeInOutElastic</option>
									<option <?php echo ($layer['properties']['easingin'] == 'easeInBack')			? 'selected="selected"' : ''?>>easeInBack</option>
									<option <?php echo ($layer['properties']['easingin'] == 'easeOutBack')		? 'selected="selected"' : ''?>>easeOutBack</option>
									<option <?php echo ($layer['properties']['easingin'] == 'easeInOutBack')		? 'selected="selected"' : ''?>>easeInOutBack</option>
									<option <?php echo ($layer['properties']['easingin'] == 'easeInBounce')		? 'selected="selected"' : ''?>>easeInBounce</option>
									<option <?php echo ($layer['properties']['easingin'] == 'easeOutBounce')		? 'selected="selected"' : ''?>>easeOutBounce</option>
									<option <?php echo ($layer['properties']['easingin'] == 'easeInOutBounce')	? 'selected="selected"' : ''?>>easeInOutBounce</option>
								</select>
							</td>
							<td>
								<select name="easingout">
									<option <?php echo ($layer['properties']['easingout'] == 'linear')			? 'selected="selected"' : ''?>>linear</option>
									<option <?php echo ($layer['properties']['easingout'] == 'swing')				? 'selected="selected"' : ''?>>swing</option>
									<option <?php echo ($layer['properties']['easingout'] == 'easeInQuad')		? 'selected="selected"' : ''?>>easeInQuad</option>
									<option <?php echo ($layer['properties']['easingout'] == 'easeOutQuad')		? 'selected="selected"' : ''?>>easeOutQuad</option>
									<option <?php echo ($layer['properties']['easingout'] == 'easeInOutQuad')		? 'selected="selected"' : ''?>>easeInOutQuad</option>
									<option <?php echo ($layer['properties']['easingout'] == 'easeInCubic')		? 'selected="selected"' : ''?>>easeInCubic</option>
									<option <?php echo ($layer['properties']['easingout'] == 'easeOutCubic')		? 'selected="selected"' : ''?>>easeOutCubic</option>
									<option <?php echo ($layer['properties']['easingout'] == 'easeInOutCubic')	? 'selected="selected"' : ''?>>easeInOutCubic</option>
									<option <?php echo ($layer['properties']['easingout'] == 'easeInQuart')		? 'selected="selected"' : ''?>>easeInQuart</option>
									<option <?php echo ($layer['properties']['easingout'] == 'easeOutQuart')		? 'selected="selected"' : ''?>>easeOutQuart</option>
									<option <?php echo ($layer['properties']['easingout'] == 'easeInOutQuart')	? 'selected="selected"' : ''?>>easeInOutQuart</option>
									<option <?php echo ($layer['properties']['easingout'] == 'easeInQuint')		? 'selected="selected"' : ''?>>easeInQuint</option>
									<option <?php echo ($layer['properties']['easingout'] == 'easeOutQuint')		? 'selected="selected"' : ''?>>easeOutQuint</option>
									<option <?php echo ($layer['properties']['easingout'] == 'easeInOutQuint')	? 'selected="selected"' : ''?>>easeInOutQuint</option>
									<option <?php echo ($layer['properties']['easingout'] == 'easeInSine')		? 'selected="selected"' : ''?>>easeInSine</option>
									<option <?php echo ($layer['properties']['easingout'] == 'easeOutSine')		? 'selected="selected"' : ''?>>easeOutSine</option>
									<option <?php echo ($layer['properties']['easingout'] == 'easeInOutSine')		? 'selected="selected"' : ''?>>easeInOutSine</option>
									<option <?php echo ($layer['properties']['easingout'] == 'easeInExpo')		? 'selected="selected"' : ''?>>easeInExpo</option>
									<option <?php echo ($layer['properties']['easingout'] == 'easeOutExpo')		? 'selected="selected"' : ''?>>easeOutExpo</option>
									<option <?php echo ($layer['properties']['easingout'] == 'easeInOutExpo')		? 'selected="selected"' : ''?>>easeInOutExpo</option>
									<option <?php echo ($layer['properties']['easingout'] == 'easeInCirc')		? 'selected="selected"' : ''?>>easeInCirc</option>
									<option <?php echo ($layer['properties']['easingout'] == 'easeOutCirc')		? 'selected="selected"' : ''?>>easeOutCirc</option>
									<option <?php echo ($layer['properties']['easingout'] == 'easeInOutCirc')		? 'selected="selected"' : ''?>>easeInOutCirc</option>
									<option <?php echo ($layer['properties']['easingout'] == 'easeInElastic')		? 'selected="selected"' : ''?>>easeInElastic</option>
									<option <?php echo ($layer['properties']['easingout'] == 'easeOutElastic')	? 'selected="selected"' : ''?>>easeOutElastic</option>
									<option <?php echo ($layer['properties']['easingout'] == 'easeInOutElastic')	? 'selected="selected"' : ''?>>easeInOutElastic</option>
									<option <?php echo ($layer['properties']['easingout'] == 'easeInBack')		? 'selected="selected"' : ''?>>easeInBack</option>
									<option <?php echo ($layer['properties']['easingout'] == 'easeOutBack')		? 'selected="selected"' : ''?>>easeOutBack</option>
									<option <?php echo ($layer['properties']['easingout'] == 'easeInOutBack')		? 'selected="selected"' : ''?>>easeInOutBack</option>
									<option <?php echo ($layer['properties']['easingout'] == 'easeInBounce')		? 'selected="selected"' : ''?>>easeInBounce</option>
									<option <?php echo ($layer['properties']['easingout'] == 'easeOutBounce')		? 'selected="selected"' : ''?>>easeOutBounce</option>
									<option <?php echo ($layer['properties']['easingout'] == 'easeInOutBounce')	? 'selected="selected"' : ''?>>easeInOutBounce</option>
								</select>
							</td>
							<td><input type="text" name="delayin" value="<?php echo $layer['properties']['delayin']?>"></td>
							<td><input type="text" name="delayout" value="<?php echo $layer['properties']['delayout']?>"></td>
						</tr>
					</table>
					<h2 class="layertitle">Sublayers:</h2>
					<table>
						<tbody class="sortable">
						<tr>
							<th></th>
							<th></th>
							<th>Type</th>
							<th>HTML</th>
							<th>Style</th>
							<th>Top</th>
							<th>Left</th>
							<th>Image</th>
							<th>Link</th>
							<th>Target</th>
							<th>P.Level</th>
							<th>SlideDirection</th>
							<th>SlideOutDirection</th>
							<th>ParallaxIn</th>
							<th>ParallaxOut</th>
							<th>DurationIn</th>
							<th>DurationOut</th>
							<th>EasingIn</th>
							<th>EasingOut</th>
							<th>DelayIn</th>
							<th>DelayOut</th>
							<th></th>
						</tr>
						<?php if(is_array($layer['sublayers'])) : ?>
						<?php foreach($layer['sublayers'] as $sublayerkey => $sublayer) : ?>
						<tr>
							<td><input type="checkbox" name="selected" class="layerslider-layer-select"></td>
							<td><div class="moveable"></div></td>
							<td>
    							<select name="type">
    								<option <?php echo ($sublayer['type'] == 'img') ? 'selected="selected"' : ''?>>img</option>
    								<option <?php echo ($sublayer['type'] == 'div') ? 'selected="selected"' : ''?>>div</option>
    								<option <?php echo ($sublayer['type'] == 'p') ? 'selected="selected"' : ''?>>p</option>
    								<option <?php echo ($sublayer['type'] == 'span') ? 'selected="selected"' : ''?>>span</option>
    								<option <?php echo ($sublayer['type'] == 'h1') ? 'selected="selected"' : ''?>>h1</option>
    								<option <?php echo ($sublayer['type'] == 'h2') ? 'selected="selected"' : ''?>>h2</option>
    								<option <?php echo ($sublayer['type'] == 'h3') ? 'selected="selected"' : ''?>>h3</option>
    								<option <?php echo ($sublayer['type'] == 'h4') ? 'selected="selected"' : ''?>>h4</option>
    								<option <?php echo ($sublayer['type'] == 'h5') ? 'selected="selected"' : ''?>>h5</option>
    								<option <?php echo ($sublayer['type'] == 'h6') ? 'selected="selected"' : ''?>>h6</option>
    							</select>
							</td>
							<td><input type="text" name="html" value="<?php echo str_replace('"', '&quot;', stripslashes($sublayer['html']))?>" class="resize"></td>
							<td><input type="text" name="style" value="<?php echo $sublayer['style']?>" class="resize"></td>
							<td><input type="text" name="top" value="<?php echo $sublayer['top']?>"></td>
							<td><input type="text" name="left" value="<?php echo $sublayer['left']?>"></td>
							<td><input type="text" name="image" class="layerslider_upload_input" value="<?php echo $sublayer['image']?>"></td>
							<td><input type="text" name="url" value="<?php echo $sublayer['url']?>" class="resize"></td>
							<td>
    							<select name="target">
    								<option <?php echo ($sublayer['target'] == '_self') 		? 'selected="selected"' : ''?>>_self</option>
    								<option <?php echo ($sublayer['target'] == '_blank') 		? 'selected="selected"' : ''?>>_blank</option>
    								<option <?php echo ($sublayer['target'] == '_parent') 		? 'selected="selected"' : ''?>>_parent</option>
    								<option <?php echo ($sublayer['target'] == '_top') 			? 'selected="selected"' : ''?>>_top</option>
    							</select>
							</td>
							<td><input type="text" name="level" value="<?php echo $sublayer['level']?>"></td>
							<td>
								<select name="slidedirection">
									<option <?php echo ($sublayer['slidedirection'] == 'auto') 		? 'selected="selected"' : ''?>>auto</option>
									<option <?php echo ($sublayer['slidedirection'] == 'left') 		? 'selected="selected"' : ''?>>left</option>
									<option <?php echo ($sublayer['slidedirection'] == 'right') 	? 'selected="selected"' : ''?>>right</option>
									<option <?php echo ($sublayer['slidedirection'] == 'top')		? 'selected="selected"' : ''?>>top</option>
									<option <?php echo ($sublayer['slidedirection'] == 'bottom') 	? 'selected="selected"' : ''?>>bottom</option>
									<option <?php echo ($sublayer['slidedirection'] == 'fade') 		? 'selected="selected"' : ''?>>fade</option>
								</select>					
							</td>
							<td>
								<select name="slideoutdirection">
									<option <?php echo ($sublayer['slideoutdirection'] == 'auto') 		? 'selected="selected"' : ''?>>auto</option>
									<option <?php echo ($sublayer['slideoutdirection'] == 'left') 		? 'selected="selected"' : ''?>>left</option>
									<option <?php echo ($sublayer['slideoutdirection'] == 'right') 		? 'selected="selected"' : ''?>>right</option>
									<option <?php echo ($sublayer['slideoutdirection'] == 'top')		? 'selected="selected"' : ''?>>top</option>
									<option <?php echo ($sublayer['slideoutdirection'] == 'bottom') 	? 'selected="selected"' : ''?>>bottom</option>
									<option <?php echo ($sublayer['slideoutdirection'] == 'fade') 		? 'selected="selected"' : ''?>>fade</option>
								</select>					
							</td>
							<td><input type="text" name="parallaxin" value="<?php echo $sublayer['parallaxin']?>"></td>
							<td><input type="text" name="parallaxout" value="<?php echo $sublayer['parallaxout']?>"></td>
							<td><input type="text" name="durationin" value="<?php echo $sublayer['durationin']?>"></td>
							<td><input type="text" name="durationout" value="<?php echo $sublayer['durationout']?>"></td>
							<td>
								<select name="easingin">
									<option <?php echo ($sublayer['easingin'] == 'linear')				? 'selected="selected"' : ''?>>linear</option>
									<option <?php echo ($sublayer['easingin'] == 'swing')				? 'selected="selected"' : ''?>>swing</option>
									<option <?php echo ($sublayer['easingin'] == 'easeInQuad')			? 'selected="selected"' : ''?>>easeInQuad</option>
									<option <?php echo ($sublayer['easingin'] == 'easeOutQuad')		? 'selected="selected"' : ''?>>easeOutQuad</option>
									<option <?php echo ($sublayer['easingin'] == 'easeInOutQuad')		? 'selected="selected"' : ''?>>easeInOutQuad</option>
									<option <?php echo ($sublayer['easingin'] == 'easeInCubic')		? 'selected="selected"' : ''?>>easeInCubic</option>
									<option <?php echo ($sublayer['easingin'] == 'easeOutCubic')		? 'selected="selected"' : ''?>>easeOutCubic</option>
									<option <?php echo ($sublayer['easingin'] == 'easeInOutCubic')		? 'selected="selected"' : ''?>>easeInOutCubic</option>
									<option <?php echo ($sublayer['easingin'] == 'easeInQuart')		? 'selected="selected"' : ''?>>easeInQuart</option>
									<option <?php echo ($sublayer['easingin'] == 'easeOutQuart')		? 'selected="selected"' : ''?>>easeOutQuart</option>
									<option <?php echo ($sublayer['easingin'] == 'easeInOutQuart')		? 'selected="selected"' : ''?>>easeInOutQuart</option>
									<option <?php echo ($sublayer['easingin'] == 'easeInQuint')		? 'selected="selected"' : ''?>>easeInQuint</option>
									<option <?php echo ($sublayer['easingin'] == 'easeOutQuint')		? 'selected="selected"' : ''?>>easeOutQuint</option>
									<option <?php echo ($sublayer['easingin'] == 'easeInOutQuint')		? 'selected="selected"' : ''?>>easeInOutQuint</option>
									<option <?php echo ($sublayer['easingin'] == 'easeInSine')			? 'selected="selected"' : ''?>>easeInSine</option>
									<option <?php echo ($sublayer['easingin'] == 'easeOutSine')		? 'selected="selected"' : ''?>>easeOutSine</option>
									<option <?php echo ($sublayer['easingin'] == 'easeInOutSine')		? 'selected="selected"' : ''?>>easeInOutSine</option>
									<option <?php echo ($sublayer['easingin'] == 'easeInExpo')			? 'selected="selected"' : ''?>>easeInExpo</option>
									<option <?php echo ($sublayer['easingin'] == 'easeOutExpo')		? 'selected="selected"' : ''?>>easeOutExpo</option>
									<option <?php echo ($sublayer['easingin'] == 'easeInOutExpo')		? 'selected="selected"' : ''?>>easeInOutExpo</option>
									<option <?php echo ($sublayer['easingin'] == 'easeInCirc')			? 'selected="selected"' : ''?>>easeInCirc</option>
									<option <?php echo ($sublayer['easingin'] == 'easeOutCirc')		? 'selected="selected"' : ''?>>easeOutCirc</option>
									<option <?php echo ($sublayer['easingin'] == 'easeInOutCirc')		? 'selected="selected"' : ''?>>easeInOutCirc</option>
									<option <?php echo ($sublayer['easingin'] == 'easeInElastic')		? 'selected="selected"' : ''?>>easeInElastic</option>
									<option <?php echo ($sublayer['easingin'] == 'easeOutElastic')		? 'selected="selected"' : ''?>>easeOutElastic</option>
									<option <?php echo ($sublayer['easingin'] == 'easeInOutElastic')	? 'selected="selected"' : ''?>>easeInOutElastic</option>
									<option <?php echo ($sublayer['easingin'] == 'easeInBack')			? 'selected="selected"' : ''?>>easeInBack</option>
									<option <?php echo ($sublayer['easingin'] == 'easeOutBack')		? 'selected="selected"' : ''?>>easeOutBack</option>
									<option <?php echo ($sublayer['easingin'] == 'easeInOutBack')		? 'selected="selected"' : ''?>>easeInOutBack</option>
									<option <?php echo ($sublayer['easingin'] == 'easeInBounce')		? 'selected="selected"' : ''?>>easeInBounce</option>
									<option <?php echo ($sublayer['easingin'] == 'easeOutBounce')		? 'selected="selected"' : ''?>>easeOutBounce</option>
									<option <?php echo ($sublayer['easingin'] == 'easeInOutBounce')	? 'selected="selected"' : ''?>>easeInOutBounce</option>
								</select>
							</td>
							<td>
								<select name="easingout">
									<option <?php echo ($sublayer['easingout'] == 'linear')			? 'selected="selected"' : ''?>>linear</option>
									<option <?php echo ($sublayer['easingout'] == 'swing')				? 'selected="selected"' : ''?>>swing</option>
									<option <?php echo ($sublayer['easingout'] == 'easeInQuad')		? 'selected="selected"' : ''?>>easeInQuad</option>
									<option <?php echo ($sublayer['easingout'] == 'easeOutQuad')		? 'selected="selected"' : ''?>>easeOutQuad</option>
									<option <?php echo ($sublayer['easingout'] == 'easeInOutQuad')		? 'selected="selected"' : ''?>>easeInOutQuad</option>
									<option <?php echo ($sublayer['easingout'] == 'easeInCubic')		? 'selected="selected"' : ''?>>easeInCubic</option>
									<option <?php echo ($sublayer['easingout'] == 'easeOutCubic')		? 'selected="selected"' : ''?>>easeOutCubic</option>
									<option <?php echo ($sublayer['easingout'] == 'easeInOutCubic')	? 'selected="selected"' : ''?>>easeInOutCubic</option>
									<option <?php echo ($sublayer['easingout'] == 'easeInQuart')		? 'selected="selected"' : ''?>>easeInQuart</option>
									<option <?php echo ($sublayer['easingout'] == 'easeOutQuart')		? 'selected="selected"' : ''?>>easeOutQuart</option>
									<option <?php echo ($sublayer['easingout'] == 'easeInOutQuart')	? 'selected="selected"' : ''?>>easeInOutQuart</option>
									<option <?php echo ($sublayer['easingout'] == 'easeInQuint')		? 'selected="selected"' : ''?>>easeInQuint</option>
									<option <?php echo ($sublayer['easingout'] == 'easeOutQuint')		? 'selected="selected"' : ''?>>easeOutQuint</option>
									<option <?php echo ($sublayer['easingout'] == 'easeInOutQuint')	? 'selected="selected"' : ''?>>easeInOutQuint</option>
									<option <?php echo ($sublayer['easingout'] == 'easeInSine')		? 'selected="selected"' : ''?>>easeInSine</option>
									<option <?php echo ($sublayer['easingout'] == 'easeOutSine')		? 'selected="selected"' : ''?>>easeOutSine</option>
									<option <?php echo ($sublayer['easingout'] == 'easeInOutSine')		? 'selected="selected"' : ''?>>easeInOutSine</option>
									<option <?php echo ($sublayer['easingout'] == 'easeInExpo')		? 'selected="selected"' : ''?>>easeInExpo</option>
									<option <?php echo ($sublayer['easingout'] == 'easeOutExpo')		? 'selected="selected"' : ''?>>easeOutExpo</option>
									<option <?php echo ($sublayer['easingout'] == 'easeInOutExpo')		? 'selected="selected"' : ''?>>easeInOutExpo</option>
									<option <?php echo ($sublayer['easingout'] == 'easeInCirc')		? 'selected="selected"' : ''?>>easeInCirc</option>
									<option <?php echo ($sublayer['easingout'] == 'easeOutCirc')		? 'selected="selected"' : ''?>>easeOutCirc</option>
									<option <?php echo ($sublayer['easingout'] == 'easeInOutCirc')		? 'selected="selected"' : ''?>>easeInOutCirc</option>
									<option <?php echo ($sublayer['easingout'] == 'easeInElastic')		? 'selected="selected"' : ''?>>easeInElastic</option>
									<option <?php echo ($sublayer['easingout'] == 'easeOutElastic')	? 'selected="selected"' : ''?>>easeOutElastic</option>
									<option <?php echo ($sublayer['easingout'] == 'easeInOutElastic')	? 'selected="selected"' : ''?>>easeInOutElastic</option>
									<option <?php echo ($sublayer['easingout'] == 'easeInBack')		? 'selected="selected"' : ''?>>easeInBack</option>
									<option <?php echo ($sublayer['easingout'] == 'easeOutBack')		? 'selected="selected"' : ''?>>easeOutBack</option>
									<option <?php echo ($sublayer['easingout'] == 'easeInOutBack')		? 'selected="selected"' : ''?>>easeInOutBack</option>
									<option <?php echo ($sublayer['easingout'] == 'easeInBounce')		? 'selected="selected"' : ''?>>easeInBounce</option>
									<option <?php echo ($sublayer['easingout'] == 'easeOutBounce')		? 'selected="selected"' : ''?>>easeOutBounce</option>
									<option <?php echo ($sublayer['easingout'] == 'easeInOutBounce')	? 'selected="selected"' : ''?>>easeInOutBounce</option>
								</select>
							</td>
							<td><input type="text" name="delayin" value="<?php echo $sublayer['delayin']?>"></td>
							<td><input type="text" name="delayout" value="<?php echo $sublayer['delayout']?>"></td>
							<td><a href="#" class="remove button-primary">remove</a></a></td>
						</tr>
						<?php endforeach; ?>
						<?php endif; ?>
					</tbody>
					</table>
					<p>
						<button class="layerslider_add_sublayer button-primary">Add New Sublayer</button>
						<button class="layerslider_remove_layer button-primary">Remove This Layer</button>
					</p>
				</li>
				<?php endforeach; ?>
				<?php endif; ?>
				<?php endif; ?>
			</ul>
			<button class="layerslider_add_slide button-primary">Add New Layer</button>
			<button class="layerslider_sort_layers button-primary">Reorder Layers</button>
		</div>
		<?php endforeach; ?>
	</div>
	<p class="submit">
		<input type="hidden" name="posted" value="1">
    	<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>
</form>