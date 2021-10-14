function addMonke(){
	nom=document.getElementById("txtNom").value;
	raza=document.getElementById("txtRaza").value;
	macho=document.getElementById("rbtnM").checked;
	peligro=document.getElementById("rbtnDan").checked;
	
	if (nom=="")
		crearAviso("Por favor, introduzca un nombre");
	else{
		if (raza=="")
			crearAviso("Por favor, introduzca la raza");
		else{
			crearAviso(nom+" se ha añadido a la base de datos");
			console.log("nombre: "+nom+", raza: "+raza+", macho: "+macho+", peligroso: "+peligro);
		}
	}
}

function crearAviso(msg){
	divAviso=document.getElementById("avisos");
	aviso=document.getElementById("aviso");
	if (aviso!=null)
		divAviso.removeChild(aviso);
	aviso=document.createElement("H5");
	aviso.textContent=msg;
	aviso.className="aviso";
	aviso.id="aviso";
	divAviso.appendChild(aviso);
}