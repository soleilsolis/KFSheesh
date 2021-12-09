<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KF.Sheesh Admin</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="/css/{{ $page }}.css" class="stylesheet">
    <link rel="stylesheet" type="text/css" href="\semantic\dist\components\button.min.css">
    <link rel="stylesheet" type="text/css" href="\semantic\dist\components\dimmer.min.css">
    <link rel="stylesheet" type="text/css" href="\semantic\dist\components\dropdown.min.css">
    <link rel="stylesheet" type="text/css" href="\semantic\dist\components\form.min.css">
    <link rel="stylesheet" type="text/css" href="\semantic\dist\components\modal.min.css">
    <link rel="stylesheet" type="text/css" href="\semantic\dist\components\segment.min.css">
    <link rel="stylesheet" type="text/css" href="\semantic\dist\components\table.min.css">
    <link rel="stylesheet" type="text/css" href="\semantic\dist\components\transition.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
</head>
<body>

    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span>△</span><span>KF.Sheesh</span></h2>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a class="menu-item dashboard" href="/admin/dashboard"><span class="las la-igloo"></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="menu-item clients" href="/admin/clients"><span class="las la-users"></span>
                        <span>Clients</span>
                    </a>
                </li>
                <li>
                    <a class="menu-item projects" href="/admin/projects"><span class="las la-tasks"></span>
                        <span>Projects</span>
                    </a>
                </li>
                <li>
                    <a class="menu-item" href="/app/user/logout"><span class="las la-sign-out-alt"></span>
                        <span>Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>

                @yield('title')
            </h2>

            @if ($page != 'dashboard')

                <div class="search-wrapper">
                    <span class="las la-search"></span>
                    <input type="search" placeholder="Search here">
                </div>

            @endif

            <div class="user-wrapper">
                <img src="/Images/admin.png" width="40px" height="40px" alt="admin">
                <div>
                    <h4>{{ session('user')->full_name }}</h4>
                    <small>Super Admin</small>
                </div>
        </header>



        <main>

            @yield('content')

        </main>

    </div>

    <script src="\js\jquery.min.js"></script>
    <script src="\semantic\dist\components\dimmer.min.js"></script>
    <script src="\semantic\dist\components\dropdown.min.js"></script>
    <script src="\semantic\dist\components\form.min.js"></script>
    <script src="\semantic\dist\components\modal.min.js"></script>
    <script src="\semantic\dist\components\transition.min.js"></script>
    <script>

        document.querySelector('.menu-item.{{ $page }}').classList.add('active');

    </script>
    <script src="/js/submit-form-v2.js"></script>

    @yield('js')


</body>
</html>
