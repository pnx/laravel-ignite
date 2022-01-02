
<li x-on:click="{{ $isPlaceholder ? 'selectPlaceholder()' : "select('$value', '$display')" }}"
    data-display="{{ $display }}"
    data-value="{{ $value }}"
    class="px-4 py-2 cursor-pointer first:rounded-t last:rounded-b hover:bg-blue-400 hover:text-white">

    @if ($isPlaceholder)
    <span class="text-gray-600">{{ $display }}</span>
    @else
    {{ $display }}
    @endif
</li>
