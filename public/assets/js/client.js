var base = location.protocol + "//" + location.host
var DATAMAIN = base + "/system-clean/public"

var rutClient = 0;
var rutAdminV = 0;
var emailAdminV = 0;

$('#entity').hide();
$('#admin').hide();

$('#identification').on('blur', function() {
    var identification = $(this).val();
    $.ajax({
      url: DATAMAIN + '/Validar/Rut/Cliente',
      method: 'GET',
      data: { identification: identification },
      success: function(response) {
        rutClient = response;
        console.log(rutClient);
      },
      error: function(error) {
        console.log(error);
      }
    });
});

$('#rutAdmin').on('blur', function() {
    var rutAdmin = $(this).val();
  
    $.ajax({
      url: DATAMAIN + '/Validar/Rut/Administrador',
      method: 'GET',
      data: { rutAdmin: rutAdmin },
      success: function(response) {
        rutAdminV = response;
      },
      error: function(error) {
        console.log(error);
      }
    });
});

$('#emailAdmin').on('blur', function() {
    var emailAdmin = $(this).val();
  
    $.ajax({
      url: DATAMAIN + '/Validar/Email/Administrador',
      method: 'GET',
      data: { emailAdmin: emailAdmin },
      success: function(response) {
        emailAdminV = response;
      },
      error: function(error) {
        console.log(error);
      }
    });
});

$('#validateInformation').on('click', function () {

    var archivo = $('#image').prop('files')[0];

    var name = $('#name').val();
    var identification = $('#identification').val();
    var address = $('#address').val();
    var commune = $('#commune').val();

    if (!archivo) { $('#imageValidation').removeClass('d-none'); } else { $('#imageValidation').addClass('d-none'); }
    if (name === '') { $('#nameValidation').removeClass('d-none'); } else { $('#nameValidation').addClass('d-none'); }
    if (identification === '') { $('#identificationValidation').removeClass('d-none'); } else { $('#identificationValidation').addClass('d-none'); }
    if (address === '') { $('#addressValidation').removeClass('d-none'); } else { $('#addressValidation').addClass('d-none'); }
    if (commune === '') { $('#communeValidation').removeClass('d-none'); } else { $('#communeValidation').addClass('d-none'); }
    if (rutClient == 1) { $('#identificationValidationRUT').removeClass('d-none'); } else { $('#identificationValidationRUT').addClass('d-none'); }
    if(archivo && name != '' && identification != '' && address != '' && commune != '' && rutClient <= 0){
        $('#information').hide();
        $('#button_information').removeClass('btn-primary');
        $('#button_entity').addClass('btn-primary');
        $('#entity').show();
        $('#addressEntity').val(address);
    }
})

$('#returnInformation').on('click', function(){
    $('#button_information').addClass('btn-primary');
    $('#button_entity').removeClass('btn-primary');
    $('#entity').hide();
    $('#information').show();
})

$('#validateEntity').on('click', function () {

    var nameEntity = $('#nameEntity').val();
    var addressEntity = $('#addressEntity').val();

    if (nameEntity === '') { $('#nameEntityValidation').removeClass('d-none'); } else { $('#nameEntityValidation').addClass('d-none'); }
    if (addressEntity === '') { $('#addressEntityValidation').removeClass('d-none'); } else { $('#addressEntityValidation').addClass('d-none'); }

    if(nameEntity != '' && addressEntity != ''){
        $('#entity').hide();
        $('#button_entity').removeClass('btn-primary');
        $('#button_admin').addClass('btn-primary');
        $('#admin').show();
    }
})

$('#returnEntity').on('click', function(){
    $('#button_entity').addClass('btn-primary');
    $('#button_admin').removeClass('btn-primary');
    $('#admin').hide();
    $('#entity').show();
})

$('#validateAdmin').on('click', function () {

    var nameAdmin = $('#nameAdmin').val();
    var rutAdmin = $('#rutAdmin').val();
    var emailAdmin = $('#emailAdmin').val();
    var phoneAdmin = $('#phoneAdmin').val();

    if (nameAdmin === '') { $('#nameAdminValidation').removeClass('d-none'); } else { $('#nameAdminValidation').addClass('d-none'); }
    if (rutAdmin === '') { $('#rutAdminValidation').removeClass('d-none'); } else { $('#rutAdminValidation').addClass('d-none'); }
    if (emailAdmin === '') { $('#emailAdminValidation').removeClass('d-none'); } else { $('#emailAdminValidation').addClass('d-none'); }
    if (phoneAdmin === '') { $('#phoneAdminValidation').removeClass('d-none'); } else { $('#phoneAdminValidation').addClass('d-none'); }
    if (rutAdminV == 1) { $('#rutAdminValidationRUT').removeClass('d-none'); } else { $('#rutAdminValidationRUT').addClass('d-none'); }
    if (emailAdminV == 1) { $('#emailAdminValidationEmail').removeClass('d-none'); } else { $('#emailAdminValidationEmail').addClass('d-none'); }

    if(nameAdmin != '' && rutAdmin != '' && emailAdmin != '' && rutAdminV <= 0 && emailAdminV <= 0){
        $('#formClient').submit();
    }
})

function previewImage(event, clientId) {
  const input = event.target;
  if (input.files && input.files[0]) {
    const reader = new FileReader();

    reader.onload = function (e) {
      const previewImage = document.getElementById('uploadedAvatarEdit_' + clientId);
      previewImage.src = e.target.result;
    };

    reader.readAsDataURL(input.files[0]);
  }
}



