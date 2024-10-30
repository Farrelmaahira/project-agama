<x-layouts.app>
    <section class="h-[100vh] w-full relative" id="hero">
        <div class="absolute inset-0 w-full h-[100vh]">
            {{-- content tengah --}}
            <div class="md:translate-y-24 translate-y-36 h-80 w-full grid md:grid-cols-2 grid-cols-1 gap-12">
                <div class="col-span-1 justify-center items-center md:grid hidden">
                    <img src="/images/ngaji.png" class="w-[24rem] h-[24rem] object-cover">
                </div>
                <div class="col-span-1 grid justify-center items-center">
                    <div class="text-primary md:w-[40rem] w-[18rem] h-full">
                        <h1 class="md:text-4xl text-2xl font-bold my-10">Welcome to Islam Pro</h1>
                        <p class="my-6 md:text-lg text-sm font-normal mb-10">Islam Pro adalah platform yang memudahkan umat Muslim membaca Al-Qur'an, mengakses jadwal kajian, mempelajari sunnah, dan menemukan doa sehari-hari. Dengan antarmuka sederhana, Islam Pro mendukung kemudahan dalam memperdalam pemahaman agama Islam.</p>
                        <a href="#surah" id="scrollButton" class="md:p-4 p-2 border-2 border-primary text-primary rounded-lg hover:bg-primary hover:text-white">
                            baca quran
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <img src="/images/hero-wave.svg" alt="wave" class="bottom-0 absolute -z-10 object-cover h-[32rem] md:h-min">
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
        document.getElementById('scrollButton').addEventListener('click', function(event) {
            event.preventDefault();
            document.querySelector('#surah').scrollIntoView({
                behavior: 'smooth'
            });
        });
    </script>
</x-layouts.app>
