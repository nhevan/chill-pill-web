<li><a href="{{ route('viewControls') }}">Test Controls</a></li>
<!-- Authentication Links -->
@if (Auth::guest())
    <li><a href="{{ route('login') }}">Login</a></li>
    <li><a href="{{ route('register') }}">Register</a></li>
@else
    <li class="dropdown">
        <a href="{{ route('dashboard') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            Dashboard <span class="caret"></span>
        </a>

        <ul class="dropdown-menu" role="menu">
            <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </li>
    @if (Auth::user()->user_type_id == 1)
        <li><a href="{{ route('show-patient-update-page') }}">Update Profile</a></li>
    @else
        <li><a href="{{ route('show-doctor-update-page') }}">Update Profile</a></li>
    @endif
@endif