;(function($) { $(document).ready(function(){	


	// "use strict";

	// custom selector
	$.expr[':'].hasId = function(obj, index, meta, stack) {
		return (meta[3] == $(obj).data('id'));
	};

	$.expr[':'].hasPreset = function(obj, index, meta, stack) {
		return (meta[3] == $(obj).data('presetId'));
	};

	log = function(data){
		console.log(data);
	};

	var parent = $('#unoslider');

	// main app module
	var application = {

		transitions: {
			swap: ['top', 'right', 'bottom', 'left'],
			stretch: ['center', 'vertical', 'horizontal', 'alternate'],
			squeeze: ['center', 'vertical', 'horizontal', 'alternate'],
			shrink: ['topleft', 'topright', 'bottomleft', 'bottomright'],
			grow: ['topleft', 'topright', 'bottomleft', 'bottomright'],
			slide_in: ['top', 'right', 'bottom', 'left', 'alternate_vertical', 'alternate_horizontal'],
			slide_out: ['top', 'right', 'bottom', 'left', 'alternate_vertical', 'alternate_horizontal'],
			drop: ['topleft', 'topright', 'bottomleft', 'bottomright', 'top', 'right', 'bottom', 'left', 'alternate_vertical', 'alternate_horizontal'],
			appear: ['topleft', 'topright', 'bottomleft', 'bottomright', 'top', 'right', 'bottom', 'left', 'alternate_vertical', 'alternate_horizontal'],
			flash: [],
			fade: []
		},

		directions: {
			horizontal: ['top', 'bottom', 'topleft', 'topright', 'bottomleft', 'bottomright'],
			vertical: ['left', 'right', 'topleft', 'topright', 'bottomleft', 'bottomright'],
			diagonal: ['topleft', 'topright', 'bottomleft', 'bottomright'],
			random: [],
			spiral: ['topleft', 'topright', 'bottomleft', 'bottomright'],
			horizontal_zigzag: ['topleft', 'topright', 'bottomleft', 'bottomright'],
			vertical_zigzag: ['topleft', 'topright', 'bottomleft', 'bottomright'],
			chess: [],
			explode: ['center', 'top', 'right', 'bottom', 'left'],
			implode: ['center', 'top', 'right', 'bottom', 'left']
		},

		run: function(){
			var unoslider_page = true;
			if($('#unoslider').length == 0)
				unoslider_page = false;

			if(unoslider_page === true){
				// options sidebar
				sidebar.init();
				presets.init();

				// slides list manager
				slides.init();

				// HTML slides
				html_slide.init();

				// image slides
				image_slide.init();

				// Advanced options
				advanced.init();

				// label in input
				application.inset_label();

				// ETC
				application.drag_notice();

				// animation dropdown selector
				application.change_dropdown();

				// tooltips
				helper.tooltips();

				// title label
				application.title_label();

				// switch buttons
				application.switch_buttons();

				// handle disabling and enabling controls
				application.disable_control('undr_navigation', ['undr_navigation_autohide', 'undr_navigation_autohide_play', 'undr_navigation_autohide_pause', 'undr_navigation_autohide_next', 'undr_navigation_autohide_prev']);
				application.disable_control('undr_indicator', ['undr_indicator_autohide']);
				application.disable_control('undr_slideshow', ['undr_slideshow_autostart', 'undr_slideshow_timer', 'undr_slideshow_hoverPause', 'undr_slideshow_continuous', 'undr_slideshow_infinite', 'undr_slideshow_speed']);				
			}

			// unsaved event when an input changed
			$('#unoslider input, #unoslider select').live('change', function(){
				helper.unsaved();
			});

			// cancel each lightbox
			helper.bind('.cancel', 'click', function(e){
				$.colorbox.close();
				e.preventDefault();
			});
		},

		title_label: function(){
			var val = $('#title').val();
		
			if(val.length === 0)
				$('#title-prompt-text').show();
			
			$('#title').blur(function(){
				var val = $(this).val();
				if(val.length === 0)
					$('#title-prompt-text').show();
			});
			
			$('#title').focus(function(){
				$('#title-prompt-text').hide();
			});
		},

		switch_buttons: function(){
			$('.switch.slideshow').unoslider_switch({
				affected_inputs: ['undr_slideshow_autostart', 'undr_slideshow_timer', 'undr_slideshow_hoverPause', 'undr_slideshow_continuous', 'undr_slideshow_infinite', 'undr_slideshow_speed'],
				enable: function(){
					$('#slide-it-slideshow').slideDown(200);
				},
				disable: function(){
					$('#slide-it-slideshow').slideUp(200);
				}
			});
			
			$('.switch.navigation').unoslider_switch({
				affected_inputs: ['undr_navigation_autohide', 'undr_navigation_autohide_play', 'undr_navigation_autohide_pause', 'undr_navigation_autohide_next', 'undr_navigation_autohide_prev'],
				enable: function(){
					$('#slide-it-navigation').slideDown(200);
				},
				disable: function(){
					$('#slide-it-navigation').slideUp(200);
				}
			});
		},

		disable_control: function(id, affected){
			for(var i in affected){
				if($('#'+id).is(':checked')){
					$('#'+affected[i]).removeAttr('disabled');
				}else{
					$('#'+affected[i]).attr('disabled', 'disabled');			
				}
			}

			$('#'+id).change(function(){
				for(i in affected){
					if($('#'+affected[i]).is(':disabled')){
						$('#'+affected[i]).removeAttr('disabled');
					}else{
						$('#'+affected[i]).attr('disabled', 'disabled');
					}
				}
			});
		},		

		drag_notice: function(){
			if(localStorage.drag_alert_hide === undefined){
				if($('#slides').find('.slide').length > 2){
					$('.drag_notice_area', parent).show();
					application.drag_notice_close();
				}
			}
		},

		drag_notice_close: function(){
			$(document).delegate('.drag_close', 'click', function(e){
				localStorage.setItem('drag_alert_hide', true);
				$('.drag_notice_area', parent).slideUp('fast');
			});			
		},

		inset_label: function(){

			var labels = $('.labeled_input');

			labels.each(function(){
				var self = $(this);
				var val = $('input.inset', self).val();
		
				if(val.length === 0)
					$('label.inset', self).show();
				
				$('input.inset', self).blur(function(){
					var val = $(this).val();
					if(val.length === 0)
						$('label.inset', self).show();
				});
				
				$('input.inset', self).focus(function(){
					$('label.inset', self).hide();
				});

			});
		},

		change_variation: function(self){
			var transition = self.val();
			
			$('.undr_variation:visible').empty();
			
			$.each(application.transitions[transition], function(){
				$('.undr_variation:visible').append($('<option></option>').html(this.toString()));
			});
		},

		change_direction: function(self){
			var type = self.val();

			$('.undr_direction:visible').empty();
			
			$.each(application.directions[type], function(){
				$('.undr_direction:visible').append($('<option></option>').html(this.toString()));
			});
		},

		change_dropdown: function(){
			helper.bind('.undr_transition', 'change', function(){
				application.change_variation($(this));
			});

			helper.bind('.undr_pattern', 'change', function(){
				application.change_direction($(this));
			});
		}
	};

	/***********
	// helpers
	***********/
	var helper = {
		return_false: function(event){
			event.preventDefault();
			event.stopPropagation();	
		},

		// returns the slider width and height
		get_size: function(){
			var size = {};
			size.width = $('#undr_width', parent).val();
			size.height = $('#undr_height', parent).val();
			return size;
		},

		// set unsaved flag
		unsaved: function(){
			$('.postbox.save', parent).addClass('unsaved');
			$('h2 span.unsaved').show();

			$(window).bind('beforeunload', function(event) {
				event.stopPropagation();
				event.returnValue = "The changes you have made are not saved.";
				return event.returnValue;
			});
		},

		// remove unsaved flag
		saved: function(){
			$('.postbox.save').removeClass('unsaved');
			$('h2 span.unsaved').hide();
		},

		// delegate helper
		bind: function(query, event, callback){
			$(document).undelegate(query, event).delegate(query, event, function(e){
				callback.call(this, e);
			});
		},

		esc: function(callback){
			helper.bind(document, 'keyup', function(e){
				if(e.keyCode == 27){
					callback.call(this, e);
					e.stopPropagation();
				}
			});
		},

		tooltips: function(){
			$('dfn').tooltip();
		}
	};

	/*******************
	// Options sidebar
	*******************/
	var sidebar = {
		init: function(){
			sidebar.preview();
		},

		preview: function(){

			helper.bind('#preview', 'click', function(e){
				helper.return_false(e);

				var dimension = helper.get_size();

				if(jQuery('#presets_list').is(':visible') && jQuery('#presets_list').children().length == 0)
					return alert('The presets list are empty. Please add at least one preset or create a custom animation');

				$.colorbox({
					href: $(this).attr('href'),
					width: parseInt(dimension.width) + 100,
					opacity: 0.5,
					top: '10%'
				});
			});
		}
	};

	/**************
	// Presets
	**************/
	var presets = {

		container: $('#presets'),

		list: [
			'chess',
			'flash',
			'spiral_reversed',
			'spiral',
			'sq_appear',
			'sq_flyoff',
			'sq_drop',
			'sq_squeeze',
			'sq_random',
			'sq_diagonal_rev',
			'sq_diagonal',
			'sq_fade_random',
			'sq_fade_diagonal_rev',
			'sq_fade_diagonal',
			'explode',
			'implode',
			'fountain',
			'blind_bottom',
			'blind_top',
			'blind_right',
			'blind_left',
			'shot_right',
			'shot_left',
			'alternate_vertical',
			'alternate_horizontal',
			'zipper_right',
			'zipper_left',
			'bar_slide_random',
			'bar_slide_bottomright',
			'bar_slide_topright',
			'bar_slide_topleft',
			'bar_fade_bottom',
			'bar_fade_top',
			'bar_fade_right',
			'bar_fade_left',
			'bar_fade_random',
			'v_slide_top',
			'h_slide_right',
			'v_slide_bottom',
			'h_slide_left',
			'stretch',
			'squeez',
			'fade',
			'none'
		],

		// edited preset containder
		edited: null,

		init: function(){

			// generate presets dropdown
			presets.generate_dropdown();

			// bind to events
			presets.binds();

			// sortable items
			presets.sortable();
		},

		binds: function(){

			// open dropdown
			helper.bind('#presets .hint', 'click', function(e){
				presets.create_input($(this));
				presets.open_dropdown();

				e.stopPropagation();
			});

			// close dropdown
			helper.bind('html', 'click', function(e){
				if(presets.container.find('.presets_filter').is(':visible')){
					presets.remove_input();
					presets.close_dropdown();
				}
			});

			// keyboard navigation in dropdown list
			helper.bind('#presets .hint input', 'keydown', function(e){
				if(e.keyCode == 38 || e.keyCode == 40 || e.keyCode == 13 || e.keyCode == 27){
					presets.keyboard_navigation(e.keyCode, e);

					helper.return_false(e);
				}
			});

			// select preset from list with mouse
			helper.bind('.dropdown li', 'click', function(e){
				presets.append_list($(this));

				// trigger close event
				$('html').trigger('click');
			});

			// prevent .hind input from reopen list
			helper.bind('#presets .hint input', 'click', function(e){
				e.stopPropagation();
			});

			// don't close when click to preset_list
			helper.bind('.dropdown', 'click', function(e){
				e.stopPropagation();
			});

			// show preview
			helper.bind('.preset_preview', 'click', function(e){
				presets.preview($(this).parent().data());

				e.stopPropagation();
			});

			// destroy preset
			helper.bind('.preset_destroy', 'click', function(e){
				presets.destroy($(this));

				e.stopPropagation();
			});

			// edit preset
			helper.bind('.preset_edit', 'click', function(e){
				var $this = $(this).parents('li');

				presets.edit($this.data());

				presets.edited = $this;

				helper.return_false(e);
			});

			// remove from list of selected
			helper.bind('.preset_remove', 'click', function(e){
				presets.remove_from_list($(this));

				e.preventDefault();
			});

			// live filter in dropdown
			helper.bind('.presets_filter', 'keyup', function(e){
				if(e.keyCode !== 38 && e.keyCode !== 40 && e.keyCode !== 13 && e.keyCode !== 27)
					presets.filter($(this).val());
			});

			// add active class to item
			helper.bind('.dropdown li:not(.presets_group)', 'mouseenter', function(e){
				presets.container.find('.dropdown li').removeClass('active');
				$(this).addClass('active');
			});

			// remove active class from item
			helper.bind('.dropdown', 'mouseleave', function(e){
				presets.container.find('.dropdown li').removeClass('active');
			});

			// save animation as preset
			helper.bind('.save_as_preset', 'click', function(e){
				presets.save_as_preset();

				helper.return_false(e);
			});

			// update preset
			helper.bind('.update_preset', 'click', function(e){
				presets.update();

				helper.return_false(e);
			});

			// create new preset
			helper.bind('.create_new_preset', 'click', function(e){
				presets.open_presets_editor(function(){
					$('.update_preset').hide();
				});

				helper.return_false(e);
			});

			// regenerate preset preview on input change
			helper.bind('#presets_editor input, #presets_editor select', 'change', function(e){
				presets.regenerate_unoslider();

				helper.return_false(e);
			});
		},

		sortable: function(){
			$('#presets_list').sortable({
				axis: 'y',
				cursor: 'move',
				distance: 5,
				update: function(event, ui) { 
					var final_position = ui.item.index();
					helper.unsaved();
				}
			});

			$('#presets_list').disableSelection();	
		},

		// create dropdown list
		generate_dropdown: function(){

			// dropdown container
			var dropdown = $('<div class="dropdown"></div>').appendTo(presets.container);
			var ul_wrapper = $('<ul></ul>').appendTo(dropdown);

			var custom_presets = $.parseJSON($('#custom_presets_list').val());

			var optgroup = $('<li class="presets_group">Custom Presets</li>').hide().appendTo(ul_wrapper);
			if(custom_presets.length > 0) optgroup.show();

			// append custom presets items
			$.each(custom_presets, function(i){
				var preset = custom_presets[i];

				var item = $('<li><a href="#" class="preset_preview" title="Preview"></a><span>'+preset.name+'</span><span class="preset_actions"><a href="#" class="preset_edit" title="Edit">E</a><a href="#" class="preset_destroy" title="Delete">X</a></span></li>').data('presetId', preset.id).data('presetName', preset.name).appendTo(ul_wrapper);
			});

			$('<li class="presets_group">Default Presets</li>').appendTo(ul_wrapper);

			// append presets items
			$.each(presets.list, function(i){
				var preset = presets.list[i];

				var item = $('<li><a href="#" class="preset_preview" title="Preview"></a><span>'+preset+'</span></li>').data('presetId', preset).data('presetName', preset).appendTo(ul_wrapper);
			});

			// hide selected presets
			presets.prefill_dropdown();

			// hide dropdown by default
			dropdown.hide();
		},
	
		// hide already selected items in dropdown
		prefill_dropdown: function(){
			var selected_items = presets.container.find('#presets_list li');
			var dropdown = presets.container.find('.dropdown');

			selected_items.each(function(){
				var preset = $(this).data('presetId');

				// mark as selected and hide
				dropdown.find('li:hasPreset('+preset+')').addClass('hidden').hide();
			});
		},

		// replace text with input
		create_input: function(self){
			var input = $('<input type="text" class="presets_filter">');
			var placeholder = self.text();

			self.html(input).data('placeholder', placeholder);

			input.focus();
		},

		// remove input field
		remove_input: function(){
			var hint = $(presets.container).find('.hint');
			var placeholder = hint.data('placeholder');

			// replace input with placeholder
			hint.text(placeholder);
		},

		// show dropdown list
		open_dropdown: function(){
			var dropdown = presets.container.find('.dropdown');

			dropdown.fadeIn(100);

			presets.focus_first_element();
		},

		// hide dropdown list
		close_dropdown: function(){
			presets.container.find('.dropdown').hide();

			// remove search filter
			presets.remove_search_filter();
		},

		// highlight first element in dropdown
		focus_first_element: function(){
			var items = presets.container.find('.dropdown li:not(.hidden):not(:hidden):not(.presets_group)');

			// remove all highlights
			presets.container.find('.dropdown li').removeClass('active');

			// highlight first item
			items.eq(0).addClass('active');
		},

		// cursot movement, enter select, esc cancel
		keyboard_navigation: function(key){

			switch(key){
				case 38: // key up
					presets.key_up();					
					break;
				case 40: // key down
					presets.key_down();
					break;
				case 13: // enter
					var dropdown = presets.container.find('.dropdown');

					if(dropdown.is(':visible')){
						var active = dropdown.find('.active');
						var input = presets.container.find('.hint input');

						presets.append_list(active);
						presets.close_dropdown();
						input.val('');
					}

					break;
				case 27: // esc
					var dropdown = presets.container.find('.dropdown');

					// trigger close event
					$('html').trigger('click');
					break; 
			}

			// keep moving caret in view
			presets.keep_in_view();
		},

		key_up: function(){
			var active = $('.dropdown').find('.active');

			if(active.prevAll(':visible:not(.presets_group)').eq(0).length != 0)
				active.removeClass('active').prevAll(':visible:not(.presets_group)').eq(0).addClass('active');
		},

		key_down: function(){
			var active = $('.dropdown').find('.active');
			var dropdown = presets.container.find('.dropdown');

			if(dropdown.is(':hidden')){
				presets.open_dropdown();
			}else{
				if(active.length == 0){
					dropdown.find('ul li:visible:not(.presets_group)').eq(0).addClass('active');
				}

				if(active.nextAll(':visible:not(.presets_group)').eq(0).length != 0)
					active.removeClass('active').nextAll(':visible:not(.presets_group)').eq(0).addClass('active');				
			}
		},

		// scroll dropdown content in order to keep an active element in a view
		keep_in_view: function(){
			var active = $('.dropdown').find('.active');
			var container = $('.dropdown ul');
			var max_height = parseInt(container.css('max-height'));

			var visible_top = container.scrollTop();
			var visible_bottom = max_height + visible_top;

			var high_top = active.position().top + container.scrollTop();
			var high_bottom = high_top + active.outerHeight();

			if(high_bottom >= visible_bottom){
				if(high_bottom - max_height > 0){
					container.scrollTop(high_bottom - max_height);
				}else{
					container.scrollTop(0);
				}
			}else if(high_top < visible_top){
				container.scrollTop(high_top);
			}
		},

		append_list: function(item){
			var preset_id = item.data('presetId');
			var preset_name = item.data('presetName');

			if(preset_id !== preset_name)
				preset_id = parseInt(preset_id);

			// append to list
			$('<li><a href="#" class="preset_preview" title="Preview"></a>'+preset_name+'<a href="#" class="preset_remove" title="Remove from this list">x</a></li>').data('presetId', preset_id).data('presetName', preset_name).appendTo($('#presets_list', '#presets'));

			// hide items marked as hidden
			item.addClass('hidden').hide();

			helper.unsaved();
		},

		remove_from_list: function(item){
			var parent = item.parent();
			var preset = parent.data('presetId');
			var item_in_list = presets.container.find('.dropdown li:hasPreset('+preset+')');

			// show in dropdown
			item_in_list.removeClass('hidden').show();

			// remove from the list
			item.parent().remove();

			helper.unsaved();
		},

		// search filter
		filter: function(query){
			var dropdown = presets.container.find('.dropdown');
			var all_items = dropdown.find('ul li:not(.hidden) span:contains("'+query+'")');
			var no_results = dropdown.find('.no_results');

			// hide all item in order to show up only the found ones
			dropdown.find('li').hide();

			// remove not found notice
			if(no_results.is(':visible')) no_results.remove();

			// show dropdown if it is closed and a user start typing
			if(query != '' && dropdown.is(':hidden')){
				presets.open_dropdown();
			}

			var items_count = 0;
			
			$.grep(all_items, function(item, i){

				var $item = $(item);

				if(query.length == 0){
					// handle backspace and other keys like end, del, insert, etc
					presets.remove_search_filter();
				}else{
					// highlight
					$item.html($item.text().replace(new RegExp(query, 'g'), '<em>'+query+'</em>'));
				}


				// show only found items
				$item.parent().show();

				// focus first item
				presets.focus_first_element();

				items_count++;
			});
			

			// search term not found
			if(items_count == 0) $('<div class="no_results">No results match "'+query+'"</div>').appendTo(dropdown);
		},

		// remove highlight and show all items
		remove_search_filter: function(){
			var dropdown = presets.container.find('.dropdown');
			var unselected = dropdown.find('li:not(.hidden)');
			var all_items = dropdown.find('ul li *');
			var whitelist = "span, a";

			all_items.not(whitelist).each(function(){
				var $this = $(this);
				var content = $this.contents();
				$this.replaceWith(content);
			});
			
			// show all unselected items
			unselected.show();
		},

		// create new preset from custom transition panel
		save_as_preset: function(){

			var preset_name = prompt('Name your Preset', '');

			// canceled propmt
			if(preset_name === null)
				return false;

			// empty string provided
			if(preset_name === '')
				alert("Preset name can't be empty");

			var optgroup = presets.container.find('.presets_group');

			if(optgroup.is(':hidden')) optgroup.show();

			var animation = {
				speed: parseInt(jQuery('#undr_animation_speed').val()),
				delay: parseInt(jQuery('#undr_animation_delay').val()),
				transition: jQuery('#undr_transition').val(),
				variation: jQuery('#undr_variation').val(),
				pattern: jQuery('#undr_pattern').val(),
				direction: jQuery('#undr_direction').val()
			};

			var block = {
				vertical: parseInt(jQuery('#undr_block_vertical').val()),
				horizontal: parseInt(jQuery('#undr_block_horizontal').val())
			};

			var dropdown = $('.dropdown ul');

			// save to db
			$.ajax({
				url: unoslider.ajaxurl + '?action=preset_save',
				type: 'POST',
				data: {
					nonce: unoslider.nonce,
					animation: animation,
					block: block,
					title: preset_name
				},
				success: function(response){
					// append to dropdown
					var item = $('<li><a href="#" class="preset_preview" title="Preview"></a><span>'+preset_name+'</span><span class="preset_actions"><a href="#" class="preset_edit" title="Edit">E</a><a href="#" class="preset_destroy" title="Delete">X</a></span></li>').data('presetId', response.id).data('presetName', preset_name).prependTo(dropdown);

					// switch back to presets tab
					$('#sidebar-presets').addClass('active');
					$('#sidebar-transition').removeClass('active');
					$('.tab-presets').addClass('active');
					$('.tab-transition').removeClass('active');

					// add preset to the list
					presets.append_list(item);

					// close colorbox window (if open)
					$.colorbox.close();
				}
			});
		},

		// opens colorbox with custom animation editor
		open_presets_editor: function(callback){
			var size = helper.get_size();

			size.width = size.width < 600 ? 600 : size.width;

			$.colorbox({ 
				href: unoslider.ajaxurl + "?action=preset_editor",
				top: '10%',
				opacity: 0.5,
				escKey: false,
				overlayClose: false,
				innerWidth: parseInt(size.width),
				onComplete: function(){
					if($.isFunction(callback))
						callback.call();
					presets.append_slider_to_canvas();
					presets.run_slider_in_editor();
					helper.tooltips();
				}
			});
		},

		// create a slider and initialize it
		append_slider_to_canvas: function(){

			var ul = $('<ul class="unoslider" id="presets_preview" ></ul>');
			var canvas = $('.canvas').append(ul);

			var slide;
			$('.preview_item', '#slides').each(function(i){
				var $this = jQuery(this);

				if($this.hasClass('html_data')){ // html
					var content = $this.val();
					
					var div_pattern = /^<div/i;
					var is_in_div = div_pattern.test(content);

					slide = content;

					if(!is_in_div){
						slide = '<div>' + content + '</div>';
					}				

				}else{ // image
					slide = '<img src="'+$this.val()+'" />';
				}

				var slide_item = $('<li>'+slide+'</li>').appendTo(ul);
			});
		},

		run_slider_in_editor: function(){
			var size = helper.get_size();

			var animation = {
				speed: parseInt($('#undr_animation_speed').val()),
				delay: parseInt($('#undr_animation_delay').val()),
				transition: $('.undr_transition').val(),
				variation: $('.undr_variation').val(),
				pattern: $('.undr_pattern').val(),
				direction: $('.undr_direction').val()
			};

			var block = {
				vertical: parseInt($('#undr_block_vertical').val()),
				horizontal: parseInt($('#undr_block_horizontal').val())
			};

			// start unoslider
			$('#presets_preview').unoslider({
				width: size.width,
				height: size.height,
				responsive: false,
				indicator: false,
				navigation: false,
				slideshow: {
					speed: 0.5
				},
				animation: animation,
				block: block
			});

			$.colorbox.resize();
		},

		run_slider_in_preview: function(){
			var size = helper.get_size();

			// start unoslider
			$('#presets_preview').unoslider({
				width: size.width,
				height: size.height,
				responsive: false,
				indicator: false,
				navigation: false,
				slideshow: {
					speed: 0.5
				},
				preset: [JSON.parse($('.preset_object').val())]
			});

			$.colorbox.resize();
		},

		// destroy and recreate slider
		regenerate_unoslider: function(){
			$('#presets_preview').remove();

			presets.append_slider_to_canvas();
			presets.run_slider_in_editor();
		},

		// preview preset
		preview: function(preset){
			var preset_id = preset.presetId;
			var preset_name = preset.presetName;

			var size = helper.get_size();

			var uri = {
				action: 'preset_preview',
				preset_id: preset_id,
				preset_name: preset_name
			};

			$.colorbox({ 
				href: unoslider.ajaxurl +'?'+ $.param(uri),
				top: '10%',
				opacity: 0.5,
				innerWidth: parseInt(size.width) + 20,
				onComplete: function(){
					presets.append_slider_to_canvas();
					presets.run_slider_in_preview();
				}
			});
		},

		// destroy preset
		destroy: function(preset){
			if(confirm('This preset will be deleted permanently.')){
				var item = preset.parents('li');
				var presetId = item.data('presetId');

				// remove from database
				$.ajax({
					url: unoslider.ajaxurl,
					type: 'POST',
					data: {
						nonce: unoslider.nonce,
						action: 'preset_destroy',
						id: presetId
					},
					success: function(response){
						// remove from dropdown
						item.remove();
					}
				});
			}
		},

		// edit preset
		edit: function(preset){

			// get preset data
			$.ajax({
				url: unoslider.ajaxurl,
				type: 'GET',
				data: {
					action: 'preset_get',
					id: preset.presetId
				},
				success: function(data){
					presets.open_presets_editor(function(){
						// display edit button
						$('.update_preset').show();

						// hide create button
						$('.save_as_preset').hide();

						// set edited values
						$('#undr_block_vertical').val(data.block.vertical);
						$('#undr_block_horizontal').val(data.block.horizontal);
						$('#undr_animation_speed').val(data.animation.speed);
						$('#undr_animation_delay').val(data.animation.delay);
						$('#undr_transition').val(data.animation.transition);
						$('#undr_pattern').val(data.animation.pattern);

						application.change_direction($('#undr_pattern'));
						application.change_variation($('#undr_transition'));

						$('#undr_variation').val(data.animation.variation);
						$('#undr_direction').val(data.animation.direction);

						$('#preset_id').val(preset.presetId);

						$('#preset_name').val(data.title);
					});
				}
			});
		},

		// update preset
		update: function(){
			var preset_name = prompt('Name your Preset', $('#preset_name').val());

			// canceled propmt
			if(preset_name === null)
				return false;

			// empty string provided
			if(preset_name === '')
				alert("Preset name can't be empty");

			var animation = {
				speed: parseInt($('#undr_animation_speed').val()),
				delay: parseInt($('#undr_animation_delay').val()),
				transition: $('#undr_transition').val(),
				variation: $('#undr_variation').val(),
				pattern: $('#undr_pattern').val(),
				direction: $('#undr_direction').val()
			};

			var block = {
				vertical: parseInt($('#undr_block_vertical').val()),
				horizontal: parseInt($('#undr_block_horizontal').val())
			};

			// save to db
			$.ajax({
				url: unoslider.ajaxurl,
				type: 'POST',
				data: {
					nonce: unoslider.nonce,
					action: 'preset_save',
					animation: animation,
					block: block,
					title: preset_name,
					id: $('#preset_id').val()
				},
				success: function(response){
					$.colorbox.close();

					// update preset name in the dropdown
					presets.edited.data('presetName', preset_name).find('span:eq(0)').text(preset_name);
				}
			});
		}
	};

	/******************************
	// List of slides operations
	******************************/
	var slides = {

		cloneId: 0,

		init: function(){
			slides.drag_and_drop();
			slides.clone();
			slides.destroy();
			slides.save();

			slides.edit_link();
		},

		// hover over thumbnail
		edit_link: function(){

			$(document).delegate('.thumb-container', 'mouseenter', function(){
				$('.thumb-overlay', this).stop().animate({top: '0px'}, 150);
			});

			$(document).delegate('.thumb-container', 'mouseleave', function(){
				$('.thumb-overlay', this).stop().animate({top: '70px'}, 150);
			});
		},

		// Drag and Drop
		drag_and_drop: function(){
			$('#slides', parent).sortable({
				axis: 'y',
				containment: 'parent',
				handle: '.handler',
				items: 'li.slide:not(.new)',
				cursor: 'move',
				update: function() { 
					helper.unsaved();
				}
			});

			$('#slides', parent).disableSelection();
		},

		// duplicate slide
		clone: function(){
			$(document).delegate('.clone', 'click', function(e){

				var parent_item = $(this, parent).parents('.slide');

				var clone = parent_item.clone();

				clone.insertAfter(parent_item);

				slides.generate_id(clone);

				helper.unsaved();

				application.drag_notice();
				
				helper.return_false(e);
			});
		},

		// create slide
		generate_id: function(clone){
			var random = Math.floor(Math.random()*10000);

			clone.find('.tabs a:eq(0)').attr({href: '#new_title_'+slides.cloneId});
			clone.find('.tabs a:eq(1)').attr({href: '#new_link_'+slides.cloneId});

			clone.find('.tab-content .tab-pane:eq(0)').attr({id: 'new_title_'+slides.cloneId});
			clone.find('.tab-content .tab-pane:eq(1)').attr({id: 'new_link_'+slides.cloneId});

			slides.cloneId++;
		},

		// remove slide
		destroy: function(){
			$(document).delegate('.remove', 'click', function(e){

				if(confirm('Are you sure?')){
					$(this, parent).parents('.slide').remove();
					helper.unsaved();
				}
				
				helper.return_false(e);
			});
		},

		// save slider
		save: function(){
			$('.unoslider_new').ajaxForm({
				url: unoslider.ajaxurl,
				data: {
					action: 'unoslider_save',
					nonce : unoslider.nonce
				},
				dataType: 'json',
				beforeSubmit: slides.before_submit,
				success : slides.success,
				error: slides.error
			});
		},

		before_submit: function(formData, jqForm, options){
			$('.postbox.save').prepend('<div id="undr_progress_overlay">Saving...</div>');

			// add presets to formData
			if($('#sidebar-presets').is(':visible')){
				$('#presets_list li').each(function(){
					var $this = $(this);
					formData.push({
						name: 'undr_presets[]',
						value: JSON.stringify({
							name: $this.data('presetName'),
							id: $this.data('presetId')
						}, null)
					});
				});
			}
		},

		success: function(response, statusText, xhr, $form){
			if(response.success){
				$('#undr_progress_overlay').addClass('saved').html('Successfully Saved');

				setTimeout(function(){
					$('#undr_progress_overlay').fadeOut('slow', function(){
						$(this).remove();
					});
				}, 1000);
			}
					
			if(response.last_id)
				$('#unoslider_id').val(response.last_id);
					
			helper.saved();
			$(window).unbind('beforeunload');
		},

		error: function(){
			$('#undr_progress_overlay').addClass('failure').html('FAILED!');
				
			setTimeout(function(){
				$('#undr_progress_overlay').fadeOut('slow', function(){
					$(this).remove();
				});
			}, 1000);	
		}
	};

	/*******************
	// Add HTML slides
	*******************/
	var html_slide = {

		init: function(){
			html_slide.run();
		},

		run: function(){

			// click on "add new"
			$(document).delegate('.open_html_editor', 'click', function(e){

				// open editor in lightbox
				html_slide.open_editor(this);

				// preventDefault
				helper.return_false(e);
			});			
		},

		open_editor: function(item){
			var size = helper.get_size();

			$.colorbox({ 
				href: unoslider.ajaxurl + "?action=advanced_inline_html", 
				top: '10%',
				opacity: 0.5,
				escKey: false,
				overlayClose: false,
				innerWidth: parseInt(size.width) + 20,
				innerHeight: parseInt(size.height) + 65,
				onComplete: function(){
					html_slide.init_editor(item);
				}
			});			
		},

		init_editor: function(item){
			var size = helper.get_size();
			var canvas = $('.canvas');
			
			canvas.width(size.width).height(size.height);

			html_slide.load_old_data(item);
			
			$('.html_editor_preview').hide();
			
			// close - don't save
			$(document).undelegate('.html_editor_cancel', 'click').delegate('.html_editor_cancel', 'click', function(e){
				$.colorbox.close();				
				helper.return_false(e);
			});

			// close - save
			$(document).undelegate('.html_editor_save', 'click').delegate('.html_editor_save', 'click', function(e){
				$.colorbox.close();				
				html_slide.save_slide(item);
				helper.return_false(e);
			});

			// edit
			$(document).undelegate('.html_editor_edit', 'click').delegate('.html_editor_edit', 'click', function(e){
				html_slide.display_textarea();
				$('.html_editor_edit').hide();
				$('.html_editor_preview').show();
				helper.return_false(e);
			});

			// preview
			$(document).undelegate('.html_editor_preview', 'click').delegate('.html_editor_preview', 'click', function(e){
				html_slide.render_preview();
				$('.html_editor_preview').hide();
				$('.html_editor_edit').show();
				helper.return_false(e);
			});
		},

		load_old_data: function(item){
			var $item = $(item);

			if($item.hasClass('edit')){
				var old_value = $item.parents('.slide').find('.html_data').val();
				var canvas = $('.canvas');
				canvas.html(old_value);
				canvas.data('content', old_value);
			}
		},

		display_textarea: function(){
			var size = helper.get_size();
			var canvas = $('.canvas');
			var textarea = $('<textarea></textarea>').width(size.width).height(size.height);

			textarea.val(canvas.data('content'));

			canvas.html(textarea);
		},

		render_preview: function(){
			var canvas = $('.canvas');
			var textarea = canvas.find('textarea');				
			var data = textarea.val();

			canvas.data('content', data);

			textarea.remove();

			canvas.html(data);

			//$.colorbox.resize();
		},

		save_slide: function(item){
			var canvas = $('.canvas');
			var textarea = canvas.find('textarea');	
			
			// unpreviewed textarea
			if(textarea.length === 1){
				var data = textarea.val();
				canvas.data('content', data);
			}

			if($(item).hasClass('edit')){
				html_slide.edit_slide(item);
			}else{
				html_slide.create_slide();
			}
		},

		create_slide: function(){
			var data = $('.canvas').data('content');

			if(data !== undefined){
				var new_slide = $('.html_template').clone().insertBefore('#slides li:last').removeClass('html_template');

				new_slide.find('.html_data').val(data);

				helper.unsaved();

				application.drag_notice();

				slides.generate_id(new_slide);
			}
		},

		edit_slide: function(item){
			var data = $('.canvas').data('content');
			$(item).parents('.slide').find('.html_data').val(data);

			helper.unsaved();
		}
	};

	/******************
	// Image slides
	******************/
	var image_slide = {

		target: 'undefined',

		init: function(){
			$(document).delegate('.upload_image_button', 'click', function(e){
				image_slide.open_media_uploader();
				image_slide.target = 'undefined';
								
				helper.return_false(e);
			});

			$(document).delegate('.change-image-button', 'click', function(e){
				image_slide.open_media_uploader();
				image_slide.target = $(this);

				helper.return_false(e);
			});

			image_slide.send_to_editor();
		},

		open_media_uploader: function(){
			tb_show('Select image', 'media-upload.php?type=image&amp;post_id=0&amp;from=unoslider&amp;TB_iframe=true');
		},

		send_to_editor: function(){
			window.send_to_editor = function(html){
				var imgurl = $('img', html).attr('src');

				if(!imgurl)
					imgurl = $(html).attr('src');

				if(image_slide.target !== 'undefined'){
					image_slide.edit_slide(imgurl);
				}else{
					image_slide.create_new_slide(imgurl);
				}	

				helper.unsaved();
				application.drag_notice();
				tb_remove();
			}
		},

		create_new_slide: function(imgurl){
			var template = $('.template').clone().insertBefore('#slides li:last').removeClass('template');
			template.find('.thumb-container').append("<img src=" + imgurl + " class='thumb' />");
			template.find('.imgurl').val(imgurl);

			slides.generate_id(template);
		},

		edit_slide: function(imgurl){
			var parent = image_slide.target.parents('.slide');
			parent.find('.imgurl').val(imgurl);
			parent.find('.thumb').attr({ src: imgurl});
		}
	};

	/*********************
	// Advanced Options
	*********************/
	var advanced = {

		slide: null,

		init: function(){
			advanced.run();
		},

		run: function(){
			$(document).undelegate('.open_advanced', 'click').delegate('.open_advanced', 'click', function(e){

				advanced.open_dialog();

				advanced.slide = $(this).parents('.slide');

				// preventDefault
				helper.return_false(e);
			});	
		},

		append_slide_content: function(){
			var size = helper.get_size();
			var canvas = $('.canvas');
			var img = advanced.slide.find('.thumb-container').find('img');
			var data;

			canvas.addClass('unoslider_theme_' + $('#undr_theme').val());
			if(img.length == 0){
				data = advanced.slide.find('.preview_item').val();
			}else{
				var image = advanced.slide.find('.preview_item').val();
				data = '<img src="'+image+'" width="'+size.width+'" height="'+size.height+'">';
			}

			canvas.append(data).width(size.width).height(size.height);
		},

		open_dialog: function(){
			var size = helper.get_size();

			size.width = size.width < 700 ? 700 : size.width;

			advanced.bind_actions();

			$.colorbox({ 
				href: unoslider.ajaxurl + "?action=advanced_index",
				top: '10%',
				opacity: 0.5,
				escKey: false,
				overlayClose: false,
				innerWidth: parseInt(size.width) + 45,
				onComplete: function(){
					advanced.handle_tabs();
					advanced.handle_sections();
				}
			});
		},

		bind_actions: function(){

			// save
			$(document).undelegate('.advanced_save', 'click').delegate('.advanced_save', 'click', function(e){
				$.colorbox.close();	
				
				helper.unsaved();			
				
				layers.save();
				tooltips.save();

				helper.return_false(e);
			});
		},

		handle_tabs: function(){
			$(document).undelegate('a[data-toggle="tab"]', 'shown').delegate('a[data-toggle="tab"]', 'shown', function(e){
				$.colorbox.resize();
			});
		},

		handle_sections: function(){
			// create slide canvas
			advanced.append_slide_content();

			tooltips.init();

			layers.init();
		}
	};

	/*********************
	// Animated Layers
	*********************/
	var layers = {

		i: 0,

		// on load init
		init: function(){

			// basic events binding
			layers.binds();

			// reset iterator
			layers.i = 0;

			// prefill with created layers
			layers.prefill();

			// drag and drop init
			layers.sortable();

			// highlight on hover
			layers.connected_hover();
		},

		// bind to the mouse events
		binds: function(){

			// Remove layer
			$(document).undelegate('.remove_layer', 'click').delegate('.remove_layer', 'click', function(e){
				var id = $(this).data('id');

				var confirm = window.confirm('Seriously?');

				if(confirm){
					layers.remove(id);

					$.colorbox.resize();
				}

				helper.return_false(e);
			});

			// add layer
			$(document).undelegate('.add-new-layer', 'click').delegate('.add-new-layer', 'click', function(e){

				// add new layer
				layers.add_new();
				
				$.colorbox.resize();

				helper.return_false(e);
			});

			// show layer details
			$(document).undelegate('#layers-list li', 'click').delegate('#layers-list li', 'click', function(e){
				layers.show_details(this);
			});

			// show layers details
			$(document).undelegate('.block', 'click').delegate('.block', 'click', function(e){
				layers.show_details(this);
			});

			// open textarea
			$(document).undelegate('.block', 'dblclick').delegate('.block', 'dblclick', function(e){
				layers.display_textarea(this);
			});

			// layer textarea editor close
			$(document).undelegate('.layer_textarea', 'blur').delegate('.layer_textarea', 'blur', function(){
				layers.hide_textarea(this);
			});

			// close layer textarea on esc key
			$(document).undelegate('.layer_textarea', 'keyup').delegate('.layer_textarea', 'keyup', function(e){
				if(e.keyCode == 27)
					layers.hide_textarea(this);
			});

			// set preset style
			$(document).undelegate('#layer_style', 'change').delegate('#layer_style', 'change', function(){
				layers.set_style(this);
			});

			// set animation
			$(document).undelegate('#layer_animation', 'change').delegate('#layer_animation', 'change', function(){
				layers.set_animation(this);
			});

			// hand change
			$(document).undelegate('#layer_left', 'keyup').delegate('#layer_left', 'keyup', function(){
				layers.change_position('', {left: $(this).val()}, $('#layer_id').val());
			});

			// hand change
			$(document).undelegate('#layer_top', 'keyup').delegate('#layer_top', 'keyup', function(){
				layers.change_position('', {top: $(this).val()}, $('#layer_id').val());
			});

			// hand change
			$(document).undelegate('#layer_width', 'keyup').delegate('#layer_width', 'keyup', function(){
				layers.change_size('', {width: $(this).val()}, $('#layer_id').val());
			});

			// hand change
			$(document).undelegate('#layer_height', 'keyup').delegate('#layer_height', 'keyup', function(){
				layers.change_size('', {height: $(this).val()}, $('#layer_id').val());
			});
		},

		// prefill with existed layers
		prefill: function(){
			var _layers = $.parseJSON(advanced.slide.find('.layers').val());
			var block, position;

			if(_layers == null){
				$.colorbox.resize();
				return;
			}				

			$.each(_layers, function(i){
				block = layers.add_new();

				position = {top: this.top, left: this.left, width: this.width, height: this.height};

				block.find('.layer_content').html(this.content);
				block.removeClass('unoslider_style_new').addClass(this.style);

				var text = $('.layer_content', block).text();

				if(text !== '')
					$('#layers-list').find('li:hasId('+block.data('id')+') span').text(text.substr(0, 40));

				if(position){
					block.css({
						top: position.top,
						left: position.left,
						width: position.width,
						height: position.height,
						zIndex: parseInt(i)
					});
				}

				var data = {
					top: this.top,
					left: this.left,
					width: this.width,
					height: this.height,
					style: this.style,
					animation: this.animation,
					content: this.content
				};

				block.data('data', data);
			});

			$.colorbox.resize();
		},

		// add a new layer and item in the control panel
		add_new: function(){
			var block = layers.create_layer();
			layers.create_controls();
			
			layers.i++;

			return block;
		},

		// create a new layer
		create_layer: function(){

			var data = {
				top: 30,
				left: 30,
				width: 100,
				height: 100,
				style: 'unoslider_style_modern',
				animation: 'fade',
				content: ''
			};

			var block = $('<div class="unoslider_style_modern block"><div class="layer_content">DoubleClick to edit</div></div>')
				.appendTo('.layers_canvas')
				.draggable({ containment: 'parent', stop: layers.handle_move })
				.resizable({ containment: 'parent', stop: layers.handle_resize })
				.data('id', layers.i)
				.data('data', data);

			$('<a href="#" class="remove_layer" title="Remove layer">X</a>')
				.appendTo(block)
				.data('id', layers.i)

			return block;
		},

		// create a con
		create_controls: function(){
			var ul = $('#advanced').find('#layers-list');
			var li = $('<li><span>Layer '+parseInt(layers.i + 1)+'</span></li>').data('id', layers.i).appendTo(ul);
			$('<a href="#" title="Remove layer" class="remove_layer">X</a>').data('id', layers.i).appendTo(li);

			if(ul.height() > 75)
				$('#advanced_layer_editor').height(parseInt(ul.height() - 26));
		},

		// display details in editor
		show_details: function(el){
			var $el = $(el);
			var id = $el.data('id');
			var data = $('#advanced').find('.block:hasId('+id+')').data('data');

			$('#layers-list li').each(function(e){
				$(this).removeClass('active');
			});

			if($el.hasClass('block')){
				$('#advanced').find('#layers-list li:hasId('+id+')').addClass('active');
			}else{
				$el.addClass('active');
			}

			var advanced = $('#advanced_layer_editor');

			advanced.show();
			$.colorbox.resize();

			$('#layer_top').val(data.top);
			$('#layer_left').val(data.left);
			$('#layer_width').val(data.width);
			$('#layer_height').val(data.height);
			$('#layer_style').val(data.style);
			$('#layer_animation').val(data.animation);
			$('#layer_id').val(id);
		},

		// display editable textarea for layer block
		display_textarea: function(el){
			var canvas = $(el);

			var width = 200;
			var height = 150;

			if(canvas.width() > 200) width = canvas.width();
			if(canvas.height() > 150) height = canvas.height();

			var textarea = $('<textarea class="layer_textarea"></textarea>')
				.data('el', el)
				.width(width)
				.height(height)
				.css({
					top: canvas.css('top'), 
					left: canvas.css('left'),
					zIndex: 5000
				});

			canvas.hide();

			textarea.val(canvas.data('data').content);

			canvas.after(textarea);

			textarea.focus();
		},

		// close textarea and save content
		hide_textarea: function(el){
			var $el = $(el);
			var actual_layer = $el.data('el');
			var $actual_layer = $(actual_layer);
			var html_content = $el.val();
			var id = $actual_layer.data('id');

			$actual_layer.data('data').content = html_content;

			$el.remove();

			if(html_content.length === 0){
				html_content = 'DoubleClick to edit';
			}

			var html = $('.layer_content', actual_layer).html(html_content);

			if(html.text() !== '')
				$('#layers-list').find('li:hasId('+id+') span').text(html.text().substr(0, 40));

			$actual_layer.show();
		},

		// layer move callback
		handle_move: function(event, ui){
			var id = $(this).data('id');

			layers.change_position(event, ui.position, id);

			layers.show_details(this);
		},

		// layer resize callback
		handle_resize: function(event, ui){
			var id = $(this).data('id');
			
			layers.change_size(event, ui.size, id);

			layers.show_details(this);
		},

		// change values in editor by hand
		change_position: function(event, position, id){

			var block = $('#advanced').find('.block:hasId('+id+')');

			// hand change
			if(event == ''){
				if(typeof position.left !== 'undefined')
					block.css({	left: parseInt(position.left) + 'px'});

				if(typeof position.top !== 'undefined')
					block.css({	top: parseInt(position.top) + 'px'});
			}	

			if(typeof position.top !== 'undefined')	block.data('data').top = parseInt(position.top);
			if(typeof position.left !== 'undefined')	block.data('data').left = parseInt(position.left);
		},

		// change values in editor by hand
		change_size: function(event, size, id){
			
			var block = $('#advanced').find('.block:hasId('+id+')');

			// hand change
			if(event == ''){
				if(typeof size.width !== 'undefined')
					block.width(size.width);

				if(typeof size.height !== 'undefined')
					block.height(size.height);
			}	

			if(typeof size.width !== 'undefined')	block.data('data').width = parseInt(size.width);
			if(typeof size.height !== 'undefined')	block.data('data').height = parseInt(size.height);
		},

		// change css class (style)
		set_style: function(el){
			var id = $('#layer_id').val();
			var block = $('#advanced').find('.block:hasId('+id+')');
			var new_style = $(el).val();
			var old_style = block.data('data').style;

			block.removeClass(old_style).addClass(new_style).data('data').style = new_style;
		},

		// change animation type
		set_animation: function(el){
			var id = $('#layer_id').val();
			var block = $('#advanced').find('.block:hasId('+id+')');
			var animation = $(el).val();

			block.data('data').animation = animation;
		},

		// remove lyer
		remove: function(id){
			$('#advanced').find('.block:hasId('+id+')').remove();
			$('#advanced').find('#layers-list li:hasId('+id+')').remove();

			var editor = $('#advanced_layer_editor');

			if(editor.find('#layer_id').val() == id)
				editor.hide();
		},

		// sortable controls
		sortable: function(){
			$('#layers-list').sortable({
				axis: 'y',
				cursor: 'move',
				distance: 5,
				update: function(event, ui){
					layers.reorder($(this), ui);
				}
			});

			$('#layers-list').disableSelection();
		},

		// reorder layers position (change z-index)
		reorder: function(self, ui){			
			self.find('li').each(function(i){
				var $this = $(this);
				var id = $this.data('id');

				$('#advanced').find('.block:hasId('+id+')').css({'zIndex': parseInt(i)});
			});
		},

		// highlight the layer and control item at once
		connected_hover: function(){

			var highlight = function(self, item, e){
				var id = self.data('id');

				if(e.type === 'mouseenter'){
					$('#advanced').find(item+':hasId('+id+')').addClass('a_highlight');
					self.addClass('a_highlight');
				}else{
					$('#advanced').find(item+':hasId('+id+')').removeClass('a_highlight');
					self.removeClass('a_highlight');
				}	
			};

			// list item hover
			$('#advanced').undelegate('#layers-list li', 'hover').delegate('#layers-list li', 'hover', function(e){
				highlight($(this), '.block', e);			
			});

			// block hover
			$('#advanced').undelegate('.block', 'hover').delegate('.block', 'hover', function(e){
				highlight($(this), '#layers-list li', e);			
			});
		},

		// create json object and "save"
		save: function(){
			var data = [];

			$('#advanced').find('#layers-list li').each(function(){
				var id = $(this).data('id');
				data.push($('#advanced').find('.block:hasId('+id+')').data('data'));
			});
			
			$('.layers', advanced.slide).val(JSON.stringify(data));
		}
	};

	/********************
	// Tooltips
	********************/
	var tooltips = {
		
		init: function(){

			tooltips.prefill();

			tooltips.handle_rewrite();
		},

		prefill: function(){
			var caption = advanced.slide.find('.caption').val();

			$('.unoslider_caption').html(caption);
			$('#tooltip_text').val(caption);
		},

		handle_rewrite: function(){
			var caption = $('.unoslider_caption'); 


			$(document).undelegate('#tooltip_text', 'keyup').delegate('#tooltip_text', 'keyup', function(e){
				caption.html($(this).val());
			});
		},

		save: function(){
			var target = advanced.slide.find('.caption');
			var source = $('#tooltip_text').val();

			target.val(source);
		}
	};

	// Run application		
	application.run();	
			
}); })(jQuery);