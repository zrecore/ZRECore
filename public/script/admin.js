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
	$('#admin_menu .submenu-link').prepend('<span class="submenu-icon ui-icon ui-icon-circle-triangle-e"></span>');
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

	var selectedMenuLink = $('#admin_menu').find('a[href="' + window.location.pathname + '"]').append('<span class="submenu-icon ui-icon ui-icon-triangle-1-e"></span>').addClass('ui-state-highlight').attr('style', 'font-weight: normal; margin: 0 !important;');
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
	
});