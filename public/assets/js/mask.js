$(document).ready(function(){
    $('#rutMask').mask('00.000.000-0');
    $('#identificationCleanliness').mask('00.000.000-0');
    $('#identification').mask('00.000.000-0');
})

function inputMask(id){
    $('#identification'+id).mask('00.000.000-0');
}