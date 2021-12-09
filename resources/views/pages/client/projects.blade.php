@php
	use App\Models\Project;
	use App\Models\ProjectType;
@endphp

@extends('layout.client')

@section('title')
    My Projects
@endsection

@section('content')

<div class="recent-grid">
    <div class="projects">
        <div class="card">
            <div class="card-header">
                <h2></h2>
                <a class="href submit-form" data-send="/app/project/create" data-id="2"><button>New Project <span class="las la-edit">
                </span></button></a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="ui very basic padded stackable selectable table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Project Type</th>
                                <th class="right aligned">Date Submitted</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Project::where('user_id','=',session('user')->id)->get() as $project)
                                <tr class="submit-form" data-id="{{ $project->id }}" data-send="/app/project/edit">
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->projectType->name }}</td>
                                    <td class="right aligned" style="display: block">{{ $project->created_at }}</td>
                                </tr>    
                            @endforeach                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="ui small basic main modal">
	<div class="content">
		<div class="ui segments" style="color: black !important">
			<div class="ui segment">
				<div class="header">
					<h2 class="modal-title">View Project</h2>
				</div>
				<br />
				<form class="ui small form" name="projectForm" id="projectForm">
					@csrf
					<input type="hidden" name="id" id="id">
					<div class="field">
						<label>Title</label>
						<input type="text" name="name">
					</div>
                 
					<div class="field">
                        <label for="">Project Type</label>
                        <div class="ui dropdown selection" tabindex="0">
                            <select name="project_type_id" id="project_type_id">
                                @foreach (ProjectType::all() as $projectType)
                                    <option value="{{ $projectType->id }}">{{ $projectType->name }}</option>
                                @endforeach
                            </select>
                            <i class="dropdown icon"></i>
                            <div class="text">Web App</div>
                            <div class="menu project_type-select" tabindex="-1">
                                @foreach (ProjectType::all() as $projectType)
                                    <div class="item" data-value="{{ $projectType->id }}" data-text="{{ $projectType->name }}">{{ $projectType->name }}</div>
                                @endforeach                                   
                            </div>
                        </div>
                    </div>

                    <div class="field">
						<label>Company Name</label>
						<input type="text" name="company_name">
					</div>
                    <div class="field">
						<label>Description</label>
						<textarea name="description" id=""></textarea>
					</div>
                    <div class="field">
						<label>Status</label>
						<p class="status"></p>
					</div>
	            </form>
				<br />
				<p style="text-align: right">
                    <button class="ui red circular button delete-button">Delete</button>
					<button class="ui black circular button submit-form projectSave" data-form="projectForm" data-send="/app/project/update">Save</button>
				</p>
            </div>
        </div>
    </div>
</div>
<div class="ui basic tiny delete modal">
    
    <div class="content">
		<div class="ui segment" style="color: black !important">
            <div class="header">
                <h2>Delete Project?</h2>
                <br />
				<p style="text-align: right">
                    <button class="ui red circular button submit-form" data-form="projectForm" data-send="/app/project/destroy">Yes!</button>
				</p>
            </div>
        </div>
    </div>

</div>

@endsection

@section('js')

<script>

    $('.dropdown').dropdown();
    $('.delete-button').click(function(){
        $('.delete.modal').modal('show');
    });

</script>

@endsection