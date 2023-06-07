<div
    class="payment-modal hidden"
    id="payment-modal">
    <section class="p-8 w-2/3 relative rounded-md modal-content bg-primary-500">
        <button class="absolute top-6 right-6 text-white font-bold hover:shadow-lg" onclick="closeModal()">X</button>
        <h2 class="text-white font-bold mb-8 text-center">Form Pembelian</h2>
        <form action="{{route('payqris')}}" class="flex" method="GET">
            <section class="flex flex-col gap-6 basis-3/5 pr-8 border-r-2">
                <span>
                    <label for="name" class="text-white block mb-2">Nama</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name"
                        class="w-full p-2 rounded-sm" required>
                </span>
                <span>
                    <label for="address" class="text-white block mb-2">Alamat</label>
                    <input 
                        type="text"
                        name="address"
                        id="address"
                        class="w-full p-2 rounded-sm" required>
                </span>
                <span>
                    <label for="phone" class="text-white block mb-2">Nomor Telepon</label>
                    <input 
                        type="text"
                        name="phone"
                        id="phone"
                        class="w-full p-2 rounded-sm" required>
                </span>
            </section>
            <section class="basis-2/5 ml-8">
                <img
                    src="/foto_produk/{{explode("|", $product->images)[0]}}"
                    alt="productimages"
                    class="w-full aspect-video object-cover mb-4 rounded-md">
                    <section class="text-white">
                        <input
                            class="text-2xl mb-4 bg-inherit outline-none font-bold" 
                            value="Lorem Ipsum Dolor"
                            readonly
                            id="product-name"
                            name="product_name"/>
                        <p>Harga: Rp {{$product->price}}</p>
                        <p>Jumlah:
                            <input type="number" readonly id="quantity-value" class="bg-inherit" name="quantity">
                        </p>
                        <h2 class="text-xl mt-4 flex gap-2">
                            <span>Total: Rp </span>
                            <input type="number" readonly class="bg-inherit inline" id="total-value" name="total">
                        </h2>
                    </section>
                    <button class="btn-secondary px-12 float-right mt-4">Beli</button>
            </section>
        </form>
    </section>
</div>
<script>
    let paymentModal = document.getElementById("payment-modal");
    let amount = document.getElementById('amount-input');
    let quantityValue = document.getElementById('quantity-value');
    let totalValue = document.getElementById('total-value');
    let productName = document.getElementById('product-name');
    let data = @json($product);

    const setQuantity = e =>{
        quantityValue.value = e.target.value;
        totalValue.value = e.target.value * data.price;
    }

    const openModal = () => {
        paymentModal.style.display = 'flex';
    }

    const closeModal = () => {
        paymentModal.style.display = 'none';
    }

    window.onclick = function(event) {
      if (event.target == paymentModal) {
        closeModal();
      }
    }

    quantityValue.value = amount.value
    totalValue.value = data.price
    productName.value = data.product_name

</script>