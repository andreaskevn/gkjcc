<aside
    class="h-screen fixed top-0 left-0 w-64 bg-gradient-to-b from-gray-800 to-gray-900 text-white flex flex-col shadow-xl">
    <!-- Logo Section -->
    <div class="p-5 border-b border-gray-700">
        <a href="/" class="flex justify-center">
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
        </a>
    </div>

    <!-- Navigation Section -->
    <nav class="flex-1 overflow-y-auto py-4 px-3">
        <div class="space-y-2">
            <!-- Dashboard Link -->
            <a href="{{ route('dashboard') }}"
                class="flex items-center px-4 py-2.5 {{ request()->routeIs('dashboard') ? 'bg-indigo-600 text-white' : 'text-gray-300 hover:bg-gray-700' }} rounded-lg transition-all duration-200 group">
                <svg class="h-5 w-5 {{ request()->routeIs('dashboard') ? 'text-white' : 'text-gray-400 group-hover:text-white' }} mr-3"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                </svg>
                <span class="font-medium">Dashboard</span>
            </a>
            <a href="{{ route('jadwalsepekan') }}"
                class="flex items-center px-4 py-2.5 {{ request()->routeIs('jadwalsepekan') ? 'bg-indigo-600 text-white' : 'text-gray-300 hover:bg-gray-700' }} rounded-lg transition-all duration-200 group">
                <svg class="h-5 w-5 {{ request()->routeIs('jadwalsepekan') ? 'text-white' : 'text-gray-400 group-hover:text-white' }} mr-3"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                </svg>
                <span class="font-medium">Jadwal Sepekan</span>
            </a>
            <a href="{{ route('pengguna') }}"
                class="flex items-center px-4 py-2.5 {{ request()->routeIs('pengguna') ? 'bg-indigo-600 text-white' : 'text-gray-300 hover:bg-gray-700' }} rounded-lg transition-all duration-200 group">
                <svg class="h-5 w-5 {{ request()->routeIs('pengguna') ? 'text-white' : 'text-gray-400 group-hover:text-white' }} mr-3"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                </svg>
                <span class="font-medium">Pengguna</span>
            </a>
            <div>
                <div class="flex items-center px-4 py-2 text-gray-400 uppercase text-xs font-semibold tracking-wider">
                    Informasi
                </div>
                <a href="{{ route('pengumuman') }}"
                    class="ml-4 flex items-center px-0 py-2.5 {{ request()->routeIs('pengumuman') ? 'bg-indigo-600 text-white' : 'text-gray-300 hover:bg-gray-700' }} rounded-lg transition-all duration-200 group">
                    <svg class="h-5 w-5 {{ request()->routeIs('pengumuman') ? 'text-white' : 'text-gray-400 group-hover:text-white' }} mr-3"
                        ...></svg>
                    <span class="font-medium">Pengumuman</span>
                </a>
                <a href="{{ route('berita') }}"
                    class="ml-4 flex items-center px-0 py-2.5 {{ request()->routeIs('berita') ? 'bg-indigo-600 text-white' : 'text-gray-300 hover:bg-gray-700' }} rounded-lg transition-all duration-200 group">
                    <svg class="h-5 w-5 {{ request()->routeIs('berita') ? 'text-white' : 'text-gray-400 group-hover:text-white' }} mr-3"
                        ...></svg>
                    <span class="font-medium">Berita</span>
                </a>
                <a href="{{ route('info-lowongan') }}"
                    class="ml-4 flex items-center px-0 py-2.5 {{ request()->routeIs('info-lowongan') ? 'bg-indigo-600 text-white' : 'text-gray-300 hover:bg-gray-700' }} rounded-lg transition-all duration-200 group">
                    <svg class="h-5 w-5 {{ request()->routeIs('info-lowongan') ? 'text-white' : 'text-gray-400 group-hover:text-white' }} mr-3"
                        ...></svg>
                    <span class="font-medium">Info Lowongan</span>
                </a>
                <a href="{{ route('scholarship') }}"
                    class="ml-4 flex items-center px-0 py-2.5 {{ request()->routeIs('scholarship') ? 'bg-indigo-600 text-white' : 'text-gray-300 hover:bg-gray-700' }} rounded-lg transition-all duration-200 group">
                    <svg class="h-5 w-5 {{ request()->routeIs('scholarship') ? 'text-white' : 'text-gray-400 group-hover:text-white' }} mr-3"
                        ...></svg>
                    <span class="font-medium">Info Beasiswa</span>
                </a>
                <a href="{{ route('warta') }}"
                    class="ml-4 flex items-center px-0 py-2.5 {{ request()->routeIs('warta') ? 'bg-indigo-600 text-white' : 'text-gray-300 hover:bg-gray-700' }} rounded-lg transition-all duration-200 group">
                    <svg class="h-5 w-5 {{ request()->routeIs('warta') ? 'text-white' : 'text-gray-400 group-hover:text-white' }} mr-3"
                        ...></svg>
                    <span class="font-medium">Warta</span>
                </a>
            </div>
            <div>
                <div class="flex items-center px-4 py-2 text-gray-400 uppercase text-xs font-semibold tracking-wider">
                    Bidang
                </div>
                <a href="{{ route('commission') }}"
                    class="ml-4 flex items-center px-0 py-2.5 {{ request()->routeIs('commission') ? 'bg-indigo-600 text-white' : 'text-gray-300 hover:bg-gray-700' }} rounded-lg transition-all duration-200 group">
                    <svg class="h-5 w-5 {{ request()->routeIs('commission') ? 'text-white' : 'text-gray-400 group-hover:text-white' }} mr-3"
                        ...></svg>
                    <span class="font-medium">Komisi</span>
                </a>
                <a href="{{ route('choir') }}"
                    class="ml-4 flex items-center px-0 py-2.5 {{ request()->routeIs('choir') ? 'bg-indigo-600 text-white' : 'text-gray-300 hover:bg-gray-700' }} rounded-lg transition-all duration-200 group">
                    <svg class="h-5 w-5 {{ request()->routeIs('choir') ? 'text-white' : 'text-gray-400 group-hover:text-white' }} mr-3"
                        ...></svg>
                    <span class="font-medium">Paduan Suara</span>
                </a>
            </div>
            <div>
                <div class="flex items-center px-4 py-2 text-gray-400 uppercase text-xs font-semibold tracking-wider">
                    Peribadahan
                </div>
                <a href="{{ route('kategori-jadwalibadah') }}"
                    class="ml-4 flex items-center px-0 py-2.5 {{ request()->routeIs('kategori-jadwalibadah') ? 'bg-indigo-600 text-white' : 'text-gray-300 hover:bg-gray-700' }} rounded-lg transition-all duration-200 group">
                    <svg class="h-5 w-5 {{ request()->routeIs('kategori-jadwalibadah') ? 'text-white' : 'text-gray-400 group-hover:text-white' }} mr-3"
                        ...></svg>
                    <span class="font-medium">Kategori Ibadah</span>
                </a>
                <a href="{{ route('jadwalibadah') }}"
                    class="ml-4 flex items-center px-0 py-2.5 {{ request()->routeIs('jadwalibadah') ? 'bg-indigo-600 text-white' : 'text-gray-300 hover:bg-gray-700' }} rounded-lg transition-all duration-200 group">
                    <svg class="h-5 w-5 {{ request()->routeIs('jadwalibadah') ? 'text-white' : 'text-gray-400 group-hover:text-white' }} mr-3"
                        ...></svg>
                    <span class="font-medium">Jadwal Ibadah</span>
                </a>
            </div>
            <div>
                <div class="flex items-center px-4 py-2 text-gray-400 uppercase text-xs font-semibold tracking-wider">
                    Pelayanan Sakramental
                </div>
                <a href="{{ route('kategori-form') }}"
                    class="ml-4 flex items-center px-0 py-2.5 {{ request()->routeIs('kategori-form') ? 'bg-indigo-600 text-white' : 'text-gray-300 hover:bg-gray-700' }} rounded-lg transition-all duration-200 group">
                    <svg class="h-5 w-5 {{ request()->routeIs('kategori-form') ? 'text-white' : 'text-gray-400 group-hover:text-white' }} mr-3"
                        ...></svg>
                    <span class="font-medium">Kategori Formulir</span>
                </a>
                <a href="{{ route('form') }}"
                    class="ml-4 flex items-center px-0 py-2.5 {{ request()->routeIs('form') ? 'bg-indigo-600 text-white' : 'text-gray-300 hover:bg-gray-700' }} rounded-lg transition-all duration-200 group">
                    <svg class="h-5 w-5 {{ request()->routeIs('form') ? 'text-white' : 'text-gray-400 group-hover:text-white' }} mr-3"
                        ...></svg>
                    <span class="font-medium">Formulir</span>
                </a>
            </div>
        </div>
    </nav>
</aside>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle dropdown toggle
        const dropdownButtons = document.querySelectorAll('[data-dropdown]');

        // Function to open a specific dropdown
        function openDropdown(targetId) {
            const submenu = document.getElementById(targetId);
            const button = document.querySelector(`[data-dropdown="${targetId}"]`);
            const icon = button.querySelector('.dropdown-icon');

            // Set max height to auto to ensure it contains all content
            submenu.style.maxHeight = submenu.scrollHeight + 'px';
            submenu.classList.add('open');

            // Store open state in localStorage
            localStorage.setItem(`dropdown_${targetId}`, 'open');

            // Rotate icon
            icon.classList.add('rotate-180');
        }

        // Function to close a specific dropdown
        function closeDropdown(targetId) {
            const submenu = document.getElementById(targetId);
            const button = document.querySelector(`[data-dropdown="${targetId}"]`);
            const icon = button.querySelector('.dropdown-icon');

            submenu.style.maxHeight = '0px';
            submenu.classList.remove('open');

            // Remove from localStorage
            localStorage.removeItem(`dropdown_${targetId}`);

            // Reset icon rotation
            icon.classList.remove('rotate-180');
        }

        // Set up click handlers for dropdowns
        dropdownButtons.forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-dropdown');
                const submenu = document.getElementById(targetId);

                // Check if menu is currently open
                const isOpen = submenu.classList.contains('open');

                // Toggle the clicked dropdown
                if (isOpen) {
                    closeDropdown(targetId);
                } else {
                    openDropdown(targetId);
                }
            });
        });

        // On page load, check for active menu items and stored dropdown states
        function initializeDropdowns() {
            // First check for active items in submenus
            const activeSubmenuItem = document.querySelector('.submenu a.bg-indigo-600');

            if (activeSubmenuItem) {
                const parentSubmenu = activeSubmenuItem.closest('.submenu');
                if (parentSubmenu) {
                    const parentDropdown = parentSubmenu.closest('.dropdown-menu');
                    if (parentDropdown) {
                        const targetId = parentDropdown.querySelector('[data-dropdown]').getAttribute(
                            'data-dropdown');
                        openDropdown(targetId);
                    }
                }
            }

            // Then check localStorage for any saved dropdown states
            dropdownButtons.forEach(button => {
                const targetId = button.getAttribute('data-dropdown');
                const savedState = localStorage.getItem(`dropdown_${targetId}`);

                if (savedState === 'open') {
                    openDropdown(targetId);
                }
            });
        }

        // Initialize dropdowns when page loads
        initializeDropdowns();
    });
</script>

<style>
    .submenu {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease-in-out;
    }

    .rotate-180 {
        transform: rotate(180deg);
    }
</style>
