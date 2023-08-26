function addParcela() {
    const totalValue = parseFloat(document.getElementById('total-price').value);
    const parcelas = parseInt(document.getElementById('quntityParcelas').value);

    if (isNaN(totalValue) || isNaN(parcelas)) {
        alert('Informe um valor total e a quantidade de parcelas válidos.');
        return;
    }

    const parcelaContainer = document.getElementById('parcela-container');
    parcelaContainer.innerHTML = ''; // Limpa as parcelas existentes

    const valorParcela = totalValue / parcelas;
    const dataAtual = new Date();
    
    for (let i = 1; i <= parcelas; i++) {
        const dataParcela = new Date(dataAtual);
        dataParcela.setMonth(dataParcela.getMonth() + i);

        const parcelaComponent = `
            <div class="row gap-3 mb-3">
                <label>Parcela ${i}</label>
                <input type="date" class="form-control w-25" value="${dataParcela.toISOString().substr(0, 10)}">
                <input type="text" class="form-control w-25" value="${valorParcela.toFixed(2)}">
            </div>
        `;

        parcelaContainer.insertAdjacentHTML('beforeend', parcelaComponent);
    }
}