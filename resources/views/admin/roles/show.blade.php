@extends('layouts.admin')

@section('title', 'Detail Role')

@section('content')
  <x-form>
    <x-form-header header="Detail Role" paragraph="Informasi role" />

    <div class="space-y-4 text-sm">
      <div>
        <p class="text-gray-500">Nama Role</p>
        <p class="font-semibold text-gray-700">{{ $roles->jabatan }}</p>
      </div>

      <div>
        <p class="text-gray-500">Status</p>
        <p class="font-semibold text-gray-700">
          {{ $roles->is_active ? 'Active' : 'Inactive' }}
        </p>
      </div>
    </div>

    <div class="mt-6">
      <a href="{{ route('admin.roles.index') }}" class="text-sky-600">
        ← Kembali
      </a>
    </div>
  </x-form>
@endsection