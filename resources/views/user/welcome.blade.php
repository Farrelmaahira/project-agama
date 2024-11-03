<x-layouts.app>
    <section class="md:h-[100vh] h-[85vh] w-full relative" id="hero">
        <div class="absolute inset-0 w-full h-[100vh]">
            {{-- content tengah --}}
            <div class="md:translate-y-24 translate-y-24 h-80 w-full grid md:grid-cols-2 grid-cols-1 gap-12">
                <div class="col-span-1 justify-end items-end md:grid hidden">
                    <img src="/images/muslim-family.png" class="w-[28rem] object-cover">
                </div>
                <div class="col-span-1 grid md:justify-start justify-center my-auto">
                    <div class="text-primary md:w-[40rem] w-[18rem] h-full">
                        <h1 class="md:text-4xl text-2xl font-bold my-10 text-center md:text-start">Welcome to Itik.id
                        </h1>
                        <p class="my-6 md:text-lg text-sm font-normal mb-10 text-center md:text-start">Islam Pro adalah
                            platform yang memudahkan umat Muslim membaca Al-Qur'an, mengakses jadwal kajian, mempelajari
                            sunnah, dan menemukan doa sehari-hari. Dengan antarmuka sederhana, Islam Pro mendukung
                            kemudahan dalam memperdalam pemahaman agama Islam.</p>
                        <div class="flex justify-center md:justify-start">
                            <button id="scrollButton"
                                class="md:p-4 p-2 border-2 border-primary cursor-pointer text-primary rounded-lg hover:bg-primary hover:text-white">
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
    <section id="surah">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:px-28 py-10 px-6">
            @forelse ($data as $key => $value)
                <x-surah-card :data="$value" />
            @empty
                <x-blank-page />
            @endforelse
        </div>
    </section>

    <section id="kajian" class="h-screen">
        <div class="md:px-28 px-6 py-4">
            <h1 class="text-primary md:text-2xl text-xl font-semibold ">
                Kajian Terbaru
            </h1>
            <div class="border-b-2 border-primary w-full my-2"></div>
        </div>
        <div class="md:px-28 px-6 py-2 grid md:grid-cols-2 grid-cols-1 gap-4">
            @forelse($kajian as $key => $d)
                <a href="{{ route('kajian.show', ['id' => $d->id]) }}"
                    class="bg-white shadow-md shadow-gray-400 text-primary md:p-4 rounded-md col-span-1 md:gap-4 gap-2 grid md:grid-cols-2 grid-cols-1 hover:shadow-primary hover:shadow cursor-pointer delay-100">
                    <div class="col-span-1">
                        <img src="{{ asset('storage/' . $d->foto)??asset('images/no-image.jpg') }}" class="object-cover h-56 w-full rounded-md">
                    </div>
                    <div class="col-span-1 px-4 py-2 md:px-0 md:py-0 ">
                        <h1 class="line-clamp-1 hover:line-clamp-2 cursor-pointer mb-1  font-bold">
                            {{ $d->judul }}
                        </h1>
                        <div class="border-b-[2px] border-primary my-2"></div>
                        <h1 class="mb-2 flex gap-1 text-sm">
                            <x-icon.caldendar /> {{ formatingDate($d->tanggal) }}
                        </h1>
                        <h1 class="mb-2 flex gap-1 text-sm">
                            <x-icon.clock /> {{ $d->jam }}
                        </h1>
                        <div class="truncate md:line-clamp-4 line-clamp-2 text-sm">
                            {!! htmlspecialchars_decode($d->description) !!}
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-1 md:col-span-2">
                    <x-blank-page />
                </div>
            @endforelse

        </div>

    </section>

    <button id="returnButton"
        class="fixed bottom-4 animate-bounce right-4 bg-primary text-white p-3 rounded-full shadow-lg mb-20 md:mb-0">
        <!-- Icon panah ke bawah (default) -->
        <svg id="downArrow" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
        <!-- Icon panah ke atas -->
        <svg id="upArrow" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
        </svg>
    </button>

    <script>
        const kajianSection = document.getElementById('kajian');
        const SCROLL_THRESHOLD = kajianSection.getBoundingClientRect().top + window.scrollY -
        100; // Posisi Y di mana ikon akan berganti
        const scrollButton = document.getElementById('scrollButton');
        const returnButton = document.getElementById('returnButton');
        const downArrow = document.getElementById('downArrow');
        const upArrow = document.getElementById('upArrow');

        // Fungsi untuk animasi scroll
        function smoothScrollToY(targetY, duration) {
            const startY = window.scrollY;
            const distance = targetY - startY;
            let startTime = null;

            function animation(currentTime) {
                if (!startTime) startTime = currentTime;
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
                window.scrollTo(0, startY + distance * easeInOutQuad(progress));

                if (progress < 1) {
                    requestAnimationFrame(animation);
                }
            }

            function easeInOutQuad(t) {
                return t < 0.5 ? 2 * t * t : -1 + (4 - 2 * t) * t;
            }

            requestAnimationFrame(animation);
        }

        // Scroll ke bagian "Surah" saat tombol Al-Qur'an diklik
        scrollButton.addEventListener('click', function() {
            smoothScrollToY(750, 1000); // Scroll ke section surah
        });

        // Scroll ke atas atau bawah menggunakan tombol di kanan bawah
        returnButton.addEventListener('click', function() {
            if (window.scrollY < SCROLL_THRESHOLD - 650) {
                // Jika belum mencapai kajian section, scroll ke kajian section
                smoothScrollToY(SCROLL_THRESHOLD, 1000);
            } else {
                // Jika sudah berada di kajian section, scroll ke atas
                smoothScrollToY(0, 1000);
            }
        });

        // Ganti ikon panah berdasarkan posisi scroll
        window.addEventListener('scroll', function() {
            if (window.scrollY < SCROLL_THRESHOLD - 650) {
                // Jika belum mencapai kajian section
                downArrow.classList.remove('hidden');
                upArrow.classList.add('hidden');
            } else {
                // Jika sudah berada di kajian section
                downArrow.classList.add('hidden');
                upArrow.classList.remove('hidden');
            }
        });
    </script>
</x-layouts.app>
