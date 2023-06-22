var base = location.protocol + "//" + location.host
var DATAMAIN = base + "/system-clean/public"

$(document).ready(function () {
  cliente_search = $('#client_search').val();
  getEntitiesSearch(cliente_search);
})

$('#client_search').on('change', function () {
  clienteId = $('#client_search').val();
  getEntitiesSearch(clienteId);
})

function getEntitiesSearch(clienteId) {
  $.ajax({
    url: DATAMAIN + '/Traer/Entidades/Buscador',
    type: 'GET',
    data: {
      client_id: clienteId
    },
    success: function (entities) {
      $("#entity_search").empty();
      $.each(entities, function (index, value) {
        $("#entity_search").append(
          "<option value='" + index + "}'>" + value + "</option>"
          
        );
      });
    },
    error: function (error) {
      console.log(error)
    }

  });
}