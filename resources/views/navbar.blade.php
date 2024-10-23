<nav>
    <div class="navbar-header">
        <button class="navbar-toggle" id="nav-toggle">
            <span class="toggle-icon">&#9776;</span>
        </button>
    </div>
    <div class="navbar-collapse" id="navbar-collapse">
        <ul>
            <li><a href="{{ route('space_list') }}">Spaces</a></li>
            <li><a href="{{ route('space_new') }}">New Space</a></li>
            <li><a href="{{ route('profile.edit') }}">Profile</a></li>
            @if(Auth::check())
            <li id="btnLogout">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();">Logout</a>
                </form>
            </li>
            @else
            <li><a href="{{ route('login') }}">Log in</a></li>
            @endif
        </ul>
    </div>
</nav>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        /**
        * Toggle display style of navbar elements
        */
        var navToggle = document.getElementById('nav-toggle');
        var navbarCollapse = document.getElementById('navbar-collapse');

        navToggle.addEventListener('click', function() {
            if (navbarCollapse.style.display === 'block') {
                navbarCollapse.style.display = 'none';
            } else {
                navbarCollapse.style.display = 'block';
            }
        });
    });
</script>