function answer(id,sign){
var xhr;
if(window.XMLHttpRequest){
xhr = new XMLHttpRequest();
}
else{
xhr = new ActiveXObject("Microsoft.XMLHTTP");
}

xhr.onreadystatechange = function(){
	if(xhr.readyState==4 && xhr.status==200){
		document.getElementById(id).innerHTML=xhr.responseText;
	}
}

xhr.open("GET","change_vote.php?id="+id+"&sign="+sign,true);
xhr.send();
}