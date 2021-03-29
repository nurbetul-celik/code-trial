<nav class="navbar navbar-expand navbar-white navbar-light ">
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a class="dropdown-item"
               onclick="event.preventDefault();
                                                     document.getElementById('product').submit();">
                {{ __('Ürünler') }}
            </a>
            <form id="product" action="{{ route('get-product') }}" method="get" style="display: none;">
                @csrf
            </form>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            <a class="dropdown-item"
               onclick="event.preventDefault();
                                                     document.getElementById('person').submit();">
                {{ __('Kişiler') }}
            </a>
            <form id="person" action="{{ route('get-person') }}" method="get" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</nav>
