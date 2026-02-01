@csrf
@isset($onsite)
  @method('PUT')
@endisset

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

  <div>
    <label class="text-sm font-medium">Customer</label>
    <input type="text" name="customer_name" class="w-full border rounded-lg p-2"
      value="{{ old('customer_name', $onsite->customer_name ?? '') }}" required>
  </div>

  <div>
    <label class="text-sm font-medium">HD Onsite</label>
    <input type="text" name="hd_onsite_name" class="w-full border rounded-lg p-2"
      value="{{ old('hd_onsite_name', $onsite->hd_onsite_name ?? '') }}" required>
  </div>

  <div>
    <label class="text-sm font-medium">Mulai Efektif</label>
    <input type="date" name="tanggal_mulai_efektif" class="w-full border rounded-lg p-2"
      value="{{ old('tanggal_mulai_efektif', $onsite->tanggal_mulai_efektif ?? '') }}" required>
  </div>

  <div>
    <label class="text-sm font-medium">Akhir Efektif</label>
    <input type="date" name="tanggal_akhir_efektif" class="w-full border rounded-lg p-2"
      value="{{ old('tanggal_akhir_efektif', $onsite->tanggal_akhir_efektif ?? '') }}">
  </div>

</div>

<div class="flex justify-end gap-3 mt-8">
  <a href="{{ route('admin.onsite.index') }}" class="px-4 py-2 border rounded-lg">
    Batal
  </a>
  <button class="px-6 py-2 bg-black text-white rounded-lg">
    Simpan
  </button>
</div>