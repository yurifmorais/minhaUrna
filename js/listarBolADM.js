var valor = 0;
$(document).ready(function() {
    $('input:radio[name="verif"]').change(function() {
      if ($("input[name='verif']:checked")) {
        valor = $(this).val();
      } 
    });
  });
  

let selectUF = document.getElementById('idUF');
let selectMuni = document.getElementById('idMuni');

selectUF.onchange = () => {
    let selectMuni = document.getElementById('idMuni');
    let val = selectUF.value;
    fetch("../control/selectMuni.php?idUF=" + val)
        .then(response => 
        {
            return response.text();
        })
        .then(texto => {
            selectMuni.innerHTML = texto;
        });

}

selectMuni.onchange = () => {
    let resul = document.getElementById('resul');
    var turno = document.getElementById('res').getAttribute('value');
    let valor1 = selectMuni.value;
    let valor2 = selectUF.value;
        fetch("../control/listarBolADM.php?selectMuni=" + valor1 + "&selectUF="+ valor2 + "&verif=" + valor + "&turno="+turno)
            .then(response => 
            {
                return response.text();
            })
            .then(texto => {
                resul.innerHTML = texto;
            });
}
