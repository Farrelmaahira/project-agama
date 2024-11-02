<x-layouts.app>
    <section class="md:h-[100vh] h-[91vh] w-full relative" id="hero">
        <div class="absolute inset-0 w-full h-[100vh]">
            {{-- content tengah --}}
            <div class="md:translate-y-24 translate-y-24 h-80 w-full grid md:grid-cols-2 grid-cols-1 gap-12">
                <div class="col-span-1 justify-end items-end md:grid hidden">
                    <img src="/images/muslim-family.png" class="w-[28rem] object-cover">
                </div>
                <div class="col-span-1 grid md:justify-start justify-center my-auto">
                    <div class="text-primary md:w-[40rem] w-[18rem] h-full">
                        <h1 class="md:text-4xl text-2xl font-bold my-10 text-center md:text-start">Welcome to Islam Pro</h1>
                        <p class="my-6 md:text-lg text-sm font-normal mb-10 text-center md:text-start">Islam Pro adalah platform yang memudahkan umat Muslim membaca Al-Qur'an, mengakses jadwal kajian, mempelajari sunnah, dan menemukan doa sehari-hari. Dengan antarmuka sederhana, Islam Pro mendukung kemudahan dalam memperdalam pemahaman agama Islam.</p>
                        <div class="flex justify-center md:justify-start">
                            <button id="scrollButton" class="md:p-4 p-2 border-2 border-primary cursor-pointer  text-primary rounded-lg hover:bg-primary hover:text-white">
                                Al-Qur'an
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img src="/images/hero-wave.svg" alt="wave" class="bottom-0 absolute -z-10 object-cover h-[8rem] md:h-min">
    </section>
    {{-- ini merupakan section surah --}}
    <section id="surah" >
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:px-28 py-10 px-6">
            @forelse ($data as $key => $value)
                <x-surah-card :data="$value" />
            @empty
                kosong
            @endforelse
        </div>
    </section>
    <x-layouts.footer />
    <script>
        function smoothScrollToY(targetY, duration) {
            const startY = window.scrollY; // posisi awal
            const distance = targetY - startY; // jarak yang akan ditempuh
            let startTime = null;

            function animation(currentTime) {
                if (!startTime) startTime = currentTime;
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
                window.scrollTo(0, startY + distance * easeInOutQuad(progress));

                if (progress < 1) {
                    requestAnimationFrame(animation); // Lanjutkan animasi
                }
            }
            function easeInOutQuad(t) {
                return t < 0.5 ? 2 * t * t : -1 + (4 - 2 * t) * t;
            }

            requestAnimationFrame(animation);
        }

        // Menambahkan event listener pada tombol
        document.getElementById('scrollButton').addEventListener('click', function() {
            smoothScrollToY(770, 1000); // Ganti 500 dengan posisi Y yang diinginkan dan 1000 dengan durasi dalam ms
        });


    </script>
</x-layouts.app>
