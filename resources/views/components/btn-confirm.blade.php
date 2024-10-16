@props([
    'type' => 'default',
    'confirm' => __('Вы уверены?'),
    'okText' => __('Ok'),
    'cancelText' => __('Отмена'),
])
@once
    <script>
        function confirmAction(params, callback) {
            var defaults = {
                title: '',
                text: '{{ $confirm }}',
                showCancelButton: true,
                cancelButtonText: '{{$cancelText}}',
                cancelButtonClass: "btn-default",
                confirmButtonClass: "btn-danger",
                confirmButtonText: '{{$okText}}',
                closeOnConfirm: true
            }
            swal(defaults,
                function () {
                    callback();
                });
        }
    </script>
@endonce

<div>
    <button x-data="" class="btn btn-{{ $type }}"
            x-on:click="(e) => {e.preventDefault();confirmAction({},()=>e.target.parentElement.children[1].click() )} ">
        {{ $slot }}
    </button>
    <button style="display: none" class="btn btn-{{ $type }}" {{ $attributes }}>
        {{ $slot }}
    </button>
</div>