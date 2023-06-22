var base = location.protocol + "//" + location.host
var DATAMAIN = base + "/system-clean/public"

$('#identificationCleanliness').on('keyup', function () {
    var worker_id = $('#identificationCleanliness').val();
    if (worker_id.length == 12) {
        $.ajax({
            url: DATAMAIN + '/Checkpoints/Verificar/Trabajador',
            type: 'GET',
            data: {
                worker_id: worker_id
            },
            success: function (response) {
                if ($.isEmptyObject(response)) {
                    $('#identificationCleanliness').addClass('is-invalid');
                    $('#validateIdWorker').removeClass('d-none');
                    $('#formRegisterCleanliness').addClass('d-none');
                } else {
                    $('#identificationCleanliness').removeClass('is-invalid');
                    $('#identificationCleanliness').addClass('is-valid');
                    $('#validateIdWorker').addClass('d-none');
                    $('#name').val(response.name);
                    $('#worker_id').val(response.id);
                    $('#formRegisterCleanliness').removeClass('d-none');
                    $('#nameVisitor').removeClass('d-none');
                    
                }
            },
            error: function (error) {
                console.log(error)
            }
        });
    } else {
        $('#identificationCleanliness').removeClass('is-invalid');
        $('#validateIdWorker').addClass('d-none');
        $('#formRegisterCleanliness').addClass('d-none');
    }
})

$('#identificationCleanlinessIncidence').on('keyup', function () {
    var worker_id = $('#identificationCleanlinessIncidence').val();
    if (worker_id.length == 12) {
        $.ajax({
            url: DATAMAIN + '/Checkpoints/Verificar/Trabajador',
            type: 'GET',
            data: {
                worker_id: worker_id
            },
            success: function (response) {
                if ($.isEmptyObject(response)) {
                    $('#identificationCleanlinessIncidence').addClass('is-invalid');
                    $('#validateIdWorkerIncidence').removeClass('d-none');
                } else {
                    $('#identificationCleanlinessIncidence').removeClass('is-invalid');
                    $('#identificationCleanlinessIncidence').addClass('is-valid');
                    $('#name').val(response.name);
                    $('#worker_resolve_id').val(response.id);
                    $('#validateIdWorkerIncidence').addClass('d-none');
                    $('#formRegisterCleanlinessIncidence').removeClass('d-none');
                }
            },
            error: function (error) {
                console.log(error)
            }
        });
    } else {
        $('#identificationCleanliness').removeClass('is-invalid');
        $('#validateIdWorker').addClass('d-none');
        $('#formRegisterCleanliness').addClass('d-none');
    }
})

$('#imagesEvidences').on('change', function () {
    var images = $(this)[0].files;
    if (images.length > 5) {
        $('#validateImages').removeClass('d-none');
        $(this).val('');
    } else {
        $('#validateImages').addClass('d-none');
    }
});

$('#buttonVisitCheckpointRegister').on('click', function () {
    $('#formVisitCheckpointRegister').submit();
})

const radios = document.querySelectorAll('input[type="radio"][name="hour"]');
radios.forEach(radio => {
    radio.addEventListener('change', function () {
        const selectedHour = parseInt(this.value.replace(':', ''));
        const currentDate = new Date();
        const currentHour = currentDate.getHours().toString().padStart(2, '0');
        const currentMinute = currentDate.getMinutes().toString().padStart(2, '0');
        const currentTime = parseInt(currentHour + currentMinute);
        if (selectedHour > currentTime) {
            const selectedRadio = this; // Guardar referencia al radio button seleccionado
            Swal.fire({
                text: 'La hora seleccionada está fuera del rango establecido. ¿Desea registrarla como una visita adicional?',
                icon: 'info',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                confirmButtonColor: '#696cff',
                cancelButtonText: 'No',
                confirmButtonText: 'Si',
            }).then((result) => {
                if (result.isConfirmed) {
                    selectedRadio.disabled = true;
                    selectedRadio.checked = false;
                    $('#hoursDB').addClass('d-none');
                    $('#infoStatus').addClass('d-none');
                    $('#labelHours').addClass('d-none');
                    $('#labelInfoHours').removeClass('mb-3');
                    $('#additionalVisitTwo').removeClass('d-none');
                    $('#visitAdditional').prop('disabled', false);
                } else {
                    selectedRadio.disabled = true;
                    selectedRadio.checked = false;
                }
            });
        }
    });
});

$('#addVisitAdditional').on('click', function(){
    Swal.fire({
        text: '¿Está seguro que desea registrar una visita adicional?',
        icon: 'info',
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonColor: '#696cff',
        cancelButtonText: 'No',
        confirmButtonText: 'Si',
    }).then((result) => {
        if (result.isConfirmed) {
            $('#hoursDB').addClass('d-none');
            $('#labelHours').addClass('d-none');
            $('#infoStatus').addClass('d-none');
            $('#labelInfoHours').removeClass('mb-3');
            $('#additionalVisit').removeClass('d-none');
            $('#contentForm').removeClass('d-none');
        }
    });
})

$('#buttonSolveIncidence').on('click', function(){
    $('#pendingIncidents').addClass('d-none');
    $('#solveIncidents').removeClass('d-none');
})

$('#solveIncidencePending').on('click', function(){
    $('#visitNorm').addClass('d-none');
    $('#alertIncidence').addClass('d-none');
    $('#solveIncidentsPending').removeClass('d-none');
    $('#worker_resolve_id').val($('#worker_id').val());
})

