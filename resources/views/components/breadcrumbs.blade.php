@props([
    'items' => [],
])
<ol class="breadcrumb float-sm-end">
    @foreach($items as $key=>$item)
        <li class="breadcrumb-item" @if($key==count($items)-1) aria-current="page" @endif>
            @if($item['route']??false)
                <a href="{{route($item['route'])}}" wire:navigate>{{$item['label']}}</a>
            @else
                {{$item['label']??''}}
            @endif
        </li>
    @endforeach
    <!--li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item"><a href="/">Home2</a></li>
    <li class="breadcrumb-item active" aria-current="page">
        Dashboard v2
    </li-->
</ol>
