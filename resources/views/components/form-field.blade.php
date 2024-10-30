@props([
    'label' => false,
    'attribute' => false,
    'type' => 'text',
    'placeholder' => false,
    'model' => false,
    'icon' => false,
    'fl' => 'h',
    'data'  => []
])

<?php
$class = '';
$attribute = explode('.', $model)[1] ?? $model;
$errorMessage = '';
if ($errors->get($model)) {
    $class = ' is-invalid';
    $errorMessage = $errors->first($model);
}
?>
@if($type=='checkbox')
    @if($fl == 'h')
        <div class="row">
            <div class="col-3" ></div>
            <div class="col-9">
    @endif
    <div class="form-check mb-2">
        <input type="{{$type}}" id="{{$attribute}}" wire:model="{{$model}}"
               class="form-check-input   {{$class}}"
               placeholder="{{ $placeholder ?? '' }}">
        <label class="form-check-label" for="{{$attribute}}">
            {{ $label ?? '' }}
        </label>
        <div  class="invalid-feedback">
            {{$errorMessage??''}}
        </div>
    </div>
    @if($fl == 'h')
        </div>
        </div>

    @endif
@else
<x-form-field-group :label="$label" :layout="$fl" :errorMessage="$errorMessage" :type="$type" >
    <div class="input-group {{$class}}">
        @if($fl=='f')
            <div class="form-floating">
        @endif
                {{-- Вынести в отдельный компонент --}}
                @switch($type)
                    @case('select')
                        <select id="{{$attribute}}" wire:model="{{$model}}" class="form-select {{$class}}">
                            @foreach($options as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                        @break;
                    @case('select2')

                        <x-select2 model="{{$model}}"
                                  :data="$data"
                                  :ingroup="!!$icon"
                        ></x-select2>
                        @break;
                    @case('daterange')

                        <x-daterange-picker  model="{{$model}}"
                                   :data="$data"
                                   :ingroup="!!$icon"
                        ></x-daterange-picker>
                        @break;
                    @case('date')
                        <x-daterange-picker  model="{{$model}}"
                                             :data="$data"
                                             :ingroup="!!$icon"
                                             :mode="'single'"
                        ></x-daterange-picker>
                        @break;
                    @case('textarea')
                        <textarea id="{{$attribute}}" wire:model="{{$model}}" class="form-control {{$class}}">
                        </textarea>
                        @break;

                    @default
                        <input type="{{$type}}" id="{{$attribute}}" wire:model="{{$model}}"
                               class="form-control  {{$class}}"
                               placeholder="{{ $placeholder ?? '' }}"
                                {{ $attributes }}
                        >

                @endswitch

        @if($fl=='f')
                    <label for="{{$attribute}}" class="form-label">{{ $label ?? '' }}</label>
            </div>
        @endif

        @if($icon)
            <div class="input-group-text"><span class="bi bi-{{$icon}}"></span></div>
        @endif
    </div>

</x-form-field-group>

@endif