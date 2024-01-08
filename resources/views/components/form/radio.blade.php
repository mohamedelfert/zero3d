@props([
    'name','checked' => 'active', 'options','label'=>false,
])

@if($label)
    <label for="{{ $label }}"
        {{ $attributes->class(['form-check-label']) }}
    >
        {{ trans("main.$label") }}
    </label>
@endif

@foreach($options as $key => $value)

    <div class="form-check">
        <input type="radio" name="{{ $name }}" id="{{ $key }}" value="{{ $key }}"
            {{--            @checked(old($name,$checked) == $key)--}}
            {{ $checked == $key ? 'checked' : ''}}
            {{ $attributes->class([
                'form-check-input'
            ]) }}
        >
        <label for="{{ $key }}"
            {{ $attributes->class([
                   'form-check-label'
           ]) }}
        >
            {{ trans("main.$key") }}
        </label>
    </div>

@endforeach
