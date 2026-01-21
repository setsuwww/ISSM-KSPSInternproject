@extends('layouts.admin')

@section('title', 'Location')

@section('content')
  <x-form>
    <div class="flex justify-between items-center mb-8">
      <x-form-header header="Location" paragraph="Daftar location" />
      <a href="{{ route('admin.locations.create') }}" class="bg-sky-600 text-white px-4 py-2 rounded-lg hover:bg-sky-700">
        + Add Location
      </a>
    </div>

    @if(session('success'))
      <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
        {{ session('success') }}
      </div>
    @endif

    <table class="w-full border-collapse">
      <thead>
        <tr class="bg-gray-50 text-left text-sm text-gray-600">
          <th class="p-3">ID</th>
          <th class="p-3">Nama Location</th>
          <th class="p-3">Status</th>
          <th class="p-3 w-40">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($locations as $location)
          <tr class="border-t text-sm hover:bg-gray-50 transition">
            <td class="p-4 text-gray-600">{{ $location->id }}</td>

            <td class="p-4 font-semibold text-gray-700">
              {{ $location->location }}
            </td>

            <td class="p-4">
              <span
                class="px-2 py-1 text-xs rounded
                                    {{ $location->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-200 text-gray-600' }}">
                {{ $location->is_active ? 'Active' : 'Inactive' }}
              </span>
            </td>

            <td class="p-4">
              <div class="flex items-center gap-2">
                <a href="{{ route('admin.locations.show', $location) }}"
                  class="px-3 py-1.5 text-sm rounded-md border border-sky-200 text-sky-600 hover:bg-sky-50">
                  Detail
                </a>

                <a href="{{ route('admin.locations.edit', $location) }}"
                  class="px-3 py-1.5 text-sm rounded-md border border-amber-200 text-amber-600 hover:bg-amber-50">
                  Edit
                </a>

                <form action="{{ route('admin.locations.destroy', $location) }}" method="POST"
                  onsubmit="return confirm('Hapus location ini?')">
                  @csrf
                  @method('DELETE')
                  <button class="px-3 py-1.5 text-sm rounded-md border border-red-200 text-red-600 hover:bg-red-50">
                    Hapus
                  </button>
                </form>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <div class="mt-6">
      {{ $locations->links() }}
    </div>
  </x-form>
@endsection