@props(['options', 'name', 'checked' => 'active', 'id' => '', 'disabled' => false]) <!-- Added the 'disabled' attribute -->

@foreach ($options as $key => $option)
    <label {{ $attributes->class(['radio']) }}>
        <input type="radio" name="{{ $name }}" value="{{ $key }}" {{ $attributes }} @checked($key == $checked) @if($disabled) disabled @endif> <!-- Added the 'disabled' condition -->
        <span></span>{{ $option }}
    </label>
@endforeach
