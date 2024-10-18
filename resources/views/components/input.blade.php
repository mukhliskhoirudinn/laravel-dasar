@props(['name', 'label', 'type' => 'text', 'value' => null])

<div class="mb-3">
    <label for="{{ $name }}" class="form-label"><b>{{ $label }}</b></label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ $value }}"
        class="form-control" value="{{ $value }}">
</div>
