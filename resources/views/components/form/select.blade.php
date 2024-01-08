@props([
    'name','options','selected','value' => false, 'label' => false,
])

@if($label)
    <label for="{{ $label }}" {{ $attributes->class(['form-select-label']) }}>{{ trans("main.$label") }}</label>
@endif

<select
    name="{{ $name }}"
    {{ $attributes->class([
        'form-control',
        'form-select'
    ]) }}
>
    @foreach($options as $value => $text)
        <option value="{{ $value }}" {{ $selected == $value ? 'selected' : ''}}
            {{--            @selected($value == $selected)--}}
        >
            {{ $text }}
        </option>
    @endforeach
</select>
