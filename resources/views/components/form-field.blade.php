@props([
    'label' => false,
    'attribute' => false,
    'type' => 'text',
    'placeholder' => false,
    'model' => false,
    'icon' => false
])


<?php
$class = 'form-control ';
$attribute = explode('.', $model)[1]??$model;
if ($errors->get($model)){
    $class.=' is-invalid';
    $errorMessage = $errors->first($model);
}
?>

<div class="input-group mb-2 is-invalid">
    <div class="form-floating">
        <input type="{{$type}}" id="{{$attribute}}" wire:model="{{$model}}" class="{{$class}}" placeholder="{{ $placeholder ?? '' }}">
        <label for="{{$attribute}}" class="form-label">{{ $label ?? '' }}</label>
    </div>
    <?php if($icon): ?>
    <div class="input-group-text"><span class="bi {{$icon}}"></span> </div>
    <?php endif; ?>
</div>

<div class="invalid-feedback">
    {{$errorMessage??''}}
</div>
