var btnAnddSocio=document.getElementById("btnAddSocio");
var txtDNI=document.getElementById("txtDNI");
const txtNomApell=document.getElementById("txtNomApell");
const txtTel=document.getElementById("txtTel");
const fechNac=document.getElementById("txtFechaNac");
const txtEmail=document.getElementById("txtEmail");
const txtUsuario=document.getElementById("txtUsuario");
const txtContr=document.getElementById("txtContr");

function addSocio(){
	console.log("ole ole");
	console.log(document.getElementById("txtDNI").value);
	console.log(document.getElementById("txtFechaNac").value.ToDateSring(); //no se imprime la fech
	document.getElementById("txtDNI").value="";
	document.getElementById("txtNomApell").value="";
	document.getElementById("txtTel").value="";
	document.getElementById("txtFechaNac").value="";
	document.getElementById("txtEmail").value="";
	document.getElementById("txtUsuario").value="";
	document.getElementById("txtContr").value="";
	
}