$(function()
{
	
	$('#zip').on('blur', onLooseFocus);
	$('#aCacher').hide();
	
	function onLooseFocus()
	{
		let cp = $('#zip').val();
		console.log(cp);
		
		if (cp.length > 3 && !cp.isNaN)
			$.getJSON('city.php', {'cp':cp}, listCity);
	}
	
	function listCity(results)
	{
		$('#city').html(''); 
		
		for(var i=0; i<results.length; i++)
		{
			$('#city').append('<option>'+results[i]["ville_code_postal"]+' - '+results[i]['ville_nom']+'</option>');
		}
	
		$('#aCacher').fadeIn();
		
	}
	
});