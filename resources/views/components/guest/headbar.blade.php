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
        <div class="flex items-center space-x-3">
            <img src="{{ asset('img/logo.jpeg') }}" alt="Logo GKJ" class="h-10">
            <span class="font-semibold text-lg">GKJ Condongcatur</span>
        </div>
        <!-- Menu Desktop -->
        <ul class="hidden md:flex space-x-6 font-medium text-gray-700 relative">
            <li><a href="/" class="hover:text-blue-600">Beranda</a></li>
            <li class="relative group">
                <a href="#" class="hover:text-blue-600 inline-block">Profil Gereja</a>
                <ul
                    class="absolute left-0 mt-2 w-48 bg-white border border-gray-200 rounded-2xl shadow-lg opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-200 ease-in-out z-10">
                    <li>
                        <a href="#"
                            class="block px-4 py-2 rounded hover:text-gray-100 hover:bg-blue-800 transition-colors duration-200">
                            Visi Misi
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 rounded hover:text-gray-100 hover:bg-blue-800 transition-colors duration-200">
                            Sejarah
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 rounded hover:text-gray-100 hover:bg-blue-800 transition-colors duration-200">
                            Struktur Organisasi
                        </a>
                    </li>
                </ul>
            </li>
            <li class="relative group">
                <a href="#" class="hover:text-blue-600 inline-block">Informasi</a>
                <ul
                    class="absolute left-0 mt-2 w-48 bg-white border border-gray-200 rounded-2xl shadow-lg opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-200 ease-in-out z-10">
                    <li>
                        <a href="/announcement"
                            class="block px-4 py-2 rounded hover:text-gray-100 hover:bg-blue-800 transition-colors duration-200">
                            Pengumuman
                        </a>
                    </li>
                    <li>
                        <a href="/news"
                            class="block px-4 py-2 rounded hover:text-gray-100 hover:bg-blue-800 transition-colors duration-200">
                            Berita
                        </a>
                    </li>
                    <li>
                        <a href="/wartafile"
                            class="block px-4 py-2 rounded hover:text-gray-100 hover:bg-blue-800 transition-colors duration-200">
                            Warta
                        </a>
                    </li>
                    <li>
                        <a href="/vacancy"
                            class="block px-4 py-2 rounded hover:text-gray-100 hover:bg-blue-800 transition-colors duration-200">
                            Info Lowoongan
                        </a>
                    </li>
                    <li>
                        <a href="/beasiswa"
                            class="block px-4 py-2 rounded hover:text-gray-100 hover:bg-blue-800 transition-colors duration-200">
                            Beasiswa
                        </a>
                    </li>
                </ul>
            </li>
            <li class="relative group">
                <a href="#" class="hover:text-blue-600 inline-block">Bidang</a>
                <ul
                    class="absolute left-0 mt-2 w-48 bg-white border border-gray-200 rounded-2xl shadow-lg opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-200 ease-in-out z-10">
                    <li>
                        <a href="/komisi"
                            class="block px-4 py-2 rounded hover:text-gray-100 hover:bg-blue-800 transition-colors duration-200">
                            Komisi
                        </a>
                    </li>
                    <li>
                        <a href="/paduan-suara"
                            class="block px-4 py-2 rounded hover:text-gray-100 hover:bg-blue-800 transition-colors duration-200">
                            Paduan Suara
                        </a>
                    </li>
                </ul>
            </li>
            <li><a href="#" class="hover:text-blue-600">Homecare</a></li>
            <li><a href="/formsakramen" class="hover:text-blue-600">Pelayanan Sakramental</a></li>
        </ul>

        </ul>
        <!-- Icon menu mobile -->
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
