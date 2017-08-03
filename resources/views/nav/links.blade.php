<li><a href="{{ route('testDose') }}">Test Dose</a></li>
<!-- Authentication Links -->
@if (Auth::guest())
    <li><a href="{{ route('login') }}">Login</a></li>
    <li><a href="{{ route('register') }}">Register</a></li>
@else
    <li class="dropdown">
        <a href="{{ route('dashboard') }}">
            <i class="material-icons right">view_module</i>
            Dashboard
        </a>
    </li>
    
    @if (Auth::user()->user_type_id == 1)
        @include('nav.patient-actions')
    @else
        @include('nav.doctor-actions')
    @endif

    <li>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            <i class="material-icons right">exit_to_app</i>
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </li>
@endif