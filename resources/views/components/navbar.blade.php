<div class="navbar bg-white fixed bg-transparent top-0 left-0 z-10">
    <div class="navbar-start">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                </svg>
            </div>
            @if(auth()->check())
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                @if(auth()->user()->role == 'admin')
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                @endif
                <li><a href="{{ Request::is('home') ? '/profile' : '/home' }}">{{ Request::is('home') ? 'Profile' : 'Home' }}</a></li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
            </ul>
            @else
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                <li><a href="{{ Request::is('/') ? '/login' : '/' }}">{{ Request::is('/') ? 'Login' : 'Home' }}</a></li>
            </ul>
            @endif
        </div>
    </div>
    <div class="navbar-center">
        <a class="btn btn-ghost text-xl">MyKaryawan</a>
    </div>
    <div class="navbar-end">
    </div>
</div>
