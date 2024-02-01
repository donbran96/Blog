function ocultarBloque(bloque){
    bloque.style.display='none';
}
function mostrarBloque(bloque){
    bloque.style.display='block';
}

var entrada_edicion=document.querySelector('#entrada_edicion');
var entrada=document.querySelector('#entrada');
var editar_entrada=document.querySelector('#editar_entrada');
var guardar_entrada=document.querySelector('#guardar_entrada');
var cancelar=document.querySelector('#cancelar');

editar_entrada.onclick= function(){
    ocultarBloque(entrada);
    ocultarBloque(editar_entrada);
    mostrarBloque(guardar_entrada);
    mostrarBloque(cancelar);
    mostrarBloque(entrada_edicion);
};

guardar_entrada.onclick= function(){
    mostrarBloque(entrada);
    mostrarBloque(editar_entrada);
    ocultarBloque(guardar_entrada);
    ocultarBloque(cancelar);
    ocultarBloque(entrada_edicion);
};

cancelar.onclick= function(){
    mostrarBloque(entrada);
    mostrarBloque(editar_entrada);
    ocultarBloque(guardar_entrada);
    ocultarBloque(cancelar);
    ocultarBloque(entrada_edicion);
};

