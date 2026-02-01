@extends('layouts.admin')

@section('content')
  <x-form>
    <x-form-header header="Tambah Onsite HD" paragraph="Input data baru" />

    <form method="POST" action="{{ route('admin.onsite.store') }}">
      @include('admin.onsite-hd._form')
    </form>
  </x-form>
@endsection