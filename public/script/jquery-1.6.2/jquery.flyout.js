(function ($){
	$.widget("ui.flyout", {
		options: {
			onRender: null,
			content: null,
			lastPosition: null
		},
		_create: function () {
			this.render();
		},
		_autoPosition: function () {
			var elem = $(this.element);
			var cont = elem.parent().find('.quick-form-container');
			var doc = $(window);
			
			// We must use the element's position to determine our menu fly-out position.
			var elemAbsLeft = parseInt( elem.offset().left );
			var boxRight = elemAbsLeft + cont.width();
			
			if ( boxRight > doc.width() ) {
				cont.css('marginLeft', '-' + ( elem.outerWidth() ) + 'px !important');
			}
		},
		render: function () {
			var elem = $(this.element);
			var myself = this;
			elem.wrap('<div class="quick-form-tab" />');
			elem.after('<div class="ui-corner-all ui-helper-hidden quick-form-container">' + this.options.content + '</div>');
			
			myself._autoPosition();
			
			elem.click(function (ev) {
				
				ev.preventDefault();
				
				var cont = elem.parent().find('.quick-form-container');
				
				if (!cont.is(':visible')) {
					$('html').click(function (ev) {
						myself.close();
						$('html').unbind('click');
					});
					elem.parent().addClass('ui-corner-tl').addClass('ui-corner-tr').addClass( 'quick-form-tab-over' );
					myself.open();
				} else {
					$('html').unbind('click');
					myself.close();
				}
				ev.stopPropagation();
			});
			if (this.options.onRender) {
				this.options.onRender(this);
			}
		},
		open: function () {
			var elem = $(this.element);
			var cont = elem.parent().find('.quick-form-container');
			this._autoPosition();
			
			if (cont.length > 0) {
				cont.slideDown('fast', function () {
					var cont = elem.parent().find('.quick-form-container');
					
					if (!cont.is(':visible')) {
						elem.parent().removeClass('ui-corner-tl').removeClass('ui-corner-tr').removeClass( 'quick-form-tab-over' );
					}
				});
			}
		},
		close: function () {
			var elem = $(this.element);
			var cont = elem.parent().find('.quick-form-container');
			
			if (cont.length > 0) {
				cont.slideUp('fast');
			}
		},
		destroy: function () {
			$.Widget.prototype.destroy.call( this );
			//@todo In jQuery UI 1.9 and above, you would define _destroy instead of destroy and not call the base method
		}
	});
})(jQuery);