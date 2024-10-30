@props([
    'model' => null,
    ]
)

<form wire:submit="filter" id="filter" >
<table class="table table-bordered">
    <thead>
    <tr>
        @foreach($model->columns as $key => $column)
            <x-table-view.th :column="$model->getColumnTh($key)"/>
        @endforeach
    </tr>


    <tr >
        @foreach($model->columns as $key => $column)
            <x-table-view.filter :column="$model->getColumnFilterTh($key)"/>
        @endforeach
    </tr>


    </thead>
    <tbody>

    </tbody>
</table>
<button >qq</button>
</form>

<script>
    function submitForm() {
        var form = document.getElementById('filter');
        var event = new Event('submit', {
            bubbles: true,
            cancelable: true
        });
        //form.dispatchEvent(event);
    }
</script>
