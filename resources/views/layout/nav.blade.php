@if(auth()->check())
<nav class="navbar navbar-toggleable-md navbar-light bg-faded">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        </ul>

        <a class="navbar-brand" href="#">
                {{auth()->user()->name}}
        </a>
            <a class="navbar-brand" href="{{ url('logout') }}">
                logout
            </a>

        </div>
    </nav>
    @endif
