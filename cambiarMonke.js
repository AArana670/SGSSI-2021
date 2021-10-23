function avisar() {
    divDel = document.getElementById("confirmar");

    txtAviso = document.createElement("H4");
    txtAviso.textContent = "Esta seguro de que quiere eliminar el primate " + document.getElementById("txtMONKEID").value + "?";

    btnYes = document.createElement("button");
    btnYes.id = "btnYes";
    btnYes.name = "btnYes";
    btnYes.innerHTML = "Aceptar";
    btnYes.addEventListener("click", function () { confirmar(); });

    btnNo = document.createElement("button");
    btnNo.id = "btnNo";
    btnNo.innerHTML = "Cancelar";
    btnNo.addEventListener("click", function () { volver(); });

    divDel.removeChild(document.getElementById("btnDel"));
    divDel.appendChild(txtAviso);
    divDel.appendChild(btnYes);
    divDel.appendChild(btnNo);
}

function confirmar() {

    crearAviso("El primate " + document.getElementById("txtMONKEID").value + " se ha eliminado con exito")
    volver();
}

function volver() {
    divDel = document.getElementById("confirmar");

    btnDel = document.createElement("button");
    btnDel.id = "btnBorrar";
    btnDel.innerHTML = "Borrar";
    btnDel.addEventListener("click", function () { avisar(); });

    divDel.removeChild(document.getElementById("txtAviso"));
    divDel.removeChild(document.getElementById("btnYes"));
    divDel.removeChild(document.getElementById("btnNo"));
    divDel.appendChild(btnDel);
}

function crearAviso(msg) {
    divAviso = document.getElementById("avisos");
    aviso = document.getElementById("aviso");
    if (aviso != null)
        divAviso.removeChild(aviso);
    aviso = document.createElement("H5");
    aviso.textContent = msg;
    aviso.className = "aviso";
    aviso.id = "aviso";
    divAviso.appendChild(aviso);
}