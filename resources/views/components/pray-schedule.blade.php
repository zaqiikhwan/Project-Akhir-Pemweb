<main class="bg-primary-500">
    <div class="container mx-auto py-16 text-white">
        <h2 class="font-bold mb-2">Jadwal Sholat Desa Palengaan Laok</h2>
        <p>{{$date}}</p>
        <section class="mt-8 flex gap-12">
            <span class="pray-schedule">
                <section class="text-xl inline-flex items-center gap-2">
                    <span class="iconify" data-icon="material-symbols:prayer-times"></span>
                    <span>Subuh</span>
                </section>
                <p class="text-2xl font-semibold">{{$schedule[0]}} WIB</p>
            </span>
            <span class="pray-schedule">
                <section class="text-xl inline-flex items-center gap-2">
                    <span class="iconify" data-icon="material-symbols:prayer-times"></span>
                    <span>Dzuhur</span>
                </section>
                <p class="text-2xl font-semibold">{{$schedule[1]}} WIB</p>
            </span>
            <span class="pray-schedule">
                <section class="text-xl inline-flex items-center gap-2">
                    <span class="iconify" data-icon="material-symbols:prayer-times"></span>
                    <span>Ashar</span>
                </section>
                <p class="text-2xl font-semibold">{{$schedule[2]}} WIB</p>
            </span>
            <span class="pray-schedule">
                <section class="text-xl inline-flex items-center gap-2">
                    <span class="iconify" data-icon="material-symbols:prayer-times"></span>
                    <span>Maghrib</span>
                </section>
                <p class="text-2xl font-semibold">{{$schedule[3]}} WIB</p>
            </span>
            <span class="pray-schedule">
                <section class="text-xl inline-flex items-center gap-2">
                    <span class="iconify" data-icon="material-symbols:prayer-times"></span>
                    <span>Isya</span>
                </section>
                <p class="text-2xl font-semibold">{{$schedule[4]}} WIB</p>
            </span>
        </section>
    </div>
</main>
<script>
    const elements = document.getElementsByClassName("pray-schedule");
    console.log(elements);

    window.addEventListener('scroll', e => {
        const pos = elements[0].getBoundingClientRect();
        if (pos.top <= window.innerHeight && pos.bottom >= 0) {
            for (let i = 0; i < elements.length; i++) {
                elements[i].style.animationDelay = `${i*0.15}s`;
                elements[i].classList.add("fadeInBottom-animation");
            }
        } else {
            for (let i = 0; i < elements.length; i++) {
                elements[i].classList.remove("fadeInBottom-animation");
                elements[i].style.opacity = 0;
            }
        }
    })
</script>