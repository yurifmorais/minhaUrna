let selectUF = document.getElementById('idUF');
let selectMuni = document.getElementById('idMuni');

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

selectMuni.onchange = () => {
    let resul = document.getElementById('resul');
    var cand = document.getElementById('res').getAttribute('value');
    let valor1 = selectMuni.value;
    let valor2 = selectUF.value;
        fetch("../control/listarBol.php?selectMuni=" + valor1 + "&selectUF="+ valor2 + "&idCand=" + cand)
            .then(response => 
            {
                return response.text();
            })
            .then(texto => {
                resul.innerHTML = texto;
            });
}
