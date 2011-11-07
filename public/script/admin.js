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
		window.location = $(this).attr('href');
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
	
});