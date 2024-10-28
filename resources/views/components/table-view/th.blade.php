@props([
    'column' => ''
])
@php
    if(!is_array($column)){
        $parts = explode(':',$column);
        $attribute = $parts[0];
        $label = $parts[1]??$attribute;
        $align = $parts[2]??'';
    }
@endphp
<th>{{$label}}</th>
