@props([
    'label' => false,
    'attribute' => false,
    'layout' => 'h',
    'errorMessage'=>'',
])

<?php

?>
<div class="mb-2">
        @if($layout=='h')
            <div class="row">
                <div class="col-3" style="align-items: center;  display: flex;  justify-content: flex-end;">
                    <label for="{{$attribute}}" class="form-label">{{ $label ?? '' }}</label>
                </div>
                <div class="col-9">
                    {{ $slot }}
                    <div class="invalid-feedback">
                        {{$errorMessage??''}}
                    </div>
                </div>
            </div>
        @elseif($layout=='f')
            {{ $slot }}
            <div class="invalid-feedback">
                {{$errorMessage??''}}
            </div>
        @else
            @if($label)
                <label for="{{$attribute}}" class="form-label">{{ $label ?? '' }}</label>
            @endif
            {{ $slot }}
            <div class="invalid-feedback">
                {{$errorMessage??''}}
            </div>
        @endif
</div>