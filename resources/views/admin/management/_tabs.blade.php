@php
  $activeTab = $activeTab ?? request()->get('tab', 'role');

  $masterTabs = [
    'role' => 'Roles',
    'jabatan' => 'Jabatans',
    'fungsi' => 'Fungsis',
    'location' => 'Locations',
  ];

  $mappingTabs = [
    'jabatan-fungsi' => 'Jabatan–Fungsi',
  ];

  $tabClass = fn($key) =>
    $activeTab === $key
    ? 'border-b-2 border-black text-black'
    : 'text-gray-400 hover:text-black hover:border-b-2 hover:border-gray-300';
@endphp

<div class="flex items-center border-b mb-6 text-sm font-medium">

  <div class="flex gap-6">
    @foreach ($masterTabs as $key => $label)
      <a href="{{ route('admin.management.index', ['tab' => $key]) }}" class="pb-2 transition-all {{ $tabClass($key) }}">
        {{ $label }}
      </a>
    @endforeach
  </div>

  <div class="flex-1"></div>

  <div class="flex gap-6">
    @foreach ($mappingTabs as $key => $label)
      <a href="{{ route('admin.management.index', ['tab' => $key]) }}" class="pb-2 transition-all {{ $tabClass($key) }}">
        {{ $label }}
      </a>
    @endforeach
  </div>

</div>