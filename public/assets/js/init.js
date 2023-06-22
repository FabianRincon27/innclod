var prefix = document.getElementsByName("prefix")[0].getAttribute("content")
var base = location.protocol + "//" + location.host
var DATAMAIN = base + "/system-clean/public" + prefix

$('#entityNavbar').on('change', function(){
  $('#form_search').submit();
})

$('.data-table').DataTable({
    pageLength: 25,
    language: {
      "processing": "Cargando información...",
      "lengthMenu": "Mostrar _MENU_",
      "zeroRecords": "No se encontraron resultados",
      "emptyTable": "Sin registros...",
      "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
      "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
      "infoFiltered": "(Datos filtrados de un total de _MAX_ registros)",
      "search": "Buscar: ",
      "infoThousands": ",",
      "loadingRecords": "Cargando información...",
  
      "paginate": {
        "first": "Primero",
        "last": "Último",
        "next": "Siguiente",
        "previous": "Anterior"
      },
      "aria": {
        "sortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    },
    "aaSorting": [],
  });

  $('.select2').select2({
    theme: "bootstrap-5",
  });
  
  function modalNewEntity(){
    $('.selectModal').select2({
      theme: "bootstrap-5",
      dropdownParent: $('#newEntity')
    });
  }

  function modalEditEntity(id){
    $('.selectModal').select2({
      theme: "bootstrap-5",
      dropdownParent: $('#editEntity' + id)
    });
  }

  function modalEditUser(id){
    $('.selectModal').select2({
      theme: "bootstrap-5",
      dropdownParent: $('#editUser' + id)
    });
    $('#rutMask'+id).mask('00.000.000-0');
  }

  function modalNewCheckpoint(){
    $('.selectModal').select2({
      theme: "bootstrap-5",
      dropdownParent: $('#newCheckpoint')
    });
  }

  function modalNewUser(){
    $('.selectModal').select2({
      theme: "bootstrap-5",
      dropdownParent: $('#newUser')
    });
  }
