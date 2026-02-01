@extends('layouts.admin')

@section('content')
  <x-form>
    <x-form-header header="Edit Onsite HD" paragraph="Perbarui data" />

    <form method="POST" action="{{ route('admin.onsite.update', $onsite) }}">
      @include('admin.onsite-hd._form', ['onsite' => $onsite])
    </form>
  </x-form>
@endsection