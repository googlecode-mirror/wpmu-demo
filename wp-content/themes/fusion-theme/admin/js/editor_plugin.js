(
	function(){
	
		tinymce.create(
			"tinymce.plugins.ThemeShortcodes",
			{
				init: function(d,e) {},
				createControl:function(d,e)
				{
				
					if(d=="theme_shortcodes_button"){
					
						d=e.createMenuButton( "theme_shortcodes_button",{
							title:"Insert Shortcode",
							icons:false
							});
							
							var a=this;d.onRenderMenu.add(function(c,b){
								
                                c=b.addMenu({title:"Headings"});
										a.addImmediate(c,"Headeing h1","[h1]Your content here...[/h1]" );
										a.addImmediate(c,"Headeing h2","[h2]Your content here...[/h2]" );
										a.addImmediate(c,"Headeing h3","[h3]Your content here...[/h3]" );
										a.addImmediate(c,"Headeing h4","[h4]Your content here...[/h4]" );
										a.addImmediate(c,"Headeing h5","[h5]Your content here...[/h5]" );
										a.addImmediate(c,"Headeing h6","[h6]Your content here...[/h6]" );
                                        
                               c=b.addMenu({title:"Buttons"});
                                        a.addImmediate(c,"Small button", '[link_button href="#" size="small"]Your text here...[/link_button]');
                                        a.addImmediate(c,"Small button style 1", '[link_button href="#" size="small" style="style1"]Your text here...[/link_button]');
                                        a.addImmediate(c,"Small button style 2", '[link_button href="#" size="small" style="style2"]Your text here...[/link_button]');
                                        a.addImmediate(c,"Small button style 3", '[link_button href="#" size="small" style="style3"]Your text here...[/link_button]');
                                        a.addImmediate(c,"Small button style 4", '[link_button href="#" size="small" style="style4"]Your text here...[/link_button]');
                                        a.addImmediate(c,"Small button style 5", '[link_button href="#" size="small" style="style5"]Your text here...[/link_button]');
										a.addImmediate(c,"Medium button", '[link_button href="#" size="medium"]Your text here...[/link_button]');
                                        a.addImmediate(c,"Medium button style 1", '[link_button href="#" size="medium" style="style1"]Your text here...[/link_button]');
                                        a.addImmediate(c,"Medium button style 2", '[link_button href="#" size="medium" style="style2"]Your text here...[/link_button]');
                                        a.addImmediate(c,"Medium button style 3", '[link_button href="#" size="medium" style="style3"]Your text here...[/link_button]');
                                        a.addImmediate(c,"Medium button style 4", '[link_button href="#" size="medium" style="style4"]Your text here...[/link_button]');
                                        a.addImmediate(c,"Medium button style 5", '[link_button href="#" size="medium" style="style5"]Your text here...[/link_button]');
								        a.addImmediate(c,"Large button", '[link_button href="#" size="large"]Your text here...[/link_button]');
                                        a.addImmediate(c,"Large button style 1", '[link_button href="#" size="large" style="style1"]Your text here...[/link_button]');
                                        a.addImmediate(c,"Large button style 2", '[link_button href="#" size="large" style="style2"]Your text here...[/link_button]');
                                        a.addImmediate(c,"Large button style 3", '[link_button href="#" size="large" style="style3"]Your text here...[/link_button]');
                                        a.addImmediate(c,"Large button style 4", '[link_button href="#" size="large" style="style4"]Your text here...[/link_button]');
                                        a.addImmediate(c,"Large button style 5", '[link_button href="#" size="large" style="style5"]Your text here...[/link_button]');
                                
                                b.addSeparator();
                                
								c=b.addMenu({title:"Column 1/4"});
										a.addImmediate(c,"First Column", '[one_fourth_first]Your content here...[/one_fourth_first]');
                                        a.addImmediate(c,"Column", '[one_fourth]Your content here...[/one_fourth]');
                                        a.addImmediate(c,"Last Column", '[one_fourth_last]Your content here...[/one_fourth_last]');
                                        
								c=b.addMenu({title:"Column 1/3"});
										a.addImmediate(c,"First Column", '[one_third_first]Your content here...[/one_third_first]');
                                        a.addImmediate(c,"Column", '[one_third]Your content here...[/one_third]');
                                        a.addImmediate(c,"Last Column", '[one_third_last]Your content here...[/one_third_last]');
                                        
								c=b.addMenu({title:"Column 1/2"});
										a.addImmediate(c,"First Column", '[one_half_first]Your content here...[/one_half_first]');
                                        a.addImmediate(c,"Column", '[one_half]Your content here...[/one_third]');
                                        a.addImmediate(c,"Last Column", '[one_half_last]Your content here...[/one_half_last]');
                                        
								c=b.addMenu({title:"Column 2/3"});
										a.addImmediate(c,"First Column", '[two_thirds_first]Your content here...[/two_thirds_first]');
                                        a.addImmediate(c,"Last Column", '[two_thirds_last]Your content here...[/two_thirds_last]');
                                        
								c=b.addMenu({title:"Column 3/4"});
										a.addImmediate(c,"First Column", '[three_fourths_first]Your content here...[/three_fourths_first]');
                                        a.addImmediate(c,"Last Column", '[three_fourths_last]Your content here...[/three_fourths_last]');
                                        
                                b.addSeparator();
                                
                                a.addImmediate(b,"UL type 'bullet'", '[lists type="bullet"]<ul><li>Coffee</li><li>Tea</li><li>Milk</li></ul>[/lists]');
								
                                c=b.addMenu({title:"Boxes"});
										a.addImmediate(c,"Info Box", '[box_info]Your content here...[/box_info]');
                                        a.addImmediate(c,"Warning Box", '[box_warning]Your content here...[/box_warning]');
										a.addImmediate(c,"Check Box", '[box_check]Your content here...[/box_check]');
                                        a.addImmediate(c,"Help Box", '[box_help]Your content here...[/box_help]');
                                        a.addImmediate(c,"Stop Box", '[box_stop]Your content here...[/box_stop]');
                                
                                a.addImmediate(b,"Accordion Box", '[accordion_box][accordion title="Title goes here"]Your content here...[/accordion][accordion title="Title goes here"]Your content here...[/accordion][accordion title="Title goes here"]Your content here...[/accordion][/accordion_box]');
                                a.addImmediate(b,"Toggle Box", '[toggle_box][toggle title="Title goes here"]Your content here...[/toggle][toggle title="Title goes here"]Your content here...[/toggle][toggle title="Title goes here"]Your content here...[/toggle][/toggle_box]');
                                a.addImmediate(b,"Tabs", '[tabs tab1="Tab 1 Title" tab2="Tab 2 Title"][tab]Your content here...[/tab][tab]Your content here...[/tab][/tabs]');

                                c=b.addMenu({title:"Dropcaps"});
                                		a.addImmediate(c,"Dropcap", '[dropcap]a[/dropcap]');
                                        a.addImmediate(c,"Dropcap 1", '[dropcap1]a[/dropcap1]');
                                        a.addImmediate(c,"Dropcap 2", '[dropcap2]a[/dropcap2]');
                                
                                a.addImmediate(b,"Pricing Table", '<div class="theme_table"> <table> <tbody> <tr class="description"> <td class="column_features"></td> <td class="free">Free Plan</td> <td>Basic Plan</td> <td class="selected">Professional</td> <td>Business</td> </tr> <tr class="price"> <td class="column_features"></td> <td class="free">&euro;0<br /> <small>per month</small></td> <td>&pound;9<br /> <small>per month</small></td> <td class="selected">$99<br /> <small>per month</small></td> <td>&yen;199<br /> <small>per month</small></td> </tr> <tr> <td class="column_features">Disk Storage</td> <td class="free">10GB</td> <td>100GB</td> <td class="selected">200GB</td> <td>1000GB</td> </tr> <tr> <td class="column_features">Monthly Bandwidth</td> <td class="free">100GB</td> <td>1000GB</td> <td class="selected">2000GB</td> <td>Unlimited</td> </tr> <tr> <td class="column_features">Domain Name</td> <td class="free">1</td> <td>10</td> <td class="selected">100</td> <td>Unlimited</td> </tr> <tr> <td class="column_features">Subdomain</td> <td class="free">1</td> <td>100</td> <td class="selected">Unlimited</td> <td>Unlimited</td> </tr> <tr> <td class="column_features">CPANEL</td> <td class="free">&mdash;</td> <td>+</td> <td class="selected">+</td> <td>+</td> </tr> <tr> <td class="column_features">Email Accounts</td> <td class="free">10</td> <td>Unlimited</td> <td class="selected">Unlimited</td> <td>Unlimited</td> </tr> <tr> <td class="column_features">MySQL Databases</td> <td class="free">1x1GB</td> <td>2x1GB</td> <td class="selected">2x10GB</td> <td>2x100GB</td> </tr> <tr> <td class="column_features">Setup Fee</td> <td class="free">&mdash;</td> <td>&mdash;</td> <td class="selected">&mdash;</td> <td>&mdash;</td> </tr> <tr class="buttons"> <td class="column_features"></td><td class="free">[link_button href="#" size="small"]sign up[/link_button]</td><td>[link_button href="#" size="small"]sign up[/link_button]</td><td class="selected">[link_button href="#" size="small"]sign up[/link_button]</td><td>[link_button href="#" size="small"]sign up[/link_button]</td> </tr> </tbody> </table> </div>');
                                 
                                a.addImmediate(b,"Quotation", '[blockquote]Your content here...<cite>Walt Disney</cite>[/blockquote]');       
                                a.addImmediate(b,"Code", '[code]Your content here...[/code]');
                                a.addImmediate(b,"Preformatted Text", '[pre]Your content here...[/pre]');
                                a.addImmediate(b,"Horizontal Line", '[hr][/hr]');
                                a.addImmediate(b,"Float Clear", '<div class="clear"></div>');
                                
                                
                                
							});
						return d
					
					}
					
					return null
				},
		
				addImmediate:function(d,e,a){d.add({title:e,onclick:function(){tinyMCE.activeEditor.execCommand( "mceInsertContent",false,a)}})}
				
			}
		);
		
		tinymce.PluginManager.add( "ThemeShortcodes", tinymce.plugins.ThemeShortcodes);
	}
)();