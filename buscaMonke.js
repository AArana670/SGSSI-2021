function buscaMonke() {
    monkId = document.getElementById("txtId").value;
    window.location.href = "./cambiarMonke.php/?i=" + monkId;
}