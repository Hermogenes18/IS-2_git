
var ajax;
 

function recuperar(ret,orden)
{
	if( window.XMLHttpRequest )
		ajax = new XMLHttpRequest();
	else
		ajax = new ActiveXObject("Microsoft.XMLHTTP");
 	
	ajax.onreadystatechange = funcionCallback;
	ajax.open("GET", "ajax_pag.php?objeto="+ret"&"+"orden="+orden, true );
	ajax.send();
	
}

function recuperar_venta(ret)
{
	if( window.XMLHttpRequest )
		ajax = new XMLHttpRequest();
	else
		ajax = new ActiveXObject("Microsoft.XMLHTTP");
 	
	ajax.onreadystatechange = funcionCallback;
	ajax.open("GET", "ajax_pag.php?objeto="+ret, true );
	ajax.send();	
}

/*
function recuperar_precio()
{	
	var precio1=document.getElementById("precio_inf");
	var precio1=document.getElementById("precio_sup");
	if( window.XMLHttpRequest )
		ajax = new XMLHttpRequest();
	else
		ajax = new ActiveXObject("Microsoft.XMLHTTP");
 	
	ajax.onreadystatechange = funcionCallback;
	ajax.open("GET", "ajax_pag.php?objeto=5"+"&"+"precio_inf="+precio1+"&"+"precio_sup="+precio2, true );
	ajax.send();
	
}*/
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
 