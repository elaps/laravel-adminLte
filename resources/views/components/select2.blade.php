@props([
    'model' => false,
    'data' => [],
    'ingroup' => false
])

<?php
$attribute = explode('.', $model)[1] ?? $model;
$id = 'select2-' . $attribute;

?>

<input type="hidden" wire:model="{{$model}}" id="{{$id.'-h'}}">

<div wire:ignore style="flex-grow: 1;" class="{{$ingroup?'ingroup':''}}">
    <select id="{{$id}}" style="display: none" class="select2">
        @foreach($data as $key=>$label)
            <option value="{{$key}}">{{$label}}</option>
        @endforeach
    </select>
</div>


@assets
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/select2.js" defer></script>

@vite(['resources/css/select2.scss'])

@endassets

@script
<script defer>
    $('.select2').each(
        (i, el) => {
            $(el).select2({
                theme: 'bootstrap-5',
                width: '100%',
            }).val($wire.get($('#'+el.id+'-h').attr('wire:model') ) ).trigger('change')

            $(el).on('change', function (e) {
                var value = $(this).val();
                var element = document.getElementById(e.target.id+'-h');
                element.value = value;
                element.dispatchEvent(new Event('input'));
            })
        }
    )
</script>
@endscript