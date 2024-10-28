@props([
    'columns' => [],
    'rows'=>[]
    ]
)

<table class="table table-bordered">

    <thead>
    <tr>
        @foreach($columns as $column)
            <x-table-view.th :column="$column"/>

        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($rows as $row)
        <tr>
            @foreach($columns as $column)
                <x-table-view.td :column="$column" :row="$row"/>
            @endforeach
        <tr>
    @endforeach
    </tbody>
</table>
