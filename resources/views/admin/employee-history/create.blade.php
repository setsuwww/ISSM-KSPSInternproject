@extends('layouts.admin')

@section('content')
  <x-form>

    <x-form-header header="Create Employee History" paragraph="Create Employee's history effective " />
    <form method="POST" action="{{ isset($employeeHistory)
    ? route('admin.employee-history.update', $employeeHistory)
    : route('admin.employee-history.store') }}">

      @csrf
      @isset($employeeHistory) @method('PUT') @endisset

      <div x-data="{
            jabatans: @js($jabatans),
            selectedJabatan: '{{ old('jabatan_id', $employeeHistory->jabatan_id ?? '') }}',
            selectedFungsi: '{{ old('fungsi_id', $employeeHistory->fungsi_id ?? '') }}',

            get fungsis() {
              const jabatan = this.jabatans.find(j => j.id == this.selectedJabatan)
              return jabatan ? jabatan.fungsis : []
            }
          }" class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">
            Employee
          </label>
          <select name="employee_id"
            class="w-full rounded-lg p-2 border border-gray-300 focus:border-sky-800 focus:ring-sky-300" required>
            <option value="">Pilih employee</option>
            @foreach ($employees as $employee)
              <option value="{{ $employee->id }}" @selected(old('employee_id', $employeeHistory->employee_id ?? '') == $employee->id)>
                {{ $employee->nik }} — {{ $employee->nama }}
              </option>
            @endforeach
            @error('employee_id')
              <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
          </select>
        </div>

        {{-- Role --}}
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">
            Role
          </label>
          <select name="role_id"
            class="w-full rounded-lg p-2 border border-gray-300 focus:border-sky-800 focus:ring-sky-300">
            <option value="">Pilih role</option>
            @foreach ($roles as $role)
              <option value="{{ $role->id }}" @selected(old('role_id', $employeeHistory->role_id ?? '') == $role->id)>
                {{ $role->role }}
              </option>
            @endforeach
          </select>
        </div>

        {{-- Location --}}
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">
            Lokasi
          </label>
          <select name="location_id"
            class="w-full rounded-lg p-2 border border-gray-300 focus:border-sky-800 focus:ring-sky-300">
            <option value="">Pilih lokasi</option>
            @foreach ($locations as $location)
              <option value="{{ $location->id }}" @selected(old('location_id', $employeeHistory->location_id ?? '') == $location->id)>
                {{ $location->location }}
              </option>
            @endforeach
          </select>
        </div>

        {{-- Jabatan --}}
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">
            Jabatan
          </label>
          <select name="jabatan_id" x-model="selectedJabatan" @change="selectedFungsi = ''"
            class="w-full rounded-lg p-2 border border-gray-300 focus:border-black focus:ring-black">
            <option value="">Pilih jabatan</option>
            <template x-for="jabatan in jabatans" :key="jabatan.id">
              <option :value="jabatan.id" x-text="jabatan.jabatan"></option>
            </template>
          </select>
        </div>


        {{-- Fungsi --}}
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">
            Fungsi
          </label>
          <select name="fungsi_id" x-model="selectedFungsi" :disabled="!selectedJabatan"
            class="w-full rounded-lg p-2 border border-gray-300 focus:border-black focus:ring-black disabled:bg-gray-100">
            <option value="">Pilih fungsi</option>

            <template x-for="fungsi in fungsis" :key="fungsi.id">
              <option :value="fungsi.id" x-text="fungsi.fungsi"></option>
            </template>
          </select>

          <p x-show="selectedJabatan && fungsis.length === 0" class="text-xs text-gray-400 mt-1">
            Jabatan ini belum memiliki fungsi
          </p>
        </div>


      </div>

      {{-- TANGGAL --}}
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">
            Tanggal Mulai Efektif
          </label>
          <input type="date" name="tanggal_mulai_efektif"
            class="w-full rounded-lg p-2 border border-gray-300 focus:border-sky-800 focus:ring-sky-300"
            value="{{ old('tanggal_mulai_efektif', $employeeHistory->tanggal_mulai_efektif ?? '') }}">
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">
            Tanggal Akhir Efektif
          </label>
          <input type="date" name="tanggal_akhir_efektif"
            class="w-full rounded-lg p-2 border border-gray-300 focus:border-sky-800 focus:ring-sky-300"
            value="{{ old('tanggal_akhir_efektif', $employeeHistory->tanggal_akhir_efektif ?? '') }}">
        </div>
      </div>

      <div class="flex items-center gap-3 mb-10">
        <input type="hidden" name="current_flag" value="0">
        <input type="checkbox" name="current_flag" value="1" class="rounded border-gray-300 text-black focus:ring-black"
          @checked(old('current_flag', $employeeHistory->current_flag ?? true))>
        <span class="text-sm text-gray-700">Aktif</span>
      </div>


      {{-- ACTION --}}
      <div class="flex justify-end gap-3">
        <a href="{{ route('admin.employee-history.index') }}"
          class="px-4 py-2 rounded-lg border text-gray-700 hover:bg-gray-50">
          Batal
        </a>

        <button class="px-6 py-2 rounded-lg bg-black text-white hover:bg-gray-800">
          Simpan
        </button>
      </div>

    </form>
  </x-form>
@endsection