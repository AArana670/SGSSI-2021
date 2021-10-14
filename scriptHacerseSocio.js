
const expresiones ={
	dni: /\d{9}$/ ,
	nombre: /[a-zA-ZÀ-ÿ\s]{1,40}$/,
	telefono: /\d{9}$/ ,
	email: /[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	usuario:  /[a-zA-Z0-9\_\-]{4,16}$/, 
	contrasena: /[a-zA-Z0-9\_\-]{4,16}$/, 
}


function addSocio(){
	//console.log(document.getElementById("txtDni").value );
	if(document.getElementById("txtDni").value === "" || document.getElementById("txtNomApell").value === "" || document.getElementById("txtTel").value === "" || document.getElementById("txtEmail").value === "" || document.getElementById("txtNomApell").value === "" || document.getElementById("txtUsuario").value === "" || document.getElementById("txtContr").value === ""){
		console.log("Hay que rellenar el todos los campos");
	}
	else{
		if(checkDNI(document.getElementById("txtDni").value)){
			console.log("ES CORRECTO EL DNI");
			if(document.getElementById("txtNomApell").value.match(expresiones.nombre)){
				console.log("ES CORRECTO EL NOMBRE");
				if(document.getElementById("txtTel").value.match(expresiones.telefono)){
					console.log("ES CORRECTO EL TELEFONO");
					if(document.getElementById("txtEmail").value.match(expresiones.email)){
						console.log("ES CORRECTO EL EMAIL");
						if(document.getElementById("txtUsuario").value.match(expresiones.usuario)){
							console.log("ES CORRECTO EL USUARIO");
							if(document.getElementById("txtContr").value.match(expresiones.contrasena)){
								console.log("ES CORRECTO LA CONTRASENA");
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
		console.log(partes[0]+" | "+partes[0].length+" | "+parseInt(partes[0]));
		if(partes[0].length!=8||isNaN(parseInt(partes[0])))
			return false;
		sum=parseInt(partes[0])%23;
		console.log(sum);
		letras=["T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E"];
		console.log(letras[sum]);
		if (letras[sum]==partes[1])
			return true;
		return false;
}