var lista_sucursales = () => {

    const idbodega = document.getElementById("bodega").value;

    fetch("sucursales.php?idbodega=" + idbodega)
        .then(response => response.text())
        .then(data => {
            document.getElementById("html_sucursales").innerHTML = data;
        })
        .catch(error => {
            alert("La carga de las sucursales falló.");
            console.error(error);
        });

}