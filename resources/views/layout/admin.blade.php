<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KF.Sheesh Admin</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="/css/{{ $page }}.css" class="stylesheet">
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
                        <span>Dashboard</span></a>
                </li>
                <li>
                    <a class="menu-item clients" href="/admin/clients"><span class="las la-users"></span>
                        <span>Clients</span></a>
                </li>
                <li>
                    <a class="menu-item projects" href="/admin/projects"><span class="las la-tasks"></span>
                        <span>Projects</span></a>
                </li>
                <li>
                    <a class="menu-item" href="/admin/records"><span class="las la-cog"></span>
                        <span>Record Maintenance</span></a>
                </li>
                <li>
                    <a class="menu-item" href="/admin/logout"><span class="las la-sign-out-alt"></span>
                        <span>Sign Out</span></a>
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

            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search here">
            </div>

            <div class="user-wrapper">
                <img src="/Images/admin.png" width="40px" height="40px" alt="admin">
                <div>
                    <h4>Kf.Sheesh</h4>
                    <small>Super Admin</small>
                </div>
        </header>



        <main>

            @yield('content')

        </main>

    </div>

    <script>

        document.querySelector('.menu-item.{{ $page }}').classList.add('active');

    </script>

</body>
</html>
