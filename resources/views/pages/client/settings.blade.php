@extends('layout.client')

@section('title')
    Account Settings
@endsection

@section('content')
<div class="recent-grid">
    <div class="projects">
        <div class="card" >

            <div class="card-body" >
                <form class="ui small form" name="clientForm" id="clientForm" style="max-width: 600px; margin: auto">
					@csrf
					<input type="hidden" name="id" id="id" value="{{ session('user')->id }}">
					<div class="field">
						<label>Username</label>
						<input type="text" name="name" id="name" value="{{ session('user')->name }}">
					</div>
	
					<div class="field">
						<label>Password</label>
						<input type="password" name="password" id="password">
					</div>

					<div class="field">
						<label>Full Name</label>
						<input type="text" name="full_name" id="full_name" value="{{ session('user')->full_name }}">
					</div>
	
					<div class="field">
						<label>Email Address</label>
						<input type="email" name="email" id="email" value="{{ session('user')->email }}">
					</div>
	
					<div class="field">
						<label>Gender</label>
						<div class="ui dropdown selection" tabindex="0">
							<select name="gender" id="gender">
								<option value="Male">Male</option>
								<option value="Female">Female</option>
								<option value="Other">Other</option>
							</select>

							<i class="dropdown icon"></i>

							<div class="text">Male</div>

							<div class="menu gender-select" tabindex="-1">
								<div class="item active selected" data-value="Male" data-text="Male">Male</div>
								<div class="item" data-value="Female" data-text="Female">Female</div>
								<div class="item" data-value="Other" data-text="Other">Other</div>
							</div>
						</div>
					</div>
                    <p style="text-align: center">
                        <a class="ui black circular button submit-form" data-form="clientForm" data-send="/app/user/update">Save</a>
    
                    </p>
				</form>
               
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $('.dropdown').dropdown();
    </script>
@endsection