@extends('layouts.admin')

@section('title', 'Buat Locations')

@section('content')
  <x-form>
    <x-form-header header="Buat Locations" paragraph="Buat baru data location" />

    <form action="{{ route('admin.locations.store') }}" method="POST" class="space-y-6">
      @csrf

      <div>
        <label class="font-semibold text-sm">Nama Locations</label>
        <input name="location" class="w-full mt-2 p-3 border rounded-lg" required>
      </div>

      <div>
        <label class="font-semibold text-sm">Status</label>
        <select name="is_active" class="w-full mt-2 p-3 border rounded-lg">
          <option value="1">Active</option>
          <option value="0">Inactive</option>
        </select>
      </div>

      <div class="flex gap-3 pt-4">
        <button class="bg-sky-600 text-white px-6 py-3 rounded-lg">
          Simpan
        </button>
        <a href="{{ route('admin.locations.index') }}" class="px-6 py-3 rounded-lg border">
          Batal
        </a>
      </div>
    </form>
  </x-form>
@endsection