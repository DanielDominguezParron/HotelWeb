function agranda(imagen){
    var fuente = imagen.src
    var modal = document.getElementById("modal");
    var w = window.innerWidth;
    
    
    var imgmod= document.getElementById("imagen-modal")
    imgmod.src = fuente;
    
    modal.style.display = "inline";
    
    
}
function cierra(){
    var modal = document.getElementById("modal");
    modal.style.display = "none";
}