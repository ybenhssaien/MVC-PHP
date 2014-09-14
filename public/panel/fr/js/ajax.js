if(typeof($)==='undefined')$=jQuery;
function ajax_load(){
	url=jQuery(this).attr('data-page');
	div=jQuery(this).attr('data-target');
	load(div,url);
}
function sendAjax(url,data){
	loading();
	if(typeof(data)==='undefined')data="";
	return jQuery.ajax({
		url:url,
		data:data,
		type:"post",
		success:function(){closeDialog(0);},
		error:function(res){closeDialog(0);ajaxError(res.statusText);}
	});
}
function load(targetdiv,url,data,functions,removeold){
	loading();
	div=jQuery(targetdiv);
	if(typeof(removeold)==='undefined')removeold=false;
	if((typeof data =="boolean" && data) || (typeof functions =="boolean" && functions) || removeold)
		div.html("");
	if(typeof(data)==='undefined')data="";
	if(typeof(functions)==='undefined')functions=function(){closeDialog(0);};
	if(typeof(data)==='function'){
		div.load(url,function(response, status, xhr){
			if(xhr.statusText=="OK"){data();}
			else return ajaxError(xhr);
		});
	}else{
		div.load(url,data,function(response, status, xhr){
			if(xhr.statusText=="OK")functions();
			else return ajaxError(xhr);
		});
	}
}
function ajaxError(xhr){
	if(typeof(xhr)==='undefined')status="error";
	else status=xhr.statusText;
	if(status=="error"){errorDialog("<h2>Vous avez perdue la connexion avec le serveur</h2><p style='font-size:10px'>réessayez plus tard ou vérifiez votre connexion internet !</p>");}
	if(status=="notfound"){errorDialog("<h2>404 : Page non trouvée</h2>");}
	return false;
}