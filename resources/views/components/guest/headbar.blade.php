<nav class="bg-white shadow-md sticky top-0 z-50">
    <style>
        .group:hover .group-hover\:visible {
            visibility: visible;
        }

        .group:hover .group-hover\:opacity-100 {
            opacity: 1;
        }
    </style>
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <div>
            <a href="/" class="flex items-center space-x-3">
                <img src="{{ asset('images/logo.webp') }}" alt="Logo GKJ" class="h-10">
                <span class="font-semibold text-lg">GKJ Condongcatur</span>
            </a>
        </div>
        <!-- Menu Desktop -->
        <ul class="hidden md:flex space-x-6 font-medium text-gray-700 relative">
            <li><a href="/" class="hover:text-blue-600">Beranda</a></li>
            <li class="relative group">
                <a href="#"
                    class="inline-flex items-center gap-1 hover:text-blue-600 transition-colors duration-200">
                    Profil Gereja
                    <svg class="w-4 h-4 transform transition-transform duration-200 group-hover:rotate-180"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </a>
                <ul
                    class="absolute left-0 mt-2 w-40 bg-white border border-gray-200 rounded-xl shadow-xl opacity-0 group-hover:opacity-100 invisible group-hover:visible translate-y-1 group-hover:translate-y-0 transition-all duration-300 ease-out z-50 overflow-hidden">
                    <li>
                        <a href="/visi-misi"
                            class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-gray-100">
                            <span>Visi Misi</span>
                        </a>
                    </li>
                    <li>
                        <a href="/sejarah"
                            class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-gray-100">
                            <span>Sejarah</span>
                        </a>
                    </li>
                    <li>
                        <a href="/struktur-organisasi"
                            class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-gray-100">
                            <span>Struktur Organisasi</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="relative group">
                <a href="#"
                    class="inline-flex items-center gap-1 hover:text-blue-600 transition-colors duration-200">
                    Informasi
                    <svg class="w-4 h-4 transform transition-transform duration-200 group-hover:rotate-180"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </a>
                <ul
                    class="absolute left-0 mt-2 w-40 bg-white border border-gray-200 rounded-xl shadow-xl opacity-0 group-hover:opacity-100 invisible group-hover:visible translate-y-1 group-hover:translate-y-0 transition-all duration-300 ease-out z-50 overflow-hidden">
                    <li>
                        <a href="/announcement"
                            class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-gray-100">
                            <span>Pengumuman</span>
                        </a>
                    </li>
                    <li>
                        <a href="/news"
                            class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-gray-100">
                            <span>Berita</span>
                        </a>
                    </li>
                    <li>
                        <a href="/vacancy"
                            class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-gray-100">
                            <span>Info Lowongan</span>
                        </a>
                    </li>
                    <li>
                        <a href="/beasiswa"
                            class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-gray-100">
                            <span>Beasiswa</span>
                        </a>
                    </li>
                    <li>
                        <a href="/wartafile"
                            class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-gray-100">
                            <span>Warta</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="relative group">
                <a href="#"
                    class="inline-flex items-center gap-1 hover:text-blue-600 transition-colors duration-200">
                    Bidang
                    <svg class="w-4 h-4 transform transition-transform duration-200 group-hover:rotate-180"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </a>
                <ul
                    class="absolute left-0 mt-2 w-40 bg-white border border-gray-200 rounded-xl shadow-xl opacity-0 group-hover:opacity-100 invisible group-hover:visible translate-y-1 group-hover:translate-y-0 transition-all duration-300 ease-out z-50 overflow-hidden">
                    <li>
                        <a href="/komisi"
                            class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-gray-100">
                            <span>Komisi</span>
                        </a>
                    </li>
                    <li>
                        <a href="/paduan-suara"
                            class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-gray-100">
                            <span>Paduan Suara</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li><a href="#" class="hover:text-blue-600">Homecare</a></li>
            <li><a href="/formsakramen" class="hover:text-blue-600">Pelayanan Gerejawi</a></li>
        </ul>

        <div class="md:hidden">
            <button id="menu-icon" class="text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Sidebar Mobile -->
    <div id="sidebar"
        class="md:hidden fixed right-0 top-0 bg-white w-64 h-full shadow-lg transform translate-x-full z-50 transition-transform duration-300">
        <div class="flex justify-end p-4">
            <button id="close-sidebar" class="text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
        <ul class="flex flex-col space-y-4 font-medium text-gray-700 px-4">
            <li>
                <button class="w-full text-left flex justify-between items-center dropdown-toggle hover:text-blue-600">
                    Profil Gereja
                    <svg class="w-4 h-4 ml-2 transition-transform duration-200" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <ul class="dropdown-menu hidden pl-4 mt-2 space-y-2 text-sm">
                    <li><a href="#" class="block hover:text-blue-600">Visi Misi</a></li>
                    <li><a href="#" class="block hover:text-blue-600">Sejarah</a></li>
                    <li><a href="#" class="block hover:text-blue-600">Struktur Organisasi</a></li>
                </ul>
            </li>
            <li>
                <button class="w-full text-left flex justify-between items-center dropdown-toggle hover:text-blue-600">
                    Informasi
                    <svg class="w-4 h-4 ml-2 transition-transform duration-200" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <ul class="dropdown-menu hidden pl-4 mt-2 space-y-2 text-sm">
                    <li><a href="#" class="block hover:text-blue-600">Pengumuman</a></li>
                    <li><a href="#" class="block hover:text-blue-600">Berita</a></li>
                    <li><a href="#" class="block hover:text-blue-600">Warta</a></li>
                    <li><a href="#" class="block hover:text-blue-600">Info Lowongan</a></li>
                    <li><a href="#" class="block hover:text-blue-600">Beasiswa</a></li>
                </ul>
            </li>
            <li>
                <button class="w-full text-left flex justify-between items-center dropdown-toggle hover:text-blue-600">
                    Bidang
                    <svg class="w-4 h-4 ml-2 transition-transform duration-200" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <ul class="dropdown-menu hidden pl-4 mt-2 space-y-2 text-sm">
                    <li><a href="#" class="block hover:text-blue-600">Komisi</a></li>
                    <li><a href="#" class="block hover:text-blue-600">Paduan Suara</a></li>
                </ul>
            </li>
            <li><a href="#" class="hover:text-blue-600">Homecare</a></li>
            <li><a href="#" class="hover:text-blue-600">Pelayanan Sakramental</a></li>
        </ul>
    </div>
</nav>

<script>
    const menuIcon = document.getElementById("menu-icon");
    const sidebar = document.getElementById("sidebar");
    const closeSidebar = document.getElementById("close-sidebar");

    menuIcon.addEventListener("click", () => {
        sidebar.classList.remove("translate-x-full");
    });

    closeSidebar.addEventListener("click", () => {
        sidebar.classList.add("translate-x-full");
    });

    document.addEventListener("click", (event) => {
        const sidebarArea = sidebar.contains(event.target);
        const menuIconArea = menuIcon.contains(event.target);

        if (!sidebarArea && !menuIconArea) {
            sidebar.classList.add("translate-x-full");
        }
    });

    document.querySelectorAll('.dropdown-toggle').forEach(button => {
        button.addEventListener('click', (e) => {
            e.stopPropagation(); // Mencegah klik dari menutup sidebar
            const dropdown = button.nextElementSibling;
            const icon = button.querySelector('svg');

            dropdown.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        });
    });
</script>
