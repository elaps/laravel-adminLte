<?php

use Livewire\Volt\Component;

new class extends Component {
    public int $count = 0;
    public $model = '';
    public $data = [];
    public $id;

    public function mount(): void {
        $attribute = explode('.', $this->model)[1] ?? $this->model;
        $this->id = 'select2-'.$attribute.'-'.time();
    }
}; ?>


<div>
    <input type="text" wire:model="{{$model}}" id="{{$id.'-h'}}">

        <select  id="{{$id}}" style="display: none">
        @foreach($data as $key=>$label)
            <option value="{{$key}}">{{$label}}</option>
        @endforeach
    </select>
</div>

@script
<script >

    document.addEventListener('livewire:navigated', function() {
        var value = $('#{{ $id }}-h').val();
        $('#{{ $id }}').select2({
            theme: 'bootstrap-5',
            width: '100%',
        }).val(@js($model)).trigger('change')

        $('#{{ $id }}').on('change', function(e) {
            var value = $(this).val();
            var element = document.getElementById('{{ $id }}-h');
            element.value = value;
            debugger
            element.dispatchEvent(new Event('input'));
        });
    });
</script>
@endscript