@props(['name', 'title', 'value', 'check'=>'false'])

<div class='flex items-center'>
    @if($check == 'false')
        <input 
            type='checkbox' 
            name="{{$name}}[]" 
            value="{{$value}}"
        />
    @else 
        <input
            type='checkbox' 
            name="{{$name}}[]" 
            value="{{$value}}"
            checked
        />
    @endif
    <label 
        for='{{$name}}' 
        class='ml-2 inline-block'
    >
        {{$title}}
    </label>
</div>