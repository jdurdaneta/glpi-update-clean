$(document).ready(function () {
  $(".select-dropdown-entities").select2();

  var glpiCSRFtoken = $('input[name="_glpi_csrf_token"]').val();

  $("#sel_user").change(function () {
    // alert( $('option:selected', this).val() );
    var userId = $("option:selected", this).val();
    // Realizar una solicitud AJAX
    $.ajax({
      url: "/plugins/infoestadisticas/front/ie_action_get_usergroup.php",
      type: "GET",
      
      data: { userId: userId, _glpi_csrf_token : glpiCSRFtoken },
      dataType: "json",
      crossDomain: true,
      success: function (data) {
        $("#sel_userGroup").empty(); // Limpiar el select de grupos
        $("#sel_userGroup").append('<option value="">Seleccionar</option>');
        $.each(data, function(key, value) {
            $("#sel_userGroup").append('<option value="' + key+ '">' + value + '</option>');
        });
      },
      error: function (error) {
        console.error("Error en la solicitud AJAX: ", error);
      },
    });
  });
});

// Función genérica para mostrar/ocultar contenido
const mostrarContenido = (mostrarId, ocultarId) => {
  const mostrar = document.getElementById(mostrarId);
  const ocultar = document.getElementById(ocultarId);

  // mostrar.style.display = "block";
  // ocultar.style.display = "none";

  // Forzar el reflow para activar la transición
  // mostrar.offsetHeight;
  // ocultar.offsetHeight;

  // Aplicar las clases para la transición
  mostrar.classList.add("mostrar");
  mostrar.classList.remove("ocultar");
  ocultar.classList.add("ocultar");
  ocultar.classList.remove("mostrar");
};

// Event listener para todos los botones con la clase 'verContenido'
const botonesVerContenido = document.querySelectorAll(".verContenido");
botonesVerContenido.forEach((boton) => {
  boton.addEventListener("click", function () {
    const mostrar = this.getAttribute("data-mostrar");
    const ocultar = this.getAttribute("data-ocultar");
    mostrarContenido(mostrar, ocultar);
  });
});

/* const usuariosSelect = document.getElementById("sel_user");
usuariosSelect.addEventListener("change", function () {
  // Cuando se selecciona un usuario, cargar los grupos asociados
  // const usuarioSeleccionado = usuariosSelect.value;

  console.log('usuarioSeleccionado');
  // cargarGrupos(usuarioSeleccionado);
});
document.addEventListener("DOMContentLoaded", function () {
  const usuariosSelect = document.getElementById("sel_user");
  const gruposSelect = document.getElementById("sel_userGroup");
});

function cargarGrupos(idUsuario) {
  // Hacer una solicitud Fetch para obtener los grupos del usuario
  fetch(
    "http://localhost/glpi-externos-local/plugins/infoestadisticas/front/ie_graph_tecnico.php",
    {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: `idUsuario=${idUsuario}`,
    }
  )
    .then((response) => response.json())
    .then((data) => {
      // ... (resto del código)
      console.log(data);
    });
}
 */
