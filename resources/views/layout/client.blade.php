<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KF.Sheesh Client</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="/css/user.css" class="stylesheet">
    <link rel="stylesheet" type="text/css" href="\semantic\dist\components\button.min.css">
    <link rel="stylesheet" type="text/css" href="\semantic\dist\components\dimmer.min.css">
    <link rel="stylesheet" type="text/css" href="\semantic\dist\components\dropdown.min.css">
    <link rel="stylesheet" type="text/css" href="\semantic\dist\components\form.min.css">
    <link rel="stylesheet" type="text/css" href="\semantic\dist\components\grid.min.css">
    <link rel="stylesheet" type="text/css" href="\semantic\dist\components\modal.min.css">
    <link rel="stylesheet" type="text/css" href="\semantic\dist\components\segment.min.css">
    <link rel="stylesheet" type="text/css" href="\semantic\dist\components\table.min.css">
    <link rel="stylesheet" type="text/css" href="\semantic\dist\components\transition.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .max-h{
            max-height: 73vh;
            overflow-y:scroll;
        }
    </style>
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
                    <a href="/client/dashboard" class="menu-item dashboard"><span class="las la-user-circle"></span>
                        <span id="">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="/client/projects" class="menu-item projects"><span class="las la-tasks"></span>
                        <span>My Projects</span>
                    </a>
                </li>
                <li>
                    <a href="/client/itpersonality" class="menu-item itpersonality"><span class="las la-brain"></span>
                        <span>IT Personality Quiz</span>
                    </a>
                </li>
                <li>
                    <a href="https://my.forms.app/form/61a8de9dcbde252e90cffdd9" target="_blank" class="menu-item"><span class="lab la-wpforms"></span>
                        <span>User Feedback</span>
                    </a>
                </li>
                <li>
                    <a href="/client/settings" class="menu-item settings"><span class="las la-cog"></span>
                        <span>Account Settings</span>
                    </a>
                </li>
                <li>
                    <a href="/app/user/logout"><span class="las la-sign-out-alt"></span>
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

            <div class="user-wrapper">
                <img src="/Images/user.png" width="40px" height="40px" alt="admin">
                <div>
                    <h4>{{ session('user')->full_name }}</h4>
                    <small>KF.Sheesh Client</small>
                </div>
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
