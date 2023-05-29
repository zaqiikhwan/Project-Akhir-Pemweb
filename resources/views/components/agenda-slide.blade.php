<main class="bg-primary-500 my-[120px] flex">
    <section class="basis-1/12 flex items-center">
        <img src="{{ asset('images/logo-side-1.svg') }}" alt="side logo">
    </section>
    <section class="basis-6/12 relative p-12 text-white pb-24">
        <h1 class="text-3xl font-bold mb-4" id="agenda-title">Lorem Ipsum Dolor </h1>
        <span id="agenda-date">12 Agustus 2023</span>
        {{-- <p class="mt-4">Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor.....</p> --}}
        <section class="self-end mt-4 absolute right-8 bottom-8">
            <button class="btn-secondary" id="prev-agenda" onclick="agendaHandler(-1)"><</button>
            <button class="btn-secondary" id="next-agenda" onclick="agendaHandler(1)">></button>
        </section>
    </section>
    <section class="basis-5/12">
        <img 
            src="{{ asset('https://placekitten.com/400/400') }}" 
            alt="image"
            class="w-full h-96 object-cover"
            id="agenda-image">
    </section>
</main>
<script>
    let agendas = @json($agendas);
    let idx = 0;
    let maxAgenda = agendas.length;
    let Agendaimage = document.getElementById("agenda-image");
    let Agendadate = document.getElementById("agenda-date");
    let Agendatitle = document.getElementById("agenda-title");
    let prevAgenda = document.getElementById("prev-agenda");
    let nextAgenda = document.getElementById("next-agenda");

    let setAgenda = (i) => {
        Agendaimage.src = `/data_file/${agendas[i].image}`;
        Agendadate.innerText = agendas[i].updated_at;
        Agendatitle.innerText = agendas[i].title;
    }

    const checkButtonAgenda = () => {
        prevAgenda.disabled = idx == 0;
        nextAgenda.disabled = idx == maxAgenda - 1;
    }

    const agendaHandler = (i) => {
        if(idx + i >= 0 && idx + i < maxAgenda){
            idx = idx + i;
            setAgenda(idx);
            checkButtonAgenda();
        }
    }

    checkButtonAgenda();
    setAgenda(idx);
</script>