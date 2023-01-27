let selectUF = document.getElementById('idUF');

selectUF.onchange = () => {
    let selectMuni = document.getElementById('idMuni');
    let valor = selectUF.value;
    fetch("../control/selectMuni.php?idUF=" + valor)
        .then(response => 
        {
            return response.text();
        })
        .then(texto => {
            selectMuni.innerHTML = texto;
        });

}
