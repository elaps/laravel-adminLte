@props([
    'item' => [],
    'current'=>''
])


    @if($item['url']??false)
        <li class="nav-item ">
        <a href="{{route($item['url'])}}" class="nav-link {{$item['active']?'active':''}}" wire:navigate>
    @else
        <li class="nav-item {{$item['opened']?'menu-open':''}}">
        <a href="#" class="nav-link" >
    @endif
        <i class="nav-icon {{$item['icon']}}"></i>
        <p>
            {{$item['label']}}
            @if($item['items']??false)
                <i class="nav-arrow bi bi-chevron-right"></i>
            @endif
        </p>

    </a>
    @if($item['items']??false)
        <ul class="nav nav-treeview">
            @foreach($item['items'] as $key2=>$item2)
                <x-menu-li :item="$item2" :current="$current"/>
            @endforeach
        </ul>
    @endif
</li>