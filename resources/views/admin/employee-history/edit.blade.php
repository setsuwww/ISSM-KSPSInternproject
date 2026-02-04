@extends('layouts.admin')

@section('content')
<div class="content-container">

  <h4 class="text-lg font-semibold mb-6">
    {{ isset($employeeHistory) ? 'Edit' : 'Tambah' }} Employee History
  </h4>

  <form method="POST"
    action="{{ isset($employeeHistory)
      ? route('admin.employee-history.update', $employeeHistory)
      : route('admin.employee-history.store') }}">

    @csrf
    @isset($employeeHistory) @method('PUT') @endisset

    {{-- EMPLOYEE --}}
    <div class="mb-4">
      <label class="form-label">Employee</label>
      <select name="employee_id" class="form-select">
        @foreach ($employees as $employee)
          <option value="{{ $employee->id }}"
            @selected(old('employee_id', $employeeHistory->employee_id ?? '') == $employee->id)>
            {{ $employee->nik }} - {{ $employee->nama }}
          </option>
        @endforeach
      </select>
    </div>

    {{-- ROLE --}}
    <div class="mb-4">
      <label class="form-label">Role</label>
      <select name="role_id" class="form-select">
        @foreach ($roles as $role)
          <option value="{{ $role->id }}"
            @selected(old('role_id', $employeeHistory->role_id ?? '') == $role->id)>
            {{ $role->role }}
          </option>
        @endforeach
      </select>
    </div>

    {{-- LOCATION --}}
    <div class="mb-4">
      <label class="form-label">Location</label>
      <select name="location_id" class="form-select">
        @foreach ($locations as $location)
          <option value="{{ $location->id }}"
            @selected(old('location_id', $employeeHistory->location_id ?? '') == $location->id)>
            {{ $location->location }}
          </option>
        @endforeach
      </select>
    </div>

    {{-- JABATAN --}}
    <div class="mb-4">
      <label class="form-label">Jabatan</label>
      <select name="jabatan_id" class="form-select">
        @foreach ($jabatans as $jabatan)
          <option value="{{ $jabatan->id }}"
            @selected(old('jabatan_id', $employeeHistory->jabatan_id ?? '') == $jabatan->id)>
            {{ $jabatan->jabatan }}
          </option>
        @endforeach
      </select>
    </div>

    {{-- FUNGSI --}}
    <div class="mb-4">
      <label class="form-label">Fungsi</label>
      <select name="fungsi_id" class="form-select">
        @foreach ($jabatans as $jabatan)
          @foreach ($jabatan->fungsis as $fungsi)
            <option value="{{ $fungsi->id }}"
              @selected(old('fungsi_id', $employeeHistory->fungsi_id ?? '') == $fungsi->id)>
              {{ $fungsi->fungsi }}
            </option>
          @endforeach
        @endforeach
      </select>
    </div>

    {{-- TANGGAL --}}
    <div class="grid grid-cols-2 gap-4 mb-4">
      <div>
        <label class="form-label">Tanggal Mulai</label>
        <input type="date" name="tanggal_mulai_efektif"
          class="form-control"
          value="{{ old('tanggal_mulai_efektif', $employeeHistory->tanggal_mulai_efektif ?? '') }}">
      </div>

      <div>
        <label class="form-label">Tanggal Akhir</label>
        <input type="date" name="tanggal_akhir_efektif"
          class="form-control"
          value="{{ old('tanggal_akhir_efektif', $employeeHistory->tanggal_akhir_efektif ?? '') }}">
      </div>
    </div>

    {{-- STATUS --}}
    <div class="mb-6">
      <label class="form-label">Status Aktif</label>
      <select name="current_flag" class="form-select">
        <option value="1" @selected(old('current_flag', $employeeHistory->current_flag ?? 1) == 1)>Aktif</option>
        <option value="0" @selected(old('current_flag', $employeeHistory->current_flag ?? 1) == 0)>Tidak Aktif</option>
      </select>
    </div>

    <div class="flex gap-2">
      <button class="btn btn-primary">Simpan</button>
      <a href="{{ route('admin.employee-history.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

  </form>
</div>
@endsection
