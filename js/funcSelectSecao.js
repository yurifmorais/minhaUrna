let selectZona = document.getElementById('idZona');

selectZona.onchange = () => {
    let selectSecao = document.getElementById('idSecao');
    let valor = selectZona.value;
    fetch("../control/selectSecao.php?idZona=" + valor)
        .then(response => 
        {
            return response.text();
        })
        .then(texto => {
            selectSecao.innerHTML = texto;
        });

}
