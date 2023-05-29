<main class="bg-primary-500">
    <div class="container mx-auto py-12 text-white">
        <h2 class="font-bold mb-2">Jadwal Sholat Desa Palengaan Laok</h2>
        <p>{{$date}}</p>
        <section class="mt-8 flex gap-12">
            <span class="flex flex-col items-center bg-white text-primary-500 p-8 justify-center basis-1/5 rounded-md">
                <section class="text-xl inline-flex items-center gap-2">
                    <span class="iconify" data-icon="material-symbols:prayer-times"></span>
                    <span>Subuh</span>
                </section>
                <p class="text-2xl font-semibold">{{$schedule[0]}} WIB</p>
            </span>
            <span class="flex flex-col items-center bg-white text-primary-500 p-8 justify-center basis-1/5 rounded-md">
                <section class="text-xl inline-flex items-center gap-2">
                    <span class="iconify" data-icon="material-symbols:prayer-times"></span>
                    <span>Dzuhur</span>
                </section>
                <p class="text-2xl font-semibold">{{$schedule[1]}} WIB</p>
            </span>
            <span class="flex flex-col items-center bg-white text-primary-500 p-8 justify-center basis-1/5 rounded-md">
                <section class="text-xl inline-flex items-center gap-2">
                    <span class="iconify" data-icon="material-symbols:prayer-times"></span>
                    <span>Ashar</span>
                </section>
                <p class="text-2xl font-semibold">{{$schedule[2]}} WIB</p>
            </span>
            <span class="flex flex-col items-center bg-white text-primary-500 p-8 justify-center basis-1/5 rounded-md">
                <section class="text-xl inline-flex items-center gap-2">
                    <span class="iconify" data-icon="material-symbols:prayer-times"></span>
                    <span>Maghrib</span>
                </section>
                <p class="text-2xl font-semibold">{{$schedule[3]}} WIB</p>
            </span>
            <span class="flex flex-col items-center bg-white text-primary-500 p-8 justify-center basis-1/5 rounded-md">
                <section class="text-xl inline-flex items-center gap-2">
                    <span class="iconify" data-icon="material-symbols:prayer-times"></span>
                    <span>Isya</span>
                </section>
                <p class="text-2xl font-semibold">{{$schedule[4]}} WIB</p>
            </span>
        </section>
    </div>
</main>