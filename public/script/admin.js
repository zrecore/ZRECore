YUI().use('node-menunav', 'transition', function(Y) {

	Y.on('contentready', function () {
		this.plug(Y.Plugin.NodeMenuNav);
		
		var message = Y.one('#message');
		
		if (message) {
			$('#message').dialog({
				autoOpen: true,
				modal: true,
				title: "Message",
				height: 200
			});
		}
	}, ".content-menu");
});