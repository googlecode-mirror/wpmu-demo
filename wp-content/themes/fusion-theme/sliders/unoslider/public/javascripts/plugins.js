!function( $ ){

	if (!$.unoslider) {
		$.unoslider = {};
	}

	var log = function(data){
		console.log(data);
	};

	$.unoslider.switch_button = function(el, cb, options) {

		// To avoid scope issues, use 'base' instead of 'this'
		// to reference this class from internal events and functions.
		var base = this;

		// Access to jQuery and DOM versions of element
		base.$el = $(el);
		base.el = el;

		// Add a reverse reference to the DOM object
		base.$el.data("unoslider.switch_button", base);

		base.init = function () {
			base.cb = cb;
			base.options = $.extend({}, $.unoslider.switch_button.defaultOptions, options);

			base.generate();			
		};

		base.generate = function(){
			var enable = base.$el.find('.enable');

			$('<label class="disable" for="'+enable.attr('for')+'">Disabled</label>').insertAfter(enable);

			base.setDefaultState();

			base.callbacks();
		};

		base.setDefaultState = function(){
			var status = base.$el.data('status');
			if(status == 'enabled'){
				base.$el.find('.enable').addClass('selected');
				if($.isFunction(base.cb.enable)){
					base.cb.enable.call(this);
				}
			}else{
				base.$el.find('.disable').addClass('selected');
				if($.isFunction(base.cb.disable)){
					base.cb.disable.call(this);
				}
			}
		};

		base.disable = function(){
			for(i in base.cb.affected_inputs){
				$('#'+base.cb.affected_inputs[i]).attr('disabled', 'disabled');
			}
		};

		base.enable = function(){
			for(i in base.cb.affected_inputs){
				$('#'+base.cb.affected_inputs[i]).removeAttr('disabled');
			}			
		};

		base.callbacks = function(){

			base.$el.delegate('.enable', 'click', function(){
				$(this).addClass('selected');
				base.$el.find('.disable').removeClass('selected');

				// check checkbox
				var t = base.$el.find('input').attr({checked: 'checked'});

				// callback
				if($.isFunction(base.cb.enable)){
					base.cb.enable.call(this);
					base.enable();
				}

				return false;
			});

			base.$el.delegate('.disable', 'click', function(){
				$(this).addClass('selected');
				base.$el.find('.enable').removeClass('selected');

				// uncheck checkbox
				base.$el.find('input').removeAttr('checked');	

				// callback
				if($.isFunction(base.cb.disable)){
					base.cb.disable.call(this);
					base.disable();
				}

				return false;
			});

		};

		// Run initializer
		base.init();
	};

	$.unoslider.switch_button.defaultOptions = {
		myDefaultValue: ""
	};

	$.fn.unoslider_switch = function(cb, options){
		return this.each(function () {
			(new $.unoslider.switch_button(this, cb, options));
		});
	};

}( window.jQuery );