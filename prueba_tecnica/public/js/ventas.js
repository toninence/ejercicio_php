const comprarEntrada = () => {
  // Obtengo los datos para enviar a la peticion
  const comprador = document.getElementById("comprador").value;
  const cod_obra = document.getElementById("cod_obra").value;
  //Realizo la peticion al controlador de ventas para comprar entrada
  if(comprador === '') {
      alert('Ingrese su nombre por favor')
      return;
    };
  axios
    .get(
      `http://localhost/prueba_tecnica/ventas.php?f=realizar_venta&comprador=${comprador}&cod_obra=${cod_obra}`
    )
    .then((response) => {
      const { accion, ticket, error } = response.data;
      // console.log(response.data);
      $("#exampleModalCenter").modal("hide");
    //   si se realiza correctamente descuento uno a las entradas disponibles y cierro el modal
      if (accion) {
        const newVal = parseInt($("#disponibles").text()) - 1;
        $("#disponibles").html(newVal);
        $("#ticket").html(ticket);
        $("#confirmVenta").modal("show");
      } 
    //   si hay algun error muestro un modal con el error
      else {
        $("#errorModal").modal("show");
        $("#errorMessage").html(error);
      }
    })
    .catch((err) => console.log(err));
};
