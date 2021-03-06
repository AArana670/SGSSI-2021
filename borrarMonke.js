function avisar() {
    divDel = document.getElementById("confirmar");

    txtAviso = document.createElement("H4"); //Se crea el aviso de confirmaci?n
    txtAviso.textContent = "Esta seguro de que quiere eliminar el primate " + document.getElementById("txtMONKEID").value + "?";

    btnYes = document.createElement("button"); //Se crea el bot?n de confirmar
    btnYes.id = "btnYes";
    btnYes.name ="btnYes";
    btnYes.innerHTML = "Aceptar";
    btnYes.addEventListener("click", function () { confirmar(); }); //Al hacer clic llama a la funci?n JavaScript confirmar()

    btnNo = document.createElement("button"); //Se crea el bot?n de cancelar
    btnNo.id = "btnNo";
    btnNo.innerHTML = "Cancelar";
    btnNo.addEventListener("click", function () { volver(); }); //Al hacer clic llama a la funci?n JavaScript cancelar()

    divDel.removeChild(document.getElementById("btnDel")); //Se elimina el bot?n anterior y se a?aden los nuevos y el aviso al div
    divDel.appendChild(txtAviso);
    divDel.appendChild(btnYes);
    divDel.appendChild(btnNo);
}

function confirmar() {

    volver();
}

function volver() {
    divDel = document.getElementById("confirmar");

    btnDel = document.createElement("button"); //Se crea el bot?n de borrar
    btnDel.id = "btnBorrar";
    btnDel.innerHTML = "Borrar";
    btnDel.addEventListener("click", function () { avisar(); }); //Al hacer clic llama a la funci?n JavaScript avisar()

    divDel.removeChild(document.getElementById("txtAviso")); //Se eliminan el aviso y los botones anteriores y se a?ade el bot?n nuevo al div
    divDel.removeChild(document.getElementById("btnYes"));
    divDel.removeChild(document.getElementById("btnNo"));
    divDel.appendChild(btnDel);
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
    divAviso.appendChild(aviso); //Se a?ade el nuevo aviso al div "avisos"
}