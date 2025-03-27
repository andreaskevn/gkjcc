<div class="relative">
    <!-- Tombol Toggle Navbar (Hanya Muncul di Mobile) -->
    <button id="menu-toggle" class="md:hidden p-3 text-white bg-gray-900 rounded-md fixed top-4 left-4 z-50">
        ☰
    </button>

    <!-- Sidebar -->
    <aside id="sidebar"
        class="w-64 bg-gray-900 text-white flex flex-col p-5 space-y-6 fixed left-0 top-0 h-full transform -translate-x-full md:translate-x-0 md:relative transition-transform duration-300 z-40">
        <a href="/">
            <img src="logo.png" alt="Logo">
        </a>
        <nav class="flex flex-col space-y-3">
            <a href="dashboard" class="flex items-center px-4 py-2 hover:bg-gray-700 rounded-lg transition duration-200">
                <svg class="h-6 w-6 text-gray-300 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                </svg>
                Dashboard
            </a>
            <a href="menu" class="flex items-center px-4 py-2 hover:bg-gray-700 rounded-lg transition duration-200">
                <svg class="h-6 w-6 text-gray-300 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25Z" />
                </svg>
                Menu
            </a>
        </nav>
    </aside>
</div>

<!-- JavaScript untuk Toggle Navbar -->
<script>
    document.getElementById('menu-toggle').addEventListener('click', function () {
        let sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('-translate-x-full');
    });
</script>
