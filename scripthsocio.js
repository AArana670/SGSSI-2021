const expresiones ={
	nombre: /[a-zA-ZÀ-ÿ\s]{1,60}$/,
	telefono: /\d{9}$/,
	email: /[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	usuario:  /[a-zA-Z0-9\_\-]{4,16}$/, 
	contrasena: /[a-zA-Z0-9\_\-]{4,16}$/, 
}


function addSocio(){
	if(document.getElementById("dni").value == "" || document.getElementById("nomApell").value == "" || document.getElementById("tel").value == "" || document.getElementById("email").value == "" || document.getElementById("usuario").value == "" || document.getElementById("contr").value == "" || document.getElementById("fechaNac").value.toString() == ""){
		crearAviso("Hay que rellenar todos los campos");
	}
	else{
		if(!document.getElementById("nomApell").value.match(expresiones.nombre))
			crearAviso("El nombre no es válido");
		else{
			if(!checkDNI(document.getElementById("dni").value))	
				crearAviso("El DNI no es válido, debe seguir el formato '11111111-A'");
			else{
				if(!document.getElementById("tel").value.match(expresiones.telefono))
					crearAviso("El teléfono no es válido");
				else{
					if(!document.getElementById("email").value.match(expresiones.email))
						crearAviso("El correo no es válido");
					else{
						if(!document.getElementById("usuario").value.match(expresiones.usuario))
							crearAviso("El nombre de usuario no es válido");
						else{
							if(!document.getElementById("contr").value.match(expresiones.contrasena))
								crearAviso("La contraseña no es válida");
							else{
								crearAviso("Todos los datos introducidos son correctos");
								var txtDNI=document.getElementById("dni").value;
								console.log()
								var txtNomApell=document.getElementById("nomApell").value;
								var txtTel=document.getElementById("tel").value;
								var txtfechNac= document.getElementById("fechaNac").value.toString();
								var txtEmail=document.getElementById("email").value;
								var txtUsuario=document.getElementById("usuario").value;
								var txtContr=document.getElementById("contr").value;
								window.location.href = window.location.href + "?w1=" + txtDNI + "&w2=" + txtNomApell + "&w3=" + txtTel + "&w4=" + txtfechNac + "&w5=" + txtEmail + "&w6=" + txtUsuario + "&w7=" + txtContr;
							}
						}
					}				
				}
			}
		}
	}
}
function checkDNI(dni){	
		if (!dni.includes("-"))
			return false;
		partes=dni.split("-");
		if(partes[0].length!=8||isNaN(parseInt(partes[0])))
			return false;
		sum=parseInt(partes[0])%23;
		letras=["T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E"];
		if (letras[sum]==partes[1])
			return true;
		return false;
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
	
		

	
	
