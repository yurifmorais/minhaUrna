let selectCargo = document.getElementById('idCargo');
let idUF = document.getElementById('idUF');

selectCargo.onchange = () => {
    let selectCand = document.getElementById('idCand');
    let valor = selectCargo.value;
    let val = idUF.value;
    fetch("../control/selectCandidato.php?idCargo=" + valor + "&idUF=" +val)
        .then(response => 
        {
            return response.text();
        })
        .then(texto => {
            selectCand.innerHTML = texto;
        });

}