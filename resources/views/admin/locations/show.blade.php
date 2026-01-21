@extends('layouts.admin')

@section('title', 'Detail Location')

@section('content')
  <x-form>
    <x-form-header header="Detail Location" paragraph="Informasi location" />

    <div class="space-y-4 text-sm">
      <div>
        <p class="text-gray-500">Nama Location</p>
        <p class="font-semibold text-gray-700">{{ $locations->location }}</p>
      </div>

      <div>
        <p class="text-gray-500">Status</p>
        <p class="font-semibold text-gray-700">
          {{ $locations->is_active ? 'Active' : 'Inactive' }}
        </p>
      </div>
    </div>

    <div class="mt-6">
      <a href="{{ route('admin.fungsis.index') }}" class="text-sky-600">
        ← Kembali
      </a>
    </div>
  </x-form>
@endsection