                        @extends('layouts.admin')

@section('title', 'Tambah Shift')

@section('content')
<div class="content-container">
    <div class="mx-auto">
        <!-- Enhanced header to match users module styling -->
        <div class="mb-8">
            <div class="flex items-center gap-4 mb-3">
                <div class="p-3 bg-sky-100 rounded-xl">
                    <svg class="w-7 h-7 text-sky-600 dark:text-sky-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 tracking-tight">Tambah Shift Baru</h1>
                    <p class="text-gray-600 dark:text-gray-400 mt-1">Buat shift kerja baru untuk sistem penjadwalan</p>
                </div>
            </div>
        </div>

        <!-- Enhanced form card to match users module styling -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden">
            <div class="bg-gradient-to-r from-sky-500 to-sky-600 dark:from-sky-600 dark:to-sky-700 px-8 py-6">
                <h2 class="text-xl font-semibold text-white">Informasi Shift</h2>
                <p class="text-sky-100 dark:text-sky-200 mt-1">Lengkapi semua field yang diperlukan</p>
            </div>

            <div class="p-8">
                <form action="{{ route('admin.shifts.store') }}" method="POST" class="space-y-8" id="shiftForm">
                    @csrf

                    <!-- Enhanced form fields with consistent styling -->
                    <div class="space-y-3">
                        <label for="shift_name" class="block text-sm font-bold text-gray-800 dark:text-gray-200">
                            Nama Shift
                            <span class="text-red-500 ml-1">*</span>
                        </label>
                        <div class="relative group">
                            <input
                                type="text"
                                name="shift_name"
                                id="shift_name"
                                class="block w-full px-4 py-4 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:ring-4 focus:ring-sky-100 dark:focus:ring-sky-900 focus:border-sky-500 dark:focus:border-sky-400 transition-all duration-200 bg-gray-50 dark:bg-gray-700 focus:bg-white dark:focus:bg-gray-600 text-gray-900 dark:text-gray-100"
                                placeholder="Contoh: Shift A, Shift Security, Shift Cleaning"
                                required
                            >
                        </div>
                    </div>

                    <div class="space-y-3">
                        <label for="category" class="block text-sm font-bold text-gray-800 dark:text-gray-200">
                            Kategori Waktu
                            <span class="text-red-500 ml-1">*</span>
                        </label>
                        <div class="relative group">
                            <select
                                name="category"
                                id="category"
                                class="block w-full px-4 py-4 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:ring-4 focus:ring-sky-100 dark:focus:ring-sky-900 focus:border-sky-500 dark:focus:border-sky-400 transition-all duration-200 bg-gray-50 dark:bg-gray-700 focus:bg-white dark:focus:bg-gray-600 text-gray-900 dark:text-gray-100 appearance-none cursor-pointer"
                                required
                            >
                                <option value="" disabled selected>Pilih kategori waktu</option>
                                <option value="Pagi">Pagi</option>
                                <option value="Siang">Siang</option>
                                <option value="Malam">Malam</option>
                            </select>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <label for="start_time" class="block text-sm font-bold text-gray-800 dark:text-gray-200">
                            Jam Mulai
                            <span class="text-red-500 ml-1">*</span>
                        </label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 group-focus-within:text-sky-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <input
                                type="time"
                                name="start_time"
                                id="start_time"
                                class="block w-full pl-12 pr-4 py-4 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:ring-4 focus:ring-sky-100 dark:focus:ring-sky-900 focus:border-sky-500 dark:focus:border-sky-400 transition-all duration-200 bg-gray-50 dark:bg-gray-700 focus:bg-white dark:focus:bg-gray-600 text-gray-900 dark:text-gray-100"
                                required
                            >
                        </div>
                    </div>

                    <div class="space-y-3">
                        <label for="end_time" class="block text-sm font-bold text-gray-800 dark:text-gray-200">
                            Jam Selesai
                            <span class="text-red-500 ml-1">*</span>
                        </label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 group-focus-within:text-sky-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <input
                                type="time"
                                name="end_time"
                                id="end_time"
                                class="block w-full pl-12 pr-4 py-4 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:ring-4 focus:ring-sky-100 dark:focus:ring-sky-900 focus:border-sky-500 dark:focus:border-sky-400 transition-all duration-200 bg-gray-50 dark:bg-gray-700 focus:bg-white dark:focus:bg-gray-600 text-gray-900 dark:text-gray-100"
                                required
                            >
                        </div>
                    </div>

                    <!-- Enhanced action buttons to match users module -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-8 border-t border-gray-200 dark:border-gray-700">
                        <button
                            type="submit"
                            class="flex-1 bg-gradient-to-r from-sky-500 to-sky-600 hover:from-sky-600 hover:to-sky-700 text-white font-bold py-4 px-8 rounded-xl transition-all duration-200 transform hover:scale-[1.02] focus:outline-none focus:ring-4 focus:ring-sky-200 shadow-lg hover:shadow-xl disabled:opacity-50 disabled:cursor-not-allowed"
                            id="submitBtn"
                        >
                            <span class="flex items-center justify-center gap-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <span id="submitText">Tambah Shift</span>
                                <svg class="w-5 h-5 animate-spin hidden" id="submitSpinner" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </span>
                        </button>
                        <a
                            href="{{ route('admin.shifts.index') }}"
                            class="flex-1 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 font-bold py-4 px-8 rounded-xl transition-all duration-200 text-center focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-600 border-2 border-gray-200 dark:border-gray-600 hover:border-gray-300 dark:hover:border-gray-500"
                        >
                            <span class="flex items-center justify-center gap-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                                Kembali
                            </span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('shiftForm').addEventListener('submit', function() {
    const submitBtn = document.getElementById('submitBtn');
    const submitText = document.getElementById('submitText');
    const submitSpinner = document.getElementById('submitSpinner');

    submitBtn.disabled = true;
    submitText.textContent = 'Menyimpan...';
    submitSpinner.classList.remove('hidden');
});
</script>
@endsection
