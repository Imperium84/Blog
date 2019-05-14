$(function()
{
	$('#email').on('blur', onLooseFocusMail);
	$('#nickname').on('blur', onLooseFocusNick);
	
	function onLooseFocusMail()
	{
		let email = $('#email').val();
		
		$.getJSON("signup_form.php", {'email':email}, gererDoublons);
	}
	
	function onLooseFocusNick()
	{
		let nickname = $('#nickname').val();
		
		$.getJSON("signup_form.php", {'nick':nickname}, gererDoublons);
	}
	
	function gererDoublons(resultats)
	{
		console.log("test: "+resultats);
	}
});