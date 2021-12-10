@php
	use App\Models\User;
@endphp

@extends('layout.admin')

@section('title')
	Clients
@endsection

@section('content')
<div class="recent-grid">
	<div class="projects">
		<div class="card">
			<div class="card-header">
				<h2>Clients List</h2>
			</div>

			<div class="card-body max-h">
				<div class="table-responsive">
					<table class="ui very basic padded stackable selectable table">
						<thead>
							<tr>
								<th class="collapsing">Username</th>
								<th>Name</th>
								<th class="right aligned">Date Registered</th>
							</tr>
						</thead>

						<tbody>
							@foreach (User::where('type','=','client')->get() as $user)
								<tr class="submit-form" data-id="{{ $user->id }}" data-send="/app/user/edit">
									<td class="collapsing">{{ $user->name }}</td>
									<td>{{ $user->full_name }}</td>
									<td class="right aligned" style="display: block">{{ $user->created_at }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="ui small basic client modal">
	<div class="content">
		<div class="ui segments" style="color: black !important">
			<div class="ui segment">
				<div class="header">
					<h2>Edit Client</h2>
				</div>
				<br />
				<form class="ui small form" name="clientForm" id="clientForm">
					@csrf
					<input type="hidden" name="id" id="id">
					<div class="field">
						<label>Username</label>
						<input type="text" name="name" id="name">
					</div>

					<div class="field">
						<label>Password</label>
						<input type="password" name="password" id="password">
					</div>

					<div class="field">
						<label>Full Name</label>
						<input type="text" name="full_name" id="full_name">
					</div>

					<div class="field">
						<label>Email Address</label>
						<input type="email" name="email" id="email">
					</div>

					<div class="field">
						<label for="">Gender</label>
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

					<div class="field">
						<label for="">Account Type</label>
						<div class="ui dropdown selection" tabindex="0">
							<select class="ui dropdown" name="type" id="type">
								<option value="client">Client</option>
								<option value="admin">Admin</option>
							</select>
							<i class="dropdown icon"></i>
							<div class="text">Client</div>
							<div class="menu type-select" tabindex="-1">
								<div class="item active selected" data-value="client" data-text="Client">Client</div>
								<div class="item" data-value="admin" data-text="Admin">Admin</div>
							</div>
						</div>
					</div>
				</form>

				<br />

				<p style="text-align: right">
					<button class="ui red circular button delete-button">Delete</button>
					<button class="ui black circular button submit-form" data-form="clientForm" data-send="/app/user/update">Save</button>
				</p>
			</div>
		</div>
	</div>
</div>

<div class="ui basic tiny delete modal">

    <div class="content">
		<div class="ui segment" style="color: black !important">
            <div class="header">
                <h2>Delete Client?</h2>
                <br />
				<p style="text-align: right">
                    <button class="ui black circular button" onclick="$('.delete.modal').modal('hide')">No!</button>
                    <button class="ui red circular button submit-form" data-form="clientForm" data-send="/app/user/destroy">Yes!</button>
				</p>
            </div>
        </div>
    </div>

	
  
@endsection

@section('js')
	<script>

		$('.delete-button').click(function(){
        	$('.delete.modal').modal('show');
   		});
		$('.dropdown').dropdown();

	</script>
@endsection
