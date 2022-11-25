<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Automation</a>
        </div>

        <div class="collapse navbar-collapse" id="navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                @if(\Auth::guest())
                    <li><a href="{{ url('oauth/register') }}">Sign Up</a></li>
                    <li><a href="{{ url('oauth/login') }}">Sign In</a></li>
                @else
                    <li><a href="#">Welcome, {{ \Auth::user()->name }}</a></li>
                    <li><a href="{{ url('payment') }}">Payments</a></li>
                    <li><a href="{{ url('payment/add') }}">add request</a></li>
                    <li><a href="{{ url('oauth/logout') }}">Sign Out</a></li>
                @endif
            </ul>
        </div>

    </div>
</nav>
