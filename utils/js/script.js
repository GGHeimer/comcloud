function showForm (){
    let element = document.getElementById('form-new');
    element.classList.toggle('d-none');
}


function exportarJSON() {
    const lambdaUrl = "https://fmigg7dqxtczdu7uahrvf42zl40eqkvz.lambda-url.sa-east-1.on.aws/";
    fetch(lambdaUrl)
        .then(res => res.json())
        .then(data => {
            document.getElementById("jsonOutput").textContent = JSON.stringify(data, null, 2);
            new bootstrap.Modal(document.getElementById("modalJSON")).show();

            const form = document.createElement("form");
            form.method = "POST";
            form.action = "index.php";
            const input = document.createElement("input");
            input.type = "hidden";
            input.name = "importar_lambda";
            input.value = JSON.stringify(data);
            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        })
        .catch(err => alert("Erro ao chamar a Lambda: " + err));
}