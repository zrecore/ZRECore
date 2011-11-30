jQuery(document).ready(function ($) {
	var message = $('#message');
	
	if (message.length > 0)
	{
		$('#message').dialog({
			autoOpen: true,
			modal: true,
			title: "Message",
			height: 200
		});	
	}
	
	$('.menu').menu();
	$('#admin_menu').addClass('ui-corner-all');
	$('#admin_menu .submenu-link').prepend('<div class="ui-helper-reset submenu-icon ui-icon ui-icon-circle-triangle-e"></div>');
	$('#admin_menu .submenu-container').addClass('ui-priority-primary').find('.submenu').addClass('ui-priority-secondary');
	$('#admin_menu .submenu-link ~ .submenu').hide();
	$('#admin_menu .menu-link').click(function (ev) {
		window.location.href = $(this).attr('href');
	});
	$('#admin_menu .submenu-link').click(function (ev) {
		
		ev.preventDefault();
		
		var submenuLink = $(this);
		var submenuLinkIcon = submenuLink.find('.submenu-icon');
		var submenu = submenuLink.next();
		
		submenu.slideToggle('fast', function () {
			if (submenu.is(':visible'))
			{
				submenuLinkIcon.removeClass('ui-icon-circle-triangle-e');
				submenuLinkIcon.addClass('ui-icon-circle-triangle-s');
			} else {
				submenuLinkIcon.removeClass('ui-icon-circle-triangle-s');
				submenuLinkIcon.addClass('ui-icon-circle-triangle-e');
			}
		});
	});

	var selectedMenuLink = $('#admin_menu').find('a[href="' + window.location.pathname + '"]').append('<div class="ui-helper-reset submenu-icon ui-icon ui-icon-triangle-1-e"></div>').addClass('ui-state-focus').attr('style', 'font-weight: normal; margin: 0 !important;');
	var selectedMenu = selectedMenuLink.parent();
	
	if (selectedMenuLink.length > 0)
	{
		while (selectedMenu && selectedMenu.length > 0 && selectedMenu.attr('id') != 'admin_menu')
		{
			if (selectedMenu.hasClass('submenu'))
			{
				selectedMenuLink = selectedMenu.prev();
				
				var selectedMenuLinkIcon = selectedMenuLink.find('.submenu-icon');

				if (!selectedMenu.is(':visible'))
				{
					
					selectedMenu.show(0, function () {
						selectedMenuLinkIcon.removeClass('ui-icon-circle-triangle-e');
						selectedMenuLinkIcon.addClass('ui-icon-circle-triangle-s');
					});
				}
			}
			selectedMenu = selectedMenu.parent();
		}
	}
	$('#view_site').button({
		icons: {
			primary: "ui-icon-home"
		}
	});
	$('#sign_out').button({
		icons: {
			primary: "ui-icon-arrowreturnthick-1-w"
		}
	});
	$('#dashboard_options').button({
		icons: {
			primary: "ui-icon-gear"
		},
		text: false
	}).flyout({
		content: '<ul class="quick-form-unordered-list">' + 
				'<li><a href="#two-column" class="option-dashboard option-dashboard-columns">Two-Columns</a></li>' + 
				'<li><a href="#three-column" class="option-dashboard option-dashboard-columns">Three-Columns</a></li>' + 
				'<li><a href="#four-column" class="option-dashboard option-dashboard-columns">Four-Columns</a></li>' + 
			'</ul>'
	});
	$('#dashboard_options').parent().find('.quick-form-unordered-list').menu().find('a').click(function (ev) {
		var link = $(this);
		$('#dashboard_options').flyout('close');
		
		if (link.hasClass('option-dashboard'))
		{
			ev.preventDefault();
			
			if (link.hasClass('option-dashboard-columns'))
			{
				var dashboardWidgets = $('.dashboard-widgets');
				dashboardWidgets.find('.widget-box')
					.removeClass('widget-box-quarter')
					.removeClass('widget-box-third')
					.removeClass('widget-box-half')
					.removeClass('ui-helper-hidden');

				switch(link.attr('href'))
				{
					case '#two-column':
						dashboardWidgets.find('.widget-box').addClass('widget-box-half');
						dashboardWidgets.find('.widget-box').each(function (i, widget) {
							if (i > 1) $(widget).addClass('ui-helper-hidden');
						});
						break;
					case '#three-column':
						dashboardWidgets.find('.widget-box').addClass('widget-box-third');
						dashboardWidgets.find('.widget-box').each(function (i, widget) {
							if (i > 2) $(widget).addClass('ui-helper-hidden');
						});
						break;
					case '#four-column':
						dashboardWidgets.find('.widget-box').addClass('widget-box-quarter');
						break;
				}
				// @todo save layout mode, reload on page load.
			}
		} else {
			window.location.href = $(this).attr('href');
		}
	});
});