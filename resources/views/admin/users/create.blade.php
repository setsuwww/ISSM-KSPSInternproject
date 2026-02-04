@extends('layouts.admin')

@section('title', 'Buat Users')

@section('content')
    <div class="content-container">
        <div class="mx-auto">
            <div class="mb-8 flex items-center justify-between">
                <div class="flex items-center gap-4 mb-3">
                    <div class="p-3 bg-sky-100 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-user-plus-icon lucide-user-plus text-sky-700">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <line x1="19" x2="19" y1="8" y2="14" />
                            <line x1="22" x2="16" y1="11" y2="11" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-700 tracking-tight">Tambah User Baru</h1>
                        <p class="text-gray-500 mt-1">Buat akun pengguna baru dengan mengisi informasi di bawah ini</p>
                    </div>
                </div>
                <a href="{{ route('admin.users.index') }}"
                    class="bg-gray-50 hover:bg-gray-100 text-gray-600 font-bold py-3 px-8 rounded-xl text-center focus:outline-none focus:ring-4 focus:ring-gray-200 border border-gray-200 hover:border-gray-300">
                    Kembali
                </a>
            </div>

            <!-- Enhanced Form Card -->
            <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden">
                <div class="bg-gray-100 px-8 py-6 space-y-1">
                    <h2 class="text-xl font-semibold text-gray-600">Informasi User</h2>
                    <p class="text-gray-400">Lengkapi semua field yang diperlukan</p>
                </div>

                <div class="p-8">
                    <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-8" id="userForm">
                        @csrf

                        <!-- Enhanced NIK -->
                        <div class="space-y-3">
                            <label for="nik" class="block text-sm font-bold text-gray-800">
                                NIK
                                <span class="text-red-500 ml-1">*</span>
                            </label>
                            <input type="text" id="nik" name="nik" inputmode="numeric" pattern="[0-9]{8,12}" minlength="8"
                                maxlength="12"
                                class="block w-full p-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-sky-100 focus:border-sky-500 transition-all duration-200 bg-gray-50 focus:bg-white text-gray-900 placeholder-gray-500"
                                placeholder="Masukkan NIK (8 - 12) Digit" required autocomplete="off">
                        </div>

                        <!-- Enhanced Nama Field -->
                        <div class="space-y-3">
                            <label for="name" class="block text-sm font-bold text-gray-800">
                                Nama Lengkap
                                <span class="text-red-500 ml-1">*</span>
                            </label>
                            <input type="text" id="name" name="name"
                                class="block w-full p-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-sky-100 focus:border-sky-500 transition-all duration-200 bg-gray-50 focus:bg-white text-gray-900 placeholder-gray-500"
                                placeholder="Masukkan nama lengkap pengguna" required autocomplete="name">
                        </div>

                        <!-- Enhanced Email Field -->
                        <div class="space-y-3">
                            <label for="email" class="block text-sm font-bold text-gray-800">
                                Alamat Email
                                <span class="text-red-500 ml-1">*</span>
                            </label>
                            <input type="email" id="email" name="email"
                                class="block w-full p-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-sky-100 focus:border-sky-500 transition-all duration-200 bg-gray-50 focus:bg-white text-gray-900 placeholder-gray-500"
                                placeholder="user@example.com" required autocomplete="email">
                        </div>

                        <!-- Enhanced Password Field -->
                        <div class="space-y-3">
                            <label for="password" class="block text-sm font-bold text-gray-800">
                                Password
                                <span class="text-red-500 ml-1">*</span>
                            </label>
                            <input type="password" id="password" name="password"
                                class="block w-full p-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-sky-100 focus:border-sky-500 transition-all duration-200 bg-gray-50 focus:bg-white text-gray-900 placeholder-gray-500"
                                placeholder="Masukkan password yang aman" required minlength="8"
                                autocomplete="new-password">
                            <div class="bg-sky-50 border border-sky-200 rounded-lg p-3">
                                <p class="text-xs font-medium text-sky-800 mb-2">Persyaratan Password:</p>
                                <ul class="text-xs text-sky-700 space-y-1">
                                    <li class="flex items-center">
                                        <svg class="w-3 h-3 mr-2 text-sky-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        Minimal 8 karakter
                                    </li>
                                    <li class="flex items-center">
                                        <svg class="w-3 h-3 mr-2 text-sky-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        Kombinasi huruf dan angka direkomendasikan
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Enhanced Role Field -->
                        <div class="space-y-3">
                            <label for='akses_role' class="block text-sm font-bold text-gray-800">
                                Role Pengguna
                                <span class="text-red-500 ml-1">*</span>
                            </label>
                            <select id='akses_role' name='akses_role'
                                class="block w-full p-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-sky-100 focus:border-sky-500 transition-all duration-200 bg-gray-50 focus:bg-white text-gray-900 appearance-none cursor-pointer"
                                required>
                                <option value="" disabled selected>Pilih role pengguna</option>
                                <option value="admin">Admin - Akses penuh sistem</option>
                                <option value="operator">Operator - Kelola jadwal dan shift</option>
                                <option value="user">User - Akses terbatas</option>
                            </select>
                        </div>

                        <!-- Enhanced Action Buttons -->
                        <div class="flex items-center gap-4 pt-8 border-t border-gray-200">
                            <button type="submit"
                                class="bg-sky-600 hover:to-sky-700 text-white font-bold py-4 px-8 rounded-xl transition-all duration-200 transform hover:scale-[1.02] focus:outline-none focus:ring-4 focus:ring-sky-200 shadow-lg hover:shadow-xl disabled:opacity-50 disabled:cursor-not-allowed"
                                id="submitBtn">
                                <span class="flex items-center justify-center gap-3">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span id="submitText">Simpan User</span>
                                    <!-- Added loading spinner -->
                                    <svg class="w-5 h-5 animate-spin hidden" id="loadingSpinner" fill="none"
                                        viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                            stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('userForm').addEventListener('submit', function () {
            const submitBtn = document.getElementById('submitBtn');
            const submitText = document.getElementById('submitText');
            const loadingSpinner = document.getElementById('loadingSpinner');

            submitBtn.disabled = true;
            submitText.textContent = 'Menyimpan...';
            loadingSpinner.classList.remove('hidden');
        });
    </script>
@endsection
