@props([
    'column' => ''
])

@php

@endphp

<th>
        @if( $column['filter'] == 'like' )
                <x-form-field model="filterForm.{{$column['attribute']}}" fl="v"  onblur="submitForm()"></x-form-field>
        @endif
        @if( $column['filter'] == 'select2' )
                <x-form-field type="select2" model="filterForm.{{$column['attribute']}}" fl="v"  onblur="submitForm()" :data="[1,2,3]"></x-form-field>
        @endif
</th>


