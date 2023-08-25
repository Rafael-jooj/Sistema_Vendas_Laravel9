const texto = document.getElementById('texto').textContent;
const number = document.getElementById('num').textContent;

// console.log({texto, number});

function printar(){
    console.log({texto, number});
}

function addComponent() {
    const container = document.getElementById('components-container');
    const newComponent = `
        <div class="row mb-4">
            <div class="col">
                <input type="number" name="product_id[]" class="form-control" placeholder="Product ID" aria-label="Product ID">
            </div>
            <div class="col">
                <input type="number" name="quantity[]" class="form-control" placeholder="Quantidade" aria-label="Quantidade">
            </div>
            <div class="col">
                <input type="number" name="price[]" class="form-control" placeholder="Preço" aria-label="Preço">
            </div>
            <div class="col">
                <button  class="sale-campo" onclick="removeComponent(this)">Remover</button>
            </div>
        </div>
    `;
    container.insertAdjacentHTML('beforeend', newComponent);
}

function removeComponent(button) {
    button.closest('.row').remove();
}