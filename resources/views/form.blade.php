<form method="{{ $method }}" action="{{ $action }}">
    @if($realmethod)@method($realmethod)@endif
    @csrf

    {{ $slot }}
</form>
