<ul class="menu">
@foreach ($menu as $item)
    <li>
        <a class="{{ $cur_url == $item['url'] ? 'active' : null }}" href="{{ $item['url'] }}">
            {{ $item['name'] }}
        </a>
    </li>
@endforeach
</ul>