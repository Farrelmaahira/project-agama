<x-layouts.app>
    <div class="flex w-full drawer">
        <div class="w-1/6 md:h-[40rem] overflow-y-scroll scroll-auto md:block hidden sticky top-0" id="sidebar">
            <div class="grid grid-cols-1 gap-1">
                @forelse ($data as $d)
                    <div class="flex gap-2 w-full">
                        <div class="" id="border-{{$d['nomor']}}"></div>
                        <button class="btn col-span-1 btn-ghost flex md:px-[5rem] px-[2rem]" onclick="ScrollTo({{$d['nomor']}})" id="btn-{{$d['nomor']}}">
                            Ayat {{$d['nomor']}}
                        </button>
                    </div>
                @empty
                    kosong
                @endforelse
            </div>
        </div>

        <div class="md:w-5/6 w-full md:h-[40rem] h-[43rem] overflow-y-scroll scroll-smooth" id="surah-container">
            <div class="grid grid-cols-1 gap-12">
                <div class="px-3 pb-6 flex justify-center">
                    <h1 class="font-bold text-primary md:text-4xl text-2xl">
                        بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ
                    </h1>
                </div>
                @forelse ($data as $d)
                    <section class="px-3 pb-6 col-span-1 border-b-2" id="{{$d['nomor']}}">
                        <div class="flex gap-4 justify-end items-center">
                            <div class="text-2xl text-end md:text-4xl font-normal max-w-[18rem] md:max-w-4xl leading-[3rem] md:leading-loose inline-block">
                                {{$d['ar']}}
                                <span class="md:w-10 md:h-10 w-8 h-8 p-1 md:text-2xl text-lg md:border-2 border-2 border-gray-800 text-gray-800 rounded-full text-center align-middle">
                                    {{convertToArabicNumerals($d['nomor'])}}
                                </span>
                            </div>
                        </div>
                        <div class="mt-14">
                            <p class="text-sm md:text-lg font-semibold font-serif">{!! htmlspecialchars_decode($d['tr']) !!}</p>
                            <p class="text-sm md:text-xl">{!! $d['id'] !!}</p>
                        </div>
                    </section>
                @empty
                    kosong
                @endforelse
            </div>
        </div>

        <input id="my-drawer" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content md:hidden block">
            <label for="my-drawer" class="btn btn-circle bg-primary text-white p-3 rounded-full shadow-lg fixed bottom-4 right-4 mb-20 md:mb-0 drawer-button">
                <x-icon.bars-3/>
            </label>
        </div>

        <div class="drawer-side pt-20">
            <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
            <div class="menu bg-white text-base-content min-h-full w-44 p-4">
                <div class="md:h-[40rem] overflow-y-scroll scroll-auto h-full sticky top-0" id="drawer-sidebar">
                    <div class="grid grid-cols-1 gap-1 pb-20">
                        @forelse ($data as $d)
                            <div class="flex gap-2 w-full">
                                <div class="" id="border-{{$d['nomor']}}"></div>
                                <button class="btn col-span-1 btn-ghost flex md:px-[5rem] px-[2rem]" onclick="ScrollTo({{$d['nomor']}})" id="btn-drawer-{{$d['nomor']}}">
                                    Ayat {{$d['nomor']}}
                                </button>
                            </div>
                        @empty
                            <x-blank-page/>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function smoothScrollToY(container, targetY, duration) {
            const startY = container.scrollTop;
            const distance = targetY - startY;
            let startTime = null;

            function animation(currentTime) {
                if (!startTime) startTime = currentTime;
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
                container.scrollTop = startY + distance * easeInOutQuad(progress);

                if (progress < 1) {
                    requestAnimationFrame(animation);
                }
            }

            function easeInOutQuad(t) {
                return t < 0.5 ? 2 * t * t : -1 + (4 - 2 * t) * t;
            }

            requestAnimationFrame(animation);
        }

        function ScrollTo(number) {
            const targetElement = document.getElementById(number);
            const container = document.getElementById("surah-container");
            if (targetElement && container) {
                const targetY = targetElement.offsetTop - container.offsetTop;
                smoothScrollToY(container, targetY, 1000);
                highlightButton(number);
            } else {
                console.error("Element not found: #" + number);
            }
        }

        function scrollActiveButtonIntoView(buttonId) {
            const sidebar = document.getElementById('sidebar');
            const drawerSidebar = document.getElementById('drawer-sidebar');
            const activeButton = document.getElementById('btn-' + buttonId);
            const drawerButton = document.getElementById('btn-drawer-' + buttonId);

            const button = activeButton || drawerButton;
            if (button && sidebar) {
                const buttonTop = button.offsetTop;
                const buttonHeight = button.offsetHeight;
                const sidebarHeight = sidebar.clientHeight;

                const targetScroll = buttonTop - (sidebarHeight / 2) + (buttonHeight / 2);

                // Smooth scroll the sidebar
                if (activeButton) {
                    smoothScrollToY(sidebar, targetScroll, 500);
                } else if (drawerButton) {
                    smoothScrollToY(drawerSidebar, targetScroll, 500);
                }
            }
        }

        function highlightButton(number) {
            const buttons = document.querySelectorAll('#sidebar button, #drawer-sidebar button');
            buttons.forEach(btn => {
                btn.classList.remove('bg-tertiary', 'text-primary');
            });
            const activeButton = document.getElementById('btn-' + number);
            const drawerButton = document.getElementById('btn-drawer-' + number);
            const active = activeButton || drawerButton;

            if (active) {
                active.classList.add('bg-tertiary', 'text-primary');
                scrollActiveButtonIntoView(number);
            }
        }

        const container = document.getElementById('surah-container');
        container.addEventListener('scroll', debounce(() => {
            const sections = document.querySelectorAll('#surah-container section');
            let foundActive = false;

            sections.forEach(section => {
                const rect = section.getBoundingClientRect();
                if (rect.top >= 0 && rect.top < container.clientHeight / 2 && !foundActive) {
                    highlightButton(section.id);
                    foundActive = true;
                }
            });
        }, 100));

        // Debounce function to limit the frequency of scroll event handling
        function debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        }
    </script>

    <style>
        .active {
            background-color: #4a90e2;
            color: white;
        }

        #sidebar, #drawer-sidebar {
            scroll-behavior: smooth;
        }
    </style>
</x-layouts.app>
