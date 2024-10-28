@props([
    'column' => '',
    'row'=>''
])
@php
    if(!is_array($column)){
        $parts = explode(':',$column);
        $attribute = $parts[0];
        $label = $parts[1]??$attribute;
        $align = $parts[2]??'';
    }
@endphp
<td>{{$row[$attribute]??''}}</td>
