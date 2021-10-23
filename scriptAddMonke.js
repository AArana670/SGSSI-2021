function addMonke(){
	nom=document.getElementById("txtNom").value;
	raza=document.getElementById("txtRaza").value;
	var select = document.getElementById('drpSexo');
	var value = select.options[select.selectedIndex].value;
	console.log(value);
	var select2 = document.getElementById('drpPeligro');
	var value2 = select2.options[select2.selectedIndex].value;
	console.log(value2);
	
	if (nom=="")
		crearAviso("Por favor, introduzca un nombre");
	else{
		if (raza=="")
			crearAviso("Por favor, introduzca la raza");
		else{
			crearAviso(nom+" se ha añadido a la base de datos");
			var Nom=document.getElementById("txtNom").value;
			var Raza=document.getElementById("txtRaza").value;
			var sexo=value;
			var pelig=value2;
			window.location.href = window.location.href + "&w1=" + Nom + "&w2=" + Raza + "&w3=" + sexo + "&w4=" + pelig;
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