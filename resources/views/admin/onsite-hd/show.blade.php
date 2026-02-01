@extends('layouts.admin')

@section('content')
  <x-form>
    <x-form-header header="Detail Onsite HD" paragraph="Informasi lengkap" />

    <table class="w-full text-sm border rounded-lg">
      <tr>
        <th class="p-3 text-left">Customer</th>
        <td class="p-3">{{ $onsite->customer_name }}</td>
      </tr>
      <tr>
        <th class="p-3 text-left">HD</th>
        <td class="p-3">{{ $onsite->hd_onsite_name }}</td>
      </tr>
      <tr>
        <th class="p-3 text-left">Mulai</th>
        <td class="p-3">{{ $onsite->tanggal_mulai_efektif }}</td>
      </tr>
      <tr>
        <th class="p-3 text-left">Akhir</th>
        <td class="p-3">{{ $onsite->tanggal_akhir_efektif ?? '-' }}</td>
      </tr>
    </table>

    <div class="mt-6">
      <a href="{{ route('admin.onsite.index') }}" class="underline">
        Kembali
      </a>
    </div>
  </x-form>
@endsection