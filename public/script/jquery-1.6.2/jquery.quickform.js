(function ($){
	$.widget("ui.quickform", {
		options: {
			onRender: null,
			content: null
			
		},
		_create: function () {
			this.render();
		},
		render: function () {
			var elem = $(this.element);
			
			elem.wrap('<div class="quick-form-tab" />');
			elem.after('<div class="ui-corner-all ui-helper-hidden quick-form-container">' + this.options.content + '</div>');
			
			
			
			elem.button();
			elem.click(function (ev) {
				ev.preventDefault();
				
				var cont = elem.parent().find('.quick-form-container');
				if (!cont.is(':visible')) {
					elem.parent().addClass('ui-corner-tl').addClass('ui-corner-tr').addClass( 'quick-form-tab-over' );
					
				}
				
				cont.slideToggle('fast', function () {
					var cont = elem.parent().find('.quick-form-container');
					var doc = $(window);
					var elemAbsLeft = ( cont.offset().left );

					if ( doc.width() > elemAbsLeft ) {

						var marginOffset = doc.width() - elemAbsLeft;
						cont.css('marginLeft', '-' + elem.outerWidth() + 'px !important');
					}
					
					if (!cont.is(':visible')) {
						elem.parent().removeClass('ui-corner-tl').removeClass('ui-corner-tr').removeClass( 'quick-form-tab-over' );
						cont.css('marginLeft', '0px !important');
					}
				});
				
			});
			if (this.options.onRender) {
				this.options.onRender(this);
			}
		},
		open: function () {
			var elem = $(this.element);
			var cont = elem.parent().find('.quick-form-container');
			
			if (cont.length > 0) {
				cont.slideDown('fast', function () {
					var cont = elem.parent().find('.quick-form-container');
					var doc = $(window);
					var elemAbsLeft = ( cont.offset().left );

					if ( doc.width() > elemAbsLeft ) {

						var marginOffset = doc.width() - elemAbsLeft;
						cont.css('marginLeft', '-' + elem.outerWidth() + 'px !important');
					}
					
					if (!cont.is(':visible')) {
						elem.parent().removeClass('ui-corner-tl').removeClass('ui-corner-tr').removeClass( 'quick-form-tab-over' );
						cont.css('marginLeft', '0px !important');
					}
				});
			}
		},
		close: function () {
			var elem = $(this.element);
			var cont = elem.parent().find('.quick-form-container');
			
			if (cont.length > 0) {
				cont.slideUp('fast', function () {
					cont.css('marginLeft', '0px !important');
				});
			}
		},
		destroy: function () {
			$.Widget.prototype.destroy.call( this );
			//@todo In jQuery UI 1.9 and above, you would define _destroy instead of destroy and not call the base method
		}
	});
})(jQuery);