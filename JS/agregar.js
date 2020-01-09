function mostrarModal(img, title, price, id) {
    var path = "IMG/" + img;
    var txtPrice = "$" + price + " €";
    var href = "modal_reservar.php?action=addToCart&id=" + id;
    document.getElementById("modalImg").src = path;
    document.getElementById("modalTitle").innerHTML = title;
    document.getElementById("modalPrice").innerHTML = txtPrice;
    document.getElementById("modalAgregar").href = href;
}

function mostrarModalDireccion(direccion) {
    var path = "IMG/" + img;
    var txtPrice = "$" + price + " €";
    var href = "modal_reservar.php?action=addToCart&id=" + id;
    document.getElementById("modalImg").src = path;
    document.getElementById("modalTitle").innerHTML = title;
    document.getElementById("modalPrice").innerHTML = txtPrice;
    document.getElementById("modalAgregar").href = href;
}
