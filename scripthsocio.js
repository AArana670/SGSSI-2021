const expresiones ={ //formatos correctos de los inputs
	nombre: /[a-zA-ZÀ-ÿ\s]{1,60}$/, //Cadena de letras de hasta 60 caracteres
	telefono: /\d{9}$/, //número de 9 dígitos
	email: /[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/, //Cadena de caracteres + @ + cadena de caracteres + . + cadena de caracteres
	usuario:  /[a-zA-Z0-9\_\-]{4,16}$/, //Cadena de alfanuméricos entre 4 y 16 caracteres
	contrasena: /[a-zA-Z0-9\_\-]{4,16}$/, //Cadena de alfanuméricos entre 4 y 16 caracteres
}


function addSocio(){
	if(document.getElementById("dni").value == "" || document.getElementById("nomApell").value == "" || document.getElementById("tel").value == "" || document.getElementById("email").value == "" || document.getElementById("usuario").value == "" || document.getElementById("contr").value == "" || document.getElementById("fechaNac").value.toString() == ""){ //Algún input está vacío
		crearAviso("Hay que rellenar todos los campos");
	}
	else{
		if(!document.getElementById("nomApell").value.match(expresiones.nombre)) //El nombre no cumple con el formato
			crearAviso("El nombre no es válido");
		else{
			if (!checkDNI(document.getElementById("dni").value)) //El DNI no cumple con el formato o no tiene la letra correcta
				crearAviso("El DNI no es válido, debe seguir el formato '11111111-A'");
			else{
				if (!document.getElementById("tel").value.match(expresiones.telefono)) //El teléfono no cumple con el formato
					crearAviso("El teléfono no es válido");
				else{
					if (!document.getElementById("email").value.match(expresiones.email)) //El email no cumple con el formato
						crearAviso("El correo no es válido");
					else{
						if (!document.getElementById("usuario").value.match(expresiones.usuario)) //El nombre de usuario no cumple con el formato
							crearAviso("El nombre de usuario no es válido");
						else{
							if (!document.getElementById("contr").value.match(expresiones.contrasena)) //La contraseña no cumple con el formato
								crearAviso("La contraseña no es válida");
							else{
								crearAviso("Todos los datos introducidos son correctos");
								var txtDNI=document.getElementById("dni").value; //Se toman todos los valores de los inputs en variables
								console.log()
								var txtNomApell=document.getElementById("nomApell").value;
								var txtTel=document.getElementById("tel").value;
								var txtfechNac= document.getElementById("fechaNac").value.toString();
								var txtEmail=document.getElementById("email").value;
								var txtUsuario=document.getElementById("usuario").value;
								var txtContr=document.getElementById("contr").value;
								window.location.href = window.location.href + "?w1=" + txtDNI + "&w2=" + txtNomApell + "&w3=" + txtTel + "&w4=" + txtfechNac + "&w5=" + txtEmail + "&w6=" + txtUsuario + "&w7=" + txtContr; //Se añaden las variables a la URL para pasarlas al código PHP
							}
						}
					}				
				}
			}
		}
	}
}
function checkDNI(dni){	
		if (!dni.includes("-")) //Comprueba si el DNI contiene un guión
			return false;
		partes=dni.split("-");
		if(partes[0].length!=8||isNaN(parseInt(partes[0]))) //Comprueba que el DNI tiene 8 números
			return false;
		sum=parseInt(partes[0])%23; //Calcula el resto del número del DNI
		letras=["T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E"]; //Lista de letras en función del resultado del cálculo
		if (letras[sum]==partes[1]) //Comprueba si la letra del DNI coincide con la de la lista
			return true;
		return false;
}

function crearAviso(msg){
	divAviso=document.getElementById("avisos");
	aviso=document.getElementById("aviso"); //Se elimina el aviso anterior del div "avisos"
	if (aviso!=null)
		divAviso.removeChild(aviso);
	aviso=document.createElement("H5"); //Se crea un nuevo elemento H5 con el texto indicado
	aviso.textContent=msg;
	aviso.className="aviso";
	aviso.id="aviso";
	divAviso.appendChild(aviso); //Se añade el nuevo aviso al div "avisos"
}	
	
		

	
	
