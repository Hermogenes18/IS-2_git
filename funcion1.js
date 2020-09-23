
var ajax;
 

function recuperar(ret)
{
	if( window.XMLHttpRequest )
		ajax = new XMLHttpRequest();
	else
		ajax = new ActiveXObject("Microsoft.XMLHTTP");
 	
	ajax.onreadystatechange = funcionCallback;
	ajax.open("GET", "ajax_pag.php?objeto="+ret, true );
	ajax.send();
	
}
function funcionCallback()
{
	var menu_ajax = document.getElementById("salida");
	if( ajax.readyState == 4 )
	{	
		if( ajax.status == 200 )
		{
			menu_ajax.innerHTML = ajax.responseText;	
		}
	}
}
 