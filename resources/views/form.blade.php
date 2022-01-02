<form method="{{ $method }}" action="{{ $action }}" {!! $attributes->except('action', 'method') !!}>
    @if($realmethod)@method($realmethod)@endif
    @csrf

    {{ $slot }}
</form>
