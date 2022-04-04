<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper ">
        <div class="sidebar-brand">
            {{--  <a href="{{ url('/dashboard') }}"> <img alt="image" src="{{ asset('assets/dist/img/admin_logo.png') }}"
                    class="header-logo" />
            </a>  --}}
        </div>
        <ul class="sidebar-menu">
            <li class="dropdown">
                <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-home"> </i><span>Dashboard</span></a>
            </li>

            @if(Auth::user()->type == 0)
            <li class="dropdown">
                <a href="{{ route('users.index') }}" class="nav-link"><i class="fas fa-user-friends"></i><span>Users</span></a>
            </li>
            <li class="dropdown">
                <a href="{{ route('question.index') }}" class="nav-link"><i class="fas fa-clipboard"></i><span>Questionnaire</span></a>
            </li>
            @else
            <li class="dropdown">
                <a href="{{ route('profile.index') }}" class="nav-link"><i class="fas fa-address-card"></i><span>Profile</span></a>
            </li>
            @endif
            <li class="dropdown">
                <a href="#" class="nav-link"><i class="fas fa-cog"></i><span>Settings</span></a>
            </li>

        </ul>

    </aside>
</div>
