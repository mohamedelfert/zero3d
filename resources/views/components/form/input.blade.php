@props([
    'name','type' => 'text','placeholder','value' => false, 'label' => false,
])

@if($label)
    <label for="">{{ trans("main.$label") }}</label>
@endif

<input type="{{ $type }}"
       name="{{ $name }}"
       class="form-control"
       value="{{ old($name,$value) }}"
       placeholder="{{ trans("main.$placeholder") }}"
    {{ $attributes->class([
        'form-control'
    ]) }}
>
