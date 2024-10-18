@props(['color' => 'primary', 'type' => 'button'])

<button class="btn btn-{{ $color }} shadow-sm " type="{{ $type }}">{{ $slot }}</button>
