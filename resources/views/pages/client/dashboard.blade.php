@extends('layout.client')

@section('content')

<div class="recent-grid">
    <div class="profile">
        <div class="card">
            <div class="card-header">
                <h2>My Profile</h2>
                <a href="/client/settings" class="href"><button>Edit Profile <span class="las la-edit">
                </span></button></a>
            </div>
            <div class="card-body">
                <div class="ui stackable grid">

                    <div class="three wide column">
                        <img src="/Images/user.png" alt="" style="width: 100%">
                    </div>
                    <div class="eleven wide column">

                        <h2>{{ session('user')->full_name }}</h2>
                        <p>{{ '@'.session('user')->name }}</p>
                        <p>KF.Sheesh Client</p>

                    </div>

                </div>
                <div class="table-responsive">
                    <table class="clientprof" width="100%">
                        <thead>
                            
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection