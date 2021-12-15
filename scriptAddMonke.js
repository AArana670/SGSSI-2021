function addMonke(){
	nom=document.getElementById("txtNom").value; //Se toman los valores de los inputs
	raza=document.getElementById("txtRaza").value;
	var select = document.getElementById('drpSexo');
	var value = select.options[select.selectedIndex].value;
	console.log(value);
	var select2 = document.getElementById('drpPeligro');
	var value2 = select2.options[select2.selectedIndex].value;
	console.log(value2);
	
	if (nom=="") //Si el nombre está vacío
		crearAviso("Por favor, introduzca un nombre");
	else{
		if (raza=="") //Si la raza está vacía
			crearAviso("Por favor, introduzca la raza");
		else{
			
			var Nom=document.getElementById("txtNom").value; 
			var Raza=document.getElementById("txtRaza").value;
			var sexo=value;
			var pelig=value2;
			window.location.href = window.location.href + "?w1=" + Nom + "&w2=" + Raza + "&w3=" + sexo + "&w4=" + pelig; //Se añaden las variables a la URL para pasarlas al código PHP
		}
	}
}

function crearAviso(msg) {
	divAviso = document.getElementById("avisos");
	aviso = document.getElementById("aviso"); //Se elimina el aviso anterior del div "avisos"
	if (aviso != null)
		divAviso.removeChild(aviso);
	aviso = document.createElement("H5"); //Se crea un nuevo elemento H5 con el texto indicado
	aviso.textContent = msg;
	aviso.className = "aviso";
	aviso.id = "aviso";
	divAviso.appendChild(aviso); //Se añade el nuevo aviso al div "avisos"
}
