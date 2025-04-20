<script src="//unpkg.com/alpinejs" defer></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<header class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-bold text-gray-800">{{ $slot }}</h1>
    <div class="flex items-center space-x-4">

        <!-- Bagian Profile Dropdown -->
        <div class="relative" x-data="{ open: false }">
            <!-- Tombol Profile -->
            <button @click="open = !open"
                class="flex items-center px-4 py-2 bg-white rounded-lg shadow font-poppins space-x-3">
                <img src="{{ asset('putin.jpeg') }}" alt="Profile Picture" class="w-10 h-10 rounded-full">
                <div class="ml-3 text-left">
                    <p class="font-bold">{{ Auth::user()->name }}</p>
                    <p class="font-semibold">{{ Auth::user()->role->role_name }}</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="w-5 h-5 ml-2 text-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <!-- Menu Dropdown -->
            <div x-show="open" @click.away="open = false" x-transition
                class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50">
                <!-- Link Profile -->
                <a href="/profile" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                    Profile
                </a>
                <!-- Tombol Log Out -->
                <button @click="logout" class="w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100">
                    Log Out
                </button>
            </div>
        </div>
    </div>
</header>

<script>
    function logout() {
        axios.post('logout', {}, {
                headers: {
                    Authorization: `Bearer ${localStorage.getItem('token')}`
                }
            })
            .then(response => {
                console.log('Logout sukses:', response.data);

                // Hapus LocalStorage dan SessionStorage
                localStorage.clear();
                sessionStorage.clear();

                // Hapus cookies Laravel secara manual
                document.cookie = "laravel_session=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";

                window.location.href = '/login';
            })
            .catch(error => {
                console.error('Logout gagal:', error.response);
                localStorage.clear();
                sessionStorage.clear();
                window.location.href = '/login';
            });
    }
</script>
