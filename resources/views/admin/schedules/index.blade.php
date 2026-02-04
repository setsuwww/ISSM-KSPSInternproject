@extends('layouts.admin')

@section('title', 'Ringkasan Jadwal Kerja')

@section('content')
    <div class="content-container">
        <div class="mx-auto space-y-8">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                <div class="flex items-center space-x-4">
                    <div
                        class="w-12 h-12 bg-sky-100 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-600 tracking-tight">Ringkasan Jadwal Kerja</h1>
                        <p class="text-gray-400 mt-1">Laporan total jam kerja per karyawan</p>
                    </div>
                </div>
                <a href="{{ route('admin.schedules.create') }}"
                    class="primary-button">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Tambah Jadwal
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-gradient-to-br from-sky-500 to-sky-600 rounded-2xl p-6 text-sky-50 shadow-xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sky-100 text-sm font-medium uppercase tracking-wide">Total Karyawan Terjadwal</p>
                            <p class="text-3xl font-bold mt-2">{{ $totalEmployeesWithSchedules }}</p>
                            <p class="text-sky-200 text-xs mt-1">Karyawan memiliki jadwal</p>
                        </div>
                        <div class="w-14 h-14 bg-sky-400 bg-opacity-30 rounded-xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-calendar-days-icon lucide-calendar-days">
                                <path d="M8 2v4" />
                                <path d="M16 2v4" />
                                <rect width="18" height="18" x="3" y="4" rx="2" />
                                <path d="M3 10h18" />
                                <path d="M8 14h.01" />
                                <path d="M12 14h.01" />
                                <path d="M16 14h.01" />
                                <path d="M8 18h.01" />
                                <path d="M12 18h.01" />
                                <path d="M16 18h.01" />
                            </svg>
                        </div>
                    </div>
                </div>

                <x-stats-card title="Jumlah Total Jadwal" :count="$schedules->count()" subtitle="Semua jadwal yang tercatat"
                    bgColor="bg-gradient-to-br from-purple-100 to-indigo-100"
                    icon='<svg class="w-7 h-7 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>'
                />

                <x-stats-card title="Jadwal Minggu Ini" :count="$thisWeekSchedules" :subtitle="now()->startOfWeek()->translatedFormat('d M') .
                    ' - ' . now()->endOfWeek()->translatedFormat('d M')"
                    bgColor="bg-gradient-to-br from-blue-100 to-sky-100"
                    icon='<svg class="w-7 h-7 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>'
                />

                <x-stats-card title="Jadwal Hari Ini" :count="$todaySchedules" :subtitle="today()->translatedFormat('d F Y')"
                    bgColor="bg-gradient-to-br from-green-100 to-emerald-100"
                    icon='<svg class="w-7 h-7 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>'
                />
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden">
                <div class="px-8 py-6 border-b border-gray-200 bg-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-xl font-bold text-gray-600">Rekap Total Jam & Shift</h2>
                            <p class="text-gray-400 mt-1">Laporan total jam kerja per karyawan</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <form method="GET" action="{{ route('admin.schedules.index') }}"
                                class="flex items-center space-x-3">
                                <div class="relative">
                                    <input type="text" name="search" value="{{ request('search') }}"
                                        placeholder="Cari karyawan..."
                                        class="pl-10 pr-4 py-2 bg-white border border-gray-200 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-sky-500 text-sm">
                                    <svg class="w-4 h-4 text-gray-400 absolute left-3 top-3" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                                @if (request('search') || request('shift_filter') || request('date_filter'))
                                    <a href="{{ route('admin.schedules.index') }}"
                                        class="px-3 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm hover:bg-gray-300 transition">
                                        Reset
                                    </a>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b-2 border-gray-200">
                            <tr>
                                <th class="px-8 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                        Nama Karyawan
                                </th>
                                <th class="px-8 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">

                                        Total Shift
                                </th>
                                <th class="px-8 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                        Total Jam Kerja
                                </th>
                                <th class="px-8 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($workHoursSummary as $summary)
                                <tr class="transition-colors duration-200 group">
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div
                                                class="w-10 h-10 bg-sky-800 rounded-full flex items-center justify-center mr-4 group-hover:from-sky-200 group-hover:to-sky-300 transition-colors">
                                                <span
                                                    class="text-white font-bold text-sm">{{ substr($summary['employee_name'], 0, 1) }}</span>
                                            </div>
                                            <div>
                                                <div class="text-base font-semibold text-gray-600">
                                                    {{ $summary['employee_name'] }}</div>
                                                <div class="text-sm text-gray-400">Karyawan</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium border border-gray-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-calendar mr-2 text-emerald-600">
                                                <path d="M8 2v4" />
                                                <path d="M16 2v4" />
                                                <rect width="18" height="18" x="3" y="4" rx="2" />
                                                <path d="M3 10h18" />
                                            </svg>
                                            {{ $summary['total_work_days'] }} shift
                                        </span>
                                    </td>
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium border border-gray-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-clock mr-2 text-sky-600">
                                                <circle cx="12" cy="12" r="10" />
                                                <polyline points="12 6 12 12 16 14" />
                                            </svg>
                                            {{ $summary['total_work_hours'] }}
                                        </span>
                                    </td>
                                    <td class="px-8 py-6 whitespace-nowrap text-left">
                                        <div class="flex items-center justify-start space-x-3">

                                            {{-- Tambahkan tombol history di sini --}}
                                            <a href="{{ route('admin.schedules.history', $summary['user_id']) }}"
                                            class="inline-flex items-center px-4 py-2 border border-gray-200 text-emerald-700 font-semibold text-sm rounded-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-history mr-2">
                                            <path d="M3 3v5h5" />
                                            <path d="M3.05 13A9 9 0 1 0 6 5.3L3 8" />
                                            <path d="M12 7v5l4 2" />
                                        </svg>
                                        History
                                    </a>
                                    <a href="{{ route('admin.schedules.user', $summary['user_id']) }}"
                                        class="inline-flex items-center px-4 py-2  border border-gray-200 text-sky-700 font-semibold text-sm rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-eye mr-2">
                                            <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7" />
                                            <circle cx="12" cy="12" r="3" />
                                        </svg>
                                        Lihat Jadwal
                                    </a>
                                        </div>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-8 py-16 text-center">
                                        <div class="flex flex-col items-center">
                                            <div
                                                class="w-20 h-20 bg-gradient-to-br from-sky-100 to-sky-200 rounded-full flex items-center justify-center mb-6">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-calendar text-sky-400">
                                                    <path d="M8 2v4" />
                                                    <path d="M16 2v4" />
                                                    <rect width="18" height="18" x="3" y="4" rx="2" />
                                                    <path d="M3 10h18" />
                                                </svg>
                                            </div>
                                            <h3 class="text-xl font-bold text-gray-900 mb-2">Belum ada jadwal yang tercatat
                                            </h3>
                                            <p class="text-gray-600 mb-6 max-w-sm">Mulai dengan membuat jadwal kerja untuk
                                                melihat ringkasan</p>
                                            <a href="{{ route('admin.schedules.create') }}"
                                                class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-sky-500 to-sky-600 hover:from-sky-600 hover:to-sky-700 text-white font-bold rounded-xl transition-all duration-200 transform hover:scale-105 shadow-lg">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                </svg>
                                                Tambah Jadwal Pertama
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
