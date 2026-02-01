<a class="bg-white border border-gray-200 rounded-2xl p-6">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-gray-600 text-sm font-bold uppercase tracking-wide">{{ $title }}</p>
            <p class="text-3xl font-bold text-gray-900 mt-2">{{ $count }}</p>
            <p class="text-gray-500 text-xs mt-1">{{ $subtitle }}</p>
        </div>
        <div class="w-14 h-14 {{ $bgColor }} rounded-xl flex items-center justify-center">
            {!! $icon !!}
        </div>
    </div>
</a>