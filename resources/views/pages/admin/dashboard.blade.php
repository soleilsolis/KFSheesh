@extends('layout.admin')

@section('title')
    Dashboard
@endsection

@section('content')

<div class="cards">
    <div class="card-single">
        <div>
            <h1>--</h1>
            <span>New Clients</span>
        </div>
        <div>
            <span class="las la-user"></span>
        </div>
    </div>

    <div class="card-single">
        <div>
            <h1>--</h1>
            <span>Total Clients</span>
        </div>
        <div>
            <span class="las la-users"></span>
        </div>
    </div>

    <div class="card-single">
        <div>
            <h1>--</h1>
            <span>New Projects</span>
        </div>
        <div>
            <span class="las la-clipboard-list"></span>
        </div>
    </div>

    <div class="card-single">
        <div>
            <h1>--</h1>
            <span>Total Projects</span>
        </div>
        <div>
            <span class="las la-tasks"></span>
        </div>
    </div>
</div>

<div class="recent-grid">
    <div class="projects">
        <div class="card">
            <div class="card-header">
                <h2>Recent Projects</h2>
                <a href="projectslist.html" class="href"><button>See all <span class="las la-arrow-right">
                </span></button></a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                <table width="100%">
                        <thead>
                            <tr>
                                <td>Project Title</td>
                                <td>Type</td>
                                <td>Status</td>
                            </tr>
                            <tbody>
                                <tr>
                                    <td>Sample Title</td>
                                    <td>Sample Type</td>
                                    <td><span class="status purple"></span>
                                    sample status
                                </td>
                                </tr>

                                <tr>
                                    <td>Sample Title</td>
                                    <td>Sample Type</td>
                                    <td><span class="status orange"></span>
                                    sample status
                                </td>
                                </tr>

                                <tr>
                                    <td>Sample Title</td>
                                    <td>Sample Type</td>
                                    <td><span class="status green"></span>
                                    sample status
                                </td>
                                </tr>

                                <tr>
                                    <td>Sample Title</td>
                                    <td>Sample Type</td>
                                    <td><span class="status purple"></span>
                                    sample status
                                </td>
                                </tr>

                                <tr>
                                    <td>Sample Title</td>
                                    <td>Sample Type</td>
                                    <td><span class="status orange"></span>
                                    sample status
                                </td>
                                </tr>

                                <tr>
                                    <td>Sample Title</td>
                                    <td>Sample Type</td>
                                    <td><span class="status green"></span>
                                    sample status
                                </td>
                                </tr>
                            </tbody>
                        </thead>
                </table>
                </div>
            </div>
        </div>
    </div>

    <div class="customers">
        <div class="card">
            <div class="card-header">
                <h2>New Clients</h2>
                <a href="clientslist.html" class="href"><button>See all <span class="las la-arrow-right">
                </span></button></a>
            </div>
            <div class="card-body">
                <div class="customer">
                    <img src="Images/user.png" alt="" width="40px" height="40px">
                </div>
                <div>
                    <h4>Sample Name</h4>
                </div>

                <div class="customer">
                    <img src="Images/user.png" alt="" width="40px" height="40px">
                </div>
                <div>
                    <h4>Sample Name</h4>
                </div>

                <div class="customer">
                    <img src="Images/user.png" alt="" width="40px" height="40px">
                </div>
                <div>
                    <h4>Sample Name</h4>
                </div>

                <div class="customer">
                    <img src="Images/user.png" alt="" width="40px" height="40px">
                </div>
                <div>
                    <h4>Sample Name</h4>
                </div>
            </div>

            <div>
            </div>
        </div>
    </div>
</div>

@endsection
