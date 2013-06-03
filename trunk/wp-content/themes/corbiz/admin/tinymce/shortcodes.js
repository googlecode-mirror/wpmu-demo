/* SET LOCALIZED VARIABLES */
var columns_title = objectL10n.columns_title;
var columns_inner_title = objectL10n.columns_inner_title;
var elements_title = objectL10n.elements_title;
var list_title = objectL10n.list_title;
var onefourth_title = objectL10n.onefourth_title;
var onefourth_last_title = objectL10n.onefourth_last_title;
var onethird_title = objectL10n.onethird_title;
var onethird_last_title = objectL10n.onethird_last_title;
var onehalf_title = objectL10n.onehalf_title;
var onehalf_last_title = objectL10n.onehalf_last_title;
var twothird_title = objectL10n.twothird_title;
var twothird_last_title = objectL10n.twothird_last_title;
var threefourth_title = objectL10n.threefourth_title;
var threefourth_last_title = objectL10n.threefourth_last_title;
var onefifth_title = objectL10n.onefifth_title;
var onefifth_last_title = objectL10n.onefifth_last_title;
var onefourth_inner_title = objectL10n.onefourth_inner_title;
var onefourth_inner_last_title = objectL10n.onefourth_inner_last_title;
var onethird_inner_title = objectL10n.onethird_inner_title;
var onethird_inner_last_title = objectL10n.onethird_inner_last_title;
var onehalf_inner_title = objectL10n.onehalf_inner_title;
var onehalf_inner_last_title = objectL10n.onehalf_inner_last_title;
var twothird_inner_title = objectL10n.twothird_inner_title;
var twothird_inner_last_title = objectL10n.twothird_inner_last_title;
var threefourth_inner_title = objectL10n.threefourth_inner_title;
var threefourth_inner_last_title = objectL10n.threefourth_inner_last_title;
var dropcap_title = objectL10n.dropcap_title;
var pullquote_left_title = objectL10n.pullquote_left_title ;
var pullquote_right_title  = objectL10n.pullquote_right_title ;
var divider_title  = objectL10n.divider_title ;
var spacer_title  = objectL10n.spacer_title ;
var tabs_title  = objectL10n.tabs_title;
var toggle_title  = objectL10n.toggle_title;
var image_title  = objectL10n.image_title ;
var testimonial_title  = objectL10n.testimonial_title ;
var gmap_title  = objectL10n.gmap_title ;
var youtube_title  = objectL10n.youtube_title ;
var vimeo_title  = objectL10n.vimeo_title ;
var button_title  = objectL10n.button_title ;
var bigbutton_title  = objectL10n.bigbutton_title ;
var bulletlist_title  = objectL10n.bulletlist_title ;
var starlist_title  = objectL10n.starlist_title ;
var arrowlist_title  = objectL10n.arrowlist_title ;
var itemlist_title  = objectL10n.itemlist_title ;
var checklist_title  = objectL10n.checklist_title ;
var infobox_title  = objectL10n.infobox_title ;
var successbox_title  = objectL10n.successbox_title ;
var warningbox_title  = objectL10n.warningbox_title ;
var errorbox_title  = objectL10n.errorbox_title;
var portfolio_title  = objectL10n.portfolio_title;
var portfolio_3col_title = objectL10n.portfolio_3col_title;
var portfolio_4col_title = objectL10n.portfolio_4col_title;
var pricing_title = objectL10n.pricing_title;
var pricing_3col_title = objectL10n.pricing_3col_title;
var pricing_4col_title = objectL10n.pricing_4col_title;
var pricing_5col_title = objectL10n.pricing_5col_title;
var spacer_title = objectL10n.spacer_title;
var headingtext_title = objectL10n.headingtext_title;
var centertext_title = objectL10n.centertext_title;
var divider_title = objectL10n.divider_title;
var slogan_title = objectL10n.slogan_title;
var latestnews_title = objectL10n.latestnews_title;
var pagelist_title = objectL10n.pagelist_title;
var postlist_title = objectL10n.postlist_title;
var bloglist_title = objectL10n.bloglist_title;
var content_title = objectL10n.content_title;

// Creates a new plugin class and a custom listbox
(function() {
	tinymce.create('tinymce.plugins.shortcodes', {
    createControl : function(n, cm) {
			if(n=='columns'){
				
                var clb = cm.createListBox('columns', {
                     //title : columns_title,
                     title : columns_title,
                     onselect : function(v) { //Option value as parameter
					 
						         tinyMCE.execCommand('mceInsertContent',false,v); 
						                                       
                     }
                });
 
                // Add column values to the list box
                clb.add(onehalf_title, '[col_12][/col_12]');
                clb.add(onehalf_last_title, '[col_12_last][/col_12_last]');
                clb.add(onethird_title, '[col_13][/col_13]');
                clb.add(onethird_last_title, '[col_13_last][/col_13_last]');
                clb.add(onefourth_title, '[col_14][/col_14]');
                clb.add(onefourth_last_title, '[col_14_last][/col_14_last]');
                clb.add(twothird_title, '[col_23][/col_23]');
                clb.add(twothird_last_title, '[col_23_last][/col_23_last]');
                clb.add(threefourth_title, '[col_34][/col_34]');
                clb.add(threefourth_last_title, '[col_34_last][/col_34_last]');

                // Return the new list box instance
                return clb;
             }
 
 			if(n=='inner_columns'){
				
                var clb = cm.createListBox('inner_columns', {
                     //title : columns_title,
                     title : columns_inner_title,
                     onselect : function(v) { //Option value as parameter
					 
						         tinyMCE.execCommand('mceInsertContent',false,v); 
						                                       
                     }
                });
 
                // Add column values to the list box
                clb.add(onehalf_inner_title, '[col_12_inner][/col_12_inner]');
                clb.add(onehalf_inner_last_title, '[col_12_inner_last][/col_12_inner_last]');
                clb.add(onethird_inner_title, '[col_13_inner][/col_13_inner]');
                clb.add(onethird_inner_last_title, '[col_13_inner_last][/col_13_inner_last]');
                clb.add(onefourth_inner_title, '[col_14_inner][/col_14_inner]');
                clb.add(onefourth_inner_last_title, '[col_14_inner_last][/col_14_inner_last]')
                clb.add(twothird_inner_title, '[col_23_inner][/col_23_inner]');
                clb.add(twothird_inner_last_title, '[col_23_inner_last][/col_23_inner_last]');
                clb.add(threefourth_inner_title, '[col_34_inner][/col_34_inner]');
                clb.add(threefourth_inner_last_title, '[col_34_inner_last][/col_34_inner_last]');

                // Return the new list box instance
                return clb;
             }
 
			if(n=='elements'){
				
                var mlb = cm.createListBox('elements', {
                     //title : elements_title,
                     title : elements_title,
                     onselect : function(v) { //Option value as parameter
					 
						         tinyMCE.execCommand('mceInsertContent',false,v);
						                                       
                     }
                });
 
                // Add column values to the list box
                mlb.add(headingtext_title, '[heading_text]Heading Title[/heading_text]');
                mlb.add(centertext_title, '[center_text]Your text or others elements goes here[/center_text]');
                mlb.add(spacer_title, '[spacer height=]');
                mlb.add(divider_title, '[divider type="line|shadow"]');
                mlb.add(slogan_title, '[slogan]Your slogan text here[/slogan]');
                mlb.add(dropcap_title, '[dropcap][/dropcap]');
                mlb.add(pullquote_left_title, '[pullquote_left][/pullquote_left]');
                mlb.add(pullquote_right_title, '[pullquote_right][/pullquote_right]');
                mlb.add(tabs_title, '[tabs]'+"\r\n"+'[tab title="your title here"]your content here[/tab]'+"\r\n"+'[/tabs]');
                mlb.add(toggle_title, '[toggle title="your title here"]your content here[/toggle]');
                mlb.add(image_title, '[image_style source="" align="left|center|right" size="small|medium|big" style_image="rounded|square" add_class="" lightbox="your custom uploaded image url" margin_bottom=""]');
                mlb.add(testimonial_title, '[testimonialbox]your image and text here[/testimonialbox]');
                mlb.add(button_title, '[button link="" color=""][/button]');
                mlb.add(gmap_title, '[gmap width="" height="" latitude="" longitude="" zoom="" html="" popup=""]');
                mlb.add(youtube_title, '[youtube_video id= width="" height=""]');
                mlb.add(vimeo_title, '[vimeo_video id= width="" height=""]'); 
                mlb.add(infobox_title, '[info][/info]');
                mlb.add(successbox_title, '[success][/success]');
                mlb.add(warningbox_title, '[warning][/warning]');
                mlb.add(errorbox_title, '[error][/error]'); 

                // Return the new list box instance
                return mlb;
             }

			 if(n=='list'){
				
                var mlb = cm.createListBox('list', {
                     //title : elements_title,
                     title : list_title,
                     onselect : function(v) { //Option value as parameter
					 
						         tinyMCE.execCommand('mceInsertContent',false,v);
						                                       
                     }
                });
 
                // Add column values to the list box
                mlb.add(bulletlist_title, '[bulletlist][/bulletlist]');
                mlb.add(starlist_title, '[starlist][/starlist]');
                mlb.add(checklist_title, '[checklist][/checklist]');
                mlb.add(arrowlist_title, '[arrowlist][/arrowlist]');
                mlb.add(itemlist_title, '[itemlist][/itemlist]'); 

                // Return the new list box instance
                return mlb;
             }
       
      if(n=='portfolio'){
				
                var mlb = cm.createListBox('portfolio', {
                     title : portfolio_title,
                     onselect : function(v) { //Option value as parameter
					 
						         tinyMCE.execCommand('mceInsertContent',false,v);
						                                       
                     }
                });
 
                // Add column values to the list box
                mlb.add(portfolio_3col_title, '[portfolio column="3" orderby="date" order="DESC" num=-1 description="true" filter="true"]');
                mlb.add(portfolio_4col_title, '[portfolio column="4" orderby="date" order="DESC" num=-1 description="true" filter="true"]'); 

                // Return the new list box instance
                return mlb;
             }
      
      if(n=='pricing'){
				
                var mlb = cm.createListBox('pricing', {
                     title : pricing_title,
                     onselect : function(v) { //Option value as parameter
					 
						         tinyMCE.execCommand('mceInsertContent',false,v);
						                                       
                     }
                });
 
                // Add column values to the list box
                mlb.add(pricing_3col_title, '[pricing_table columns=3 category=""]');
                mlb.add(pricing_4col_title, '[pricing_table columns=4 category=""]');
                mlb.add(pricing_5col_title, '[pricing_table columns=5 category=""]'); 

                // Return the new list box instance
                return mlb;
             }
             
      if(n=='content'){
				
                var mlb = cm.createListBox('content', {
                     title : content_title,
                     onselect : function(v) { //Option value as parameter
					 
						         tinyMCE.execCommand('mceInsertContent',false,v);
						                                       
                     }
                });
 
                // Add column values to the list box
                mlb.add(pagelist_title, '[pagelist parent_page="" num=4 orderby="date" image_style="rounded|square|none" image_align="left|center|right" image_size="small|medium|big" column=2|3|4 fullwidth=true|false readmore_text="Read more" text_limit=20 margin_bottom=""]');
                mlb.add(postlist_title, '[postlist category="" num=4 orderby="date" image_style="rounded|square|none" image_align="left|center|right" image_size="small|medium|big" column=2|3|4 fullwidth=true|false readmore_text="Read more" text_limit=20 margin_bottom=""]');   ;
                mlb.add(bloglist_title, '[blog cat="" num=3 nopaging="false"');
                mlb.add(latestnews_title, '[latestnews cat="" num=3 orderby="date" text_limit= margin_bottom=]'); 

                // Return the new list box instance
                return mlb;
             }
             
      return null;
		}
	});
 
	// Register plugin
	tinymce.PluginManager.add('shortcodes', tinymce.plugins.shortcodes);
	
})();
