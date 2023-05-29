<div
    class="payment-modal hidden"
    id="payment-modal">
    <section class="p-8 w-2/3 relative rounded-md modal-content bg-primary-500">
        <button class="absolute top-6 right-6 text-white font-bold hover:shadow-lg" onclick="closeModal()">X</button>
        <h2 class="text-white font-bold mb-8 text-center">Form Pembelian</h2>
        <form action="" class="flex">
            <section class="flex flex-col gap-6 basis-3/5 pr-8 border-r-2">
                <span>
                    <label for="nama" class="text-white block mb-2">Nama</label>
                    <input 
                        type="text" 
                        name="nama" 
                        id="nama"
                        class="w-full p-2 rounded-sm" required>
                </span>
                <span>
                    <label for="alamat" class="text-white block mb-2">Alamat</label>
                    <input 
                        type="text"
                        name="alamat"
                        id="alamat"
                        class="w-full p-2 rounded-sm" required>
                </span>
                <span>
                    <label for="telepon" class="text-white block mb-2">Nomor Telepon</label>
                    <input 
                        type="text"
                        name="telepon"
                        id="telepon"
                        class="w-full p-2 rounded-sm" required>
                </span>
            </section>
            <section class="basis-2/5 ml-8">
                <img
                    src="https://placekitten.com/500/500"
                    alt="productimages"
                    class="w-full aspect-video object-cover mb-4 rounded-md">
                    <section class="text-white">
                        <h2 class="text-xl mb-4">Lorem Ipsum Dolor</h2>
                        <p>Harga: Rp 00.000</p>
                        <p>Jumlah: 2</p>
                        <h2 class="text-xl mt-4">Total: Rp 00.000</h2>
                    </section>
                    <button class="btn-secondary px-12 float-right mt-4">Beli</button>
            </section>
        </form>
    </section>
</div>
<script>
    let paymentModal = document.getElementById("payment-modal");
    let amount = document.getElementById('amount-input');
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
</script>