
const expresiones ={
	dni: /\d{9}$/ ,
	nombre: /[a-zA-ZÀ-ÿ\s]{1,40}$/,
	telefono: /\d{9}$/ ,
	email: /[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	usuario:  /[a-zA-Z0-9\_\-]{4,16}$/, 
	contrasena: /[a-zA-Z0-9\_\-]{4,16}$/, 
}


function addSocio(){
	if(document.getElementById("txtDni").value == "" || document.getElementById("txtNomApell").value == "" || document.getElementById("txtTel").value == "" || document.getElementById("txtEmail").value == "" || document.getElementById("txtNomApell").value == "" || document.getElementById("txtUsuario").value == "" || document.getElementById("txtContr").value == ""){
		crearAviso("Hay que rellenar todos los campos");
	}
	else{
		if(!checkDNI(document.getElementById("txtDni").value))
			crearAviso("El DNI no es válido, debe seguir el formato '11111111-A'");
		else{
			if(!document.getElementById("txtNomApell").value.match(expresiones.nombre))
				crearAviso("El nombre no es válido");
			else{
				if(!document.getElementById("txtTel").value.match(expresiones.telefono))
					crearAviso("El teléfono no es válido");
				else{
					if(!document.getElementById("txtEmail").value.match(expresiones.email))
						crearAviso("El correo no es válido");
					else{
						if(!document.getElementById("txtUsuario").value.match(expresiones.usuario))
							crearAviso("El nombre de usuario no es válido");
						else{
							if(!document.getElementById("txtContr").value.match(expresiones.contrasena))
								crearAviso("La contraseña no es válida");
							else{
								crearAviso("Todos los datos introducidos son correctos");
								var txtDNI=document.getElementById("txtDni").value;
								var txtNomApell=document.getElementById("txtNomApell").value;
								var txtTel=document.getElementById("txtTel").value;
								var fechNac= "2002-02-02";
								var txtEmail=document.getElementById("txtEmail").value;
								var txtUsuario=document.getElementById("txtUsuario").value;
								var txtContr=document.getElementById("txtContr").value;
								window.location.href = window.location.href + "?w1=" + txtDni + "?w2=" + txtNomApell + "?w3=" + txtTel + "?w4=" + fechNac + "?w5=" + txtEmail + "?w6=" + txtUsuario + "?w7=" + txtContr;
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