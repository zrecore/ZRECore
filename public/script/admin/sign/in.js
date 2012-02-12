jQuery(document).ready(function ($) {
	$('#dlgSignIn').dialog({
		modal: true,
		height: 400,
		position: 'center'
	});
	$('#dlgSignIn .sign-in-form').validate();
	
	$('#dlgSignIn #submit').button();
	$('#dlgSignIn #username').focus();
	
	$('#dlgSignIn #reply').click(function (ev) {
		$(this).remove();
	}).delay(5000).slideUp('fast');
});