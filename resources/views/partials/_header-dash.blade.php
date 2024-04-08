<nav class="navigation">
    <div class="tendo-logo">
        <a href="{{ route('home') }}">
            TENDO
        </a>
    </div>
    <div class="nav-link">
        <a href="{{ route('submitted-outfits') }}">
            SUBMITTED OUTFITS
        </a>
    </div>
    <div class="nav-link">
        <a href="{{ route('items.index') }}">
            ADD ITEMS
        </a>
    </div>
    <div class="nav-link">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-dropdown-link :>
                <a href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                    LOGOUT
                </a>
            </x-dropdown-link>
        </form>
    </div>
</nav>
<div class="height-div"></div>