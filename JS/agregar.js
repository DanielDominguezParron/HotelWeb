function mostrarModal(title, price, id) {
    var txtPrice = "$" + price + " €";
    var href = "modal_reservar.php?action=addToCart&id=" + id;
    document.getElementById("modalTitle").innerHTML = title;
    document.getElementById("modalPrice").innerHTML = txtPrice;
    document.getElementById("modalAgregar").href = href;
}
