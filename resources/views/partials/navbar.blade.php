<nav
    class="
                            navbar navbar-expand navbar-light
                            bg-white
                            topbar
                            mb-4
                            static-top
                            shadow
                        ">
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>



    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        @auth
            <li>
                <div class="row">
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="btn nav-link text-light" style="background-color: #4e73df"><i
                                class="fas fa-sign-in-alt"></i> Logout</button>
                    </form>
                </div>

            </li>
        @endauth
        <div class="topbar-divider d-none d-sm-block"></div>
    </ul>
</nav>
