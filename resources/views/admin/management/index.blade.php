@extends('layouts.admin')

@section('title', 'Manajemen')

@section('content')
<div class="bg-white rounded-xl p-6">

  @include('admin.management._tabs', [
    'activeTab' => request()->get('tab', 'role')
  ])

  @switch(request()->get('tab', 'role'))

    @case('role')
      @include('admin.management.tabs.role')
      @break

    @case('jabatan')
      @include('admin.management.tabs.jabatan')
      @break

    @case('fungsi')
      @include('admin.management.tabs.fungsi')
      @break

    @case('location')
      @include('admin.management.tabs.location')
      @break

    @case('jabatan-fungsi')
      @if(request()->routeIs('admin.management.jabatan-fungsi.edit'))
        @include('admin.management.jabatan-fungsi.edit')
      @else
        @include('admin.management.jabatan-fungsi.index')
      @endif
      @break

  @endswitch

</div>
@endsection
