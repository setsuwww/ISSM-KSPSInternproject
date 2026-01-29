<x-form>
  <x-form-header header="Role" paragraph="Tabel Role" />

  {{-- CREATE --}}
  <form method="POST" action="{{ route('admin.management.roles.store') }}" class="flex gap-2 mb-6">
    @csrf
    <input name="role" required class="input px-3 py-1 w-64" placeholder="Role name">
    <button class="px-3 py-1 bg-sky-600 hover:bg-sky-700 rounded-md text-white">
      Tambah
    </button>
  </form>

  {{-- BULK UPDATE --}}
  <form id="bulk-form" method="POST" action="{{ route('admin.management.roles.bulkUpdate') }}"
    x-data="{ dirty: false }">
    @csrf

    <table class="w-full text-sm rounded-lg">
      <thead class="bg-gray-50">
        <tr>
          <th class="px-4 py-2 text-left">Name</th>
          <th class="px-4 py-2 text-left">Created & Updated</th>
          <th class="px-4 py-2 text-left">Action</th>
        </tr>
      </thead>

      <tbody>
        @foreach($roles as $role)
          <tr class="border-t">
            {{-- EDIT --}}
            <td class="p-4">
              <span class="font-semibold text-gray-400">Edit :</span> <input name="roles[{{ $role->id }}][role]"
                value="{{ $role->role }}" @input="dirty = true" class="input px-2 py-1 w-48">
            </td>

            {{-- DATE --}}
            <td class="p-4 text-sm">
              <div>{{ $role->created_at->format('d F Y, H:i') }}</div>
              <div class="text-gray-400 text-xs">
                {{ $role->updated_at->format('d F Y, H:i') }}
              </div>
            </td>

            {{-- ACTION --}}
            <td class="p-4">
              <button type="button"
                onclick="if(confirm('Delete role ini?')) document.getElementById('delete-form-{{ $role->id }}').submit()"
                class="bg-red-50 text-red-600 px-4 py-1 rounded-md">
                Delete
              </button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    {{-- CONFIRM --}}
    <div class="flex justify-end mt-4">
      <button type="submit" :disabled="!dirty" class="bg-black text-white px-6 py-2 rounded-lg disabled:opacity-40">
        Confirm Changes
      </button>
    </div>
  </form>

  {{-- DELETE FORMS (DI LUAR, TIDAK NESTED) --}}
  @foreach($roles as $role)
    <form id="delete-form-{{ $role->id }}" method="POST" action="{{ route('admin.management.roles.destroy', $role) }}"
      class="hidden">
      @csrf
      @method('DELETE')
    </form>
  @endforeach
</x-form>