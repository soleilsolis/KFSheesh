@php
    use App\Models\User;
    use App\Models\Project;
    use Carbon\Carbon;
@endphp

@extends('layout.admin')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="cards">
    <div class="card-single">
        <div>
            <h1>{{ User::where('type','!=','admin')->where('created_at','>', Carbon::now()->subDays(30))->count() ?? '--' }}</h1>
            <span>New Clients</span>
        </div>

        <div>
            <span class="las la-user"></span>
        </div>
    </div>

    <div class="card-single">
        <div>
            <h1>{{ User::where('type','!=','admin')->count() ?? '--' }}</h1>
            <span>Total Clients</span>
        </div>

        <div>
            <span class="las la-users"></span>
        </div>
    </div>

    <div class="card-single">
        <div>
            <h1>{{ Project::where('created_at','>', Carbon::now()->subDays(30))->count() ?? '--' }}</h1>
            <span>New Projects</span>
        </div>

        <div>
            <span class="las la-clipboard-list"></span>
        </div>
    </div>

    <div class="card-single">
        <div>
            <h1>{{ Project::count() ?? '--' }}</h1>
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
                <a href="projects" class="href"><button>See all <span class="las la-arrow-right">
                </span></button></a>
            </div>

            <div class="card-body ">
                <div class="table-responsive">
                    <table class="ui very basic padded stackable selectble table">
                        <thead>
                            <tr>
                                <th>Project Title</th>
                                <th>Type</th>
                                <th>Status</th>
                            </tr>
                            <tbody>
                            @foreach (Project::limit(7)->get() as $project)
                                <tr>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->projectType->name }}</td>
                                    <td><span class="status purple"></span>
                                        {{ $project->status }}
                                    </td>
                                </tr>
                            @endforeach
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
                <a href="clients" class="href"><button>See all <span class="las la-arrow-right">
                </span></button></a>
            </div>

            <div class="card-body">
                @foreach (User::limit(7)->get() as $user)
                    <div class="customer">
                        <img src="Images/user.png" alt="" width="40px" height="40px">
                    </div>

                    <div>
                        <h4>{{ $user->name }}</h4>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
