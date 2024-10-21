@props([
    'model' => false,
    'data' => [],
    'ingroup' => false,
    'mode'=>'range'
])

<?php
//https://www.daterangepicker.com/#config
$attribute = explode('.', $model)[1] ?? $model;
$id = 'date-' . $attribute;
?>

<div wire:ignore style="flex-grow: 1;" class="{{$ingroup?'ingroup':''}}" >
    <div>
        <input  type="text" class="form-control daterange" name="dates" wire:model="{{$model}}"  id="{{$id}}" data-mode="{{$mode}}" >
    </div>
</div>

@assets
<script type="text/javascript" src="/js/jquery.js" async></script>
<script type="text/javascript" src="/js/daterange.js" defer></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@vite(['resources/css/daterange.scss'])
@endassets

@script
<script>
    $('.daterange').each(
        (e,el)=>{
            single = $(el).attr('data-mode')=='single'
            $(el).daterangepicker(
                {
                    singleDatePicker: single,
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    locale: {
                        format: 'DD.MM.YYYY',

                        "separator": " - ",
                        "applyLabel": "Apply",
                        "cancelLabel": "Cancel",
                        "fromLabel": "From",
                        "toLabel": "To",
                        "customRangeLabel": "Custom",
                        "weekLabel": "W",

                        "daysOfWeek": [
                            "Su",
                            "Mo",
                            "Tu",
                            "We",
                            "Th",
                            "Fr",
                            "Sa"
                        ],

                        "monthNames": [
                            "January",
                            "February",
                            "March",
                            "April",
                            "May",
                            "June",
                            "July",
                            "August",
                            "September",
                            "October",
                            "November",
                            "December"
                        ],
                        "firstDay": 1
                    },
                })
                .on('apply.daterangepicker', function(ev, picker) {
                        var element = document.getElementById(picker.element[0].id);
                        element.value = picker.element.val() ;
                        element.dispatchEvent(new Event('input'));
                    }
                );
        }
    )


</script>
@endscript