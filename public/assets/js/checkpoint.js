var base = location.protocol + "//" + location.host
var DATAMAIN = base + "/system-clean/public"

$('#addTask').click(function () {
  var task = $('#inputTask').val();
  if(task == ''){
    $('#inputTask').addClass('is-invalid');
    $('#taskValidation').removeClass('d-none');
    
  } else {
    var row = $('<tr><td>' + task + '</td><td><button class="deleteBtn btn btn-danger rounded-pill btn-sm"><i class="fas fa-trash"></i></button></td></tr>');
    var hiddenInput = $('<input type="hidden" name="tasks[]" value="' + task + '">');
    row.append(hiddenInput);
    $('#taskTable tbody').append(row);
    $('#inputTask').val('');
    $('#inputTask').focus();
    $('#inputTask').removeClass('is-invalid');
    $('#taskValidation').addClass('d-none');
  }
});

$('#inputTask').on('keydown', function (event){
  if (event.key === "Enter" || event.key === "Return") {
    event.preventDefault()
    var task = $('#inputTask').val();
    if(task == ''){
      $('#inputTask').addClass('is-invalid');
      $('#taskValidation').removeClass('d-none');
      
    } else {
      var row = $('<tr><td>' + task + '</td><td><button class="deleteBtn btn btn-danger rounded-pill btn-sm"><i class="fas fa-trash"></i></button></td></tr>');
      var hiddenInput = $('<input type="hidden" name="tasks[]" value="' + task + '">');
      row.append(hiddenInput);
      $('#taskTable tbody').append(row);
      $('#inputTask').val('');
      $('#inputTask').focus();
      $('#inputTask').removeClass('is-invalid');
      $('#taskValidation').addClass('d-none');
    }
  }
})



$(document).on('click', '.deleteBtn', function () {
  var row = $(this).closest('tr');
  row.remove();
});

const taskItems = document.querySelectorAll('.task-item');

taskItems.forEach(function(taskItem) {
  const deleteButton = taskItem.querySelector('.delete-button');
  deleteButton.addEventListener('click', function() {
    taskItem.remove();
  });
});

$('#visits').on('keyup', function() {
  var visits = $(this).val();
  generateTimeFields(visits);
});

$(document).on('change', 'input[name^="times"]', function() {
  var selectedTime = $(this).val();
  filterTimeOptions(selectedTime);
});

function generateTimeFields(visits) {
  var timeFields = '';
  for (var i = 0; i < visits; i++) {
    timeFields += '<div class="col-md-12 mb-2">';
      timeFields += '<div class="row">';
        timeFields += '<div class="col-md-6">';
            timeFields += '<label for="start_' + i + '">Inicio visita ' + (i + 1) + ':</label>';
            timeFields += '<input type="time" id="start_' + i + '" name="visits[' + i + '][hour]" class="form-control">';
        timeFields += '</div>';
        timeFields += '<div class="col-md-6">';
          timeFields += '<label for="end_' + i + '">Rango en HR:</label>';
          timeFields += '<input type="number" id="end_' + i + '" name="visits[' + i + '][range]" class="form-control">';
        timeFields += '</div>';
      timeFields += '</div>';
    timeFields += '</div>';
  }

  $('#time-fields').html(timeFields);
}
$(document).ready(function(){
  clienteId = $('#client_id').val();
  getEntities(clienteId)
})

$('#client_id').on('change', function(){
  clienteId = $('#client_id').val();
  getEntities(clienteId);
})

function getEntities(clienteId){
  $.ajax({
    url: DATAMAIN + '/Traer/Entidades',
    type: 'GET',
    data: {
        client_id: clienteId
    },
    success: function(entities) {
      $("#entity_id").empty();
      $.each(entities, function (index, value) {
          $("#entity_id").append(
              "<option value='" + index + "'>" + value + "</option>"
          );
      });
    },
    error: function(error){
      console.log(error)
    }
    
  });
}



