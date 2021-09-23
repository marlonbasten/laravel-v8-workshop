<li class="nav-item active">
    <a class="nav-link {{ is_current_route($route) }}" href="{{ route($route, $args ?? []) }}">{{ $name }}</a>
</li>