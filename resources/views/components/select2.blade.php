@props([
    'model' => false,
    'data' => [],
    'ingroup' => true
])

<?php
$attribute = explode('.', $model)[1] ?? $model;
$id = 'select2-' . $attribute;

?>

<input type="hidden" wire:model="{{$model}}" id="{{$id.'-h'}}">

<div wire:ignore style="flex-grow: 1;">
    <select id="{{$id}}" style="display: none">
        @foreach($data as $key=>$label)
            <option value="{{$key}}">{{$label}}</option>
        @endforeach
    </select>
</div>


@assets
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/select2.js"></script>
@endassets

@script
<script>
    let value = $('#{{ $id }}-h').val();
    $('#{{ $id }}').select2({
        theme: 'bootstrap-5',
        width: '100%',
    }).val(value).trigger('change')

    $('#{{ $id }}').on('change', function (e) {
        var value = $(this).val();
        var element = document.getElementById('{{ $id }}-h');
        element.value = value;
        element.dispatchEvent(new Event('input'));
    })
</script>
@endscript