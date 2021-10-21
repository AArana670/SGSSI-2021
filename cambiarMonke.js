function buscaMonke() {
    monkId = document.getElementById("txtId").value;
    window.location.href = "cambiarMonke.php?i=" + monkId;
}

function limpiar() {
    location.reload();
    window.location.href = "cambiarMonke.php";
}