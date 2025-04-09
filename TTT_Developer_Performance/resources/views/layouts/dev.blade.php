<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('title')
    <link rel="icon" type="image/jpg" sizes="16x16" href="resources/Images/ttt_logo.jpg" />
    <link rel="stylesheet" href="resources/css/global.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @yield('styles')
</head>

<body class="h-screen flex flex-col">
    <div class="flex flex-1 bg-[var(--bg-color)]">
        <!-- Sidebar -->
        <nav id="navbar"
            class="bg-[var(--primary-color)] rounded-r-[10px] p-4 pt-[30px] text-white transition-all duration-300 w-[300px] shadow-lg">
            <!-- Logo -->
            <div id="logo-container" class="flex mb-6 gap-[10px] items-center">
                <img src="resources/Images/ttt_logo.jpg" alt="" class="w-[50px] h-[50px] rounded-[5px]">
                <h1 id="navbar-title" class="text-lg">TTT Developer <br>Performance</h1>
            </div>

            <!-- Menu -->
            <ul class="space-y-4">
                <!-- Dashboard -->
                <li>
                    <button onclick="toggleMenu('dashboardMenu', this)"
                        class="w-full text-left flex justify-between items-center font-bold px-2 py-2">
                        <div class="flex items-center gap-3">
                            <img src="resources/Images/Icons/visualization.png" alt=""
                                class="w-[25px] h-[25px]" onclick="toggleNavbar()">
                            <span id="dashboard-text">Dashboard</span>
                        </div>
                        <i id="dashboard-icon" class="fi fi-br-angle-small-right transition-transform"></i>
                    </button>
                    <ul id="dashboardMenu" class="submenu hidden space-y-2 ml-4 mt-2">
                        <li><a href="{{ url('dash-overview-dev') }}" class="block">Overview</a></li>
                        <li><a href="{{ url('dash-team-performance-dev') }}" class="block">Team Performance</a></li>
                    </ul>
                </li>

                <!-- Performance Review -->
                <li>
                    <button onclick="toggleMenu('performanceReviewMenu', this)"
                        class="w-full text-left flex justify-between items-center font-bold px-2 py-2">
                        <div class="flex items-center gap-2">
                            <img src="resources/Images/Icons/evaluation.png" alt=""
                                class="w-[25px] h-[25px]" onclick="toggleNavbar()">
                            <span id="performanceReview-text">Performance Review</span>
                        </div>
                        <i id="performanceReview-icon" class="fi fi-br-angle-small-right transition-transform"></i>
                    </button>
                    <ul id="performanceReviewMenu" class="submenu hidden space-y-2 ml-4 mt-2">
                        <li><a href="{{ url('review-performance-history') }}" class="block">Performance History</a></li>
                    </ul>
                </li>

            </ul>
        </nav>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <header
                class="h-[80px] bg-[var(--primary-color)] rounded-[15px] flex items-center justify-between px-6 text-white mt-[10px] mx-[20px] shadow-lg">
                <button onclick="toggleNavbar()"><i class="fi fi-br-menu-burger text-[30px]"></i></button>
                <div class="flex justify-center items-center w-full">
                    <input type="text" placeholder="Search"
                        class="px-4 py-2 rounded-[10px] text-black w-[500px] bg-white" />
                </div>
                <div class="relative">
                    <button onclick="toggleProfileDropdown()" class="focus:outline-none">
                        <img src="resources/Images/ttt_logo.jpg" alt=""
                            class="w-[50px] h-[50px] rounded-[50px]">
                    </button>
                </div>

                <!-- DropdownProfile menu -->
                <div id="profileDropdown"
                    class="profileDropdown absolute top-[100px] right-[20px] bg-[var(--primary-color)] w-[200px] h-[170px] rounded-xl flex justify-center items-center hidden z-999">
                    <ul id="profileDropdownList" class="flex flex-col">
                        <li class="py-2 px-3 rounded-xl hover:bg-black/20">
                            <a href="{{ url('/myprofile')}}" class="inline-flex gap-2">
                                <img src="resources/Images/Icons/user.png" alt=""
                                    class="w-[20px] h-[20px]">
                                <span id="myProfile-text">My profile</span>
                            </a>
                        </li>
                        <li class="py-2 px-3 rounded-xl hover:bg-black/20">
                            <a href="{{ url('/change-password')}}" class="inline-flex gap-2">
                                <img src="resources/Images/Icons/lock.png" alt=""
                                    class="w-[20px] h-[20px]">
                                <span id="changePassword-text">Change Password</span>
                            </a>
                        </li>
                        <hr class="my-2">
                        <li class="py-2 px-3 rounded-xl hover:bg-black/20">
                            <a href="{{ url('/logout') }}" class="inline-flex gap-2">
                                <img src="resources/Images/Icons/log-out.png" alt=""
                                    class="ml-[4px] w-[20px] h-[20px]">
                                <span id="signOut-text">Sign Out</span>
                            </a>
                        </li>
                    </ul>
                </div>

            </header>

            <!-- Content Area -->
            <main class="p-6 flex-1">
                @yield('pagename')
                @yield('filter')
                @yield('dashboard')
                @yield('filter2')
                @yield('contents')
            </main>
        </div>
    </div>

    @yield('javascripts')
    <script src="resources/js/global.js"></script>
</body>

</html>
