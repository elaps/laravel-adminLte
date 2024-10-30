@props([
    'column' => ''
])

@php

@endphp

<th>
    @if($column['sort']!==false)
        @php
            if($column['sort']==0){
                $attr = $column['attribute'];
                $mark = '';
            }
            if($column['sort']==1){
                $attr = '-'.$column['attribute'];
                $mark = '▴';
            }
            if($column['sort']==-1){
                $attr = $column['attribute'];
                $mark = '▾';
            }
            $params = request()->all();
            $params['sorted_at'] = $attr;
            $q = http_build_query($params);
        @endphp
        <a href="?{{$q}}" wire:navigate>{{$column['label']}} {{$mark}}</a>
    @else
        {{$column['label']}}
    @endif
</th>
