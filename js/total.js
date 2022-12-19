let cantidad = document.getElementsByName("cantidad");
let total = document.getElementById("total");

producto.addEventListener("click", function () {
  valor();
});

function valor() {
  let producto = document.getElementById("producto");
  let textoG = producto.options[producto.selectedIndex];
  let valor = textoG.text;
  let precio = valor.slice(8);
  total.value = Number(precio) * Number(cantidad[0].value);
}
