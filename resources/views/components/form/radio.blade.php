@props([
    'name','checked' => 'active', 'options'
])

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
