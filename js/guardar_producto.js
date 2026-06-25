var guardar = () => {

    var codigo = document.getElementById("codigo").value.trim();
    var nombre = document.getElementById("nombre").value.trim();
    var bodega = document.getElementById("bodega").value;
    var sucursal = document.getElementById("sucursal").value;
    var moneda = document.getElementById("moneda").value;
    var precio = document.getElementById("precio").value.trim();
    var material = document.querySelectorAll('input[name="material[]"]:checked');
    var descripcion = document.getElementById("descripcion").value.trim();


    //Validación código
    if (codigo === "") {
        alert("El código del producto no puede estar en blanco.");
        document.getElementById("codigo").focus();

        return false;
    }

    if (codigo.length < 5 || codigo.length > 15) {
        alert("El código del producto debe tener entre 5 y 15 caracteres.");
        document.getElementById("codigo").focus();

        return false;
    }

    var regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]+$/;

    if (!regex.test(codigo)) {
        alert("El código del producto debe contener letras y números.");

        return false;
    }


    //Validación nombre producto
    if (nombre === "") {
        alert("El nombre del producto no puede estar en blanco.");
        document.getElementById("nombre").focus();

        return false;
    }


    if (nombre.length < 2 || nombre.length > 50) {
        alert("El nombre del producto debe tener entre 2 y 50 caracteres.");
        document.getElementById("nombre").focus();

        return false;
    }


    //Validación bodega

    if (bodega === "-1") {
        alert("Debe seleccionar una bodega.");
        document.getElementById("bodega").focus();

        return false;
    }

    //Validación sucursal

    if (sucursal === "-1") {
        alert("Debe seleccionar una sucursal para la bodega seleccionada.");
        document.getElementById("sucursal").focus();

        return false;
    }


    //Validación moneda

    if (moneda === "-1") {
        alert("Debe seleccionar una moneda para el producto.");
        document.getElementById("moneda").focus();

        return false;
    }


    //Validación precio

    if (precio === "") {
        alert("El precio del producto no puede estar en blanco.");
        document.getElementById("precio").focus();

        return false;
    }


    const regex_precio = /^\d+(\.\d{1,2})?$/;

    if (!regex_precio.test(precio)) {
        alert("El precio del producto debe ser un número positivo con hasta dos decimales.");
        document.getElementById("precio").focus();
        return false;
    }


    //Validación materiales

    if (material.length < 2) {
        alert("Debe seleccionar al menos dos materiales para el producto.");
        return false;
    }


    //Validación descripción

    if(descripcion.length < 10 || descripcion.length > 1000){
        alert("La descripción del producto debe tener entre 10 y 1000 caracteres.");
        document.getElementById("descripcion").focus();

        return false;
    }


    var formData = new FormData();
    formData.append("codigo", document.getElementById("codigo").value.trim());
    formData.append("nombre", document.getElementById("nombre").value.trim());
    formData.append("bodega", document.getElementById("bodega").value);
    formData.append("sucursal", document.getElementById("sucursal").value);
    formData.append("moneda", document.getElementById("moneda").value);
    formData.append("precio", document.getElementById("precio").value.trim());
    formData.append("descripcion", document.getElementById("descripcion").value.trim());

    // Materiales
    const materiales = document.querySelectorAll('input[name="material[]"]:checked');

    materiales.forEach(material => {
        formData.append("material[]", material.value);
    });


    fetch("guardar_producto.php", {
        method: "POST",
        body: formData
    })
        .then(response => response.text())
        .then(data => {

            if(data === "existe"){
                alert("El código de producto ingresado ya existe.");
            }else if(data === "ok"){
                alert("Producto guardado correctamente.");

                document.getElementById("codigo").value = "";
                document.getElementById("nombre").value = "";
                document.getElementById("bodega").value = "-1";
                document.getElementById("sucursal").value = "-1";
                document.getElementById("moneda").value = "-1";
                document.getElementById("precio").value = "";

                document.querySelectorAll('input[name="material[]"]').forEach(material => {
                    material.checked = false;
                });

                document.getElementById("descripcion").value = "";

            }else{
                alert(data);
            }

        })
        .catch(error => {
            console.error(error);
            alert("Error al guardar el producto.");
        });


}