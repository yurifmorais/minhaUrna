$(document).ready(function() {
    $("#turno").on('change', function() {
        var option = $(this).find('option:selected').val();
        document.getElementById('res').innerHTML += '<a class="verify" href="verificarBol.php?turno='+option+'"><img src="illustrations/verify.svg" alt="addIcon" /></a>';
    });
});