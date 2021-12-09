@php
	use App\Models\Project;
	use App\Models\ProjectType;
@endphp

@extends('layout.admin')

@section('title')
    Projects
@endsection

@section('content')

<div class="recent-grid">
    <div class="projects">
        <div class="card">
            <div class="card-header">
                <h2>Projects List</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="ui very basic padded stackable selectable table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Project Type</th>
                                <th>Company Name</th>
                                <th class="right aligned">Date Submitted</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Project::all() as $project)
                                <tr class="submit-form" data-id="{{ $project->id }}" data-send="/app/project/edit">
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->projectType->name }}</td>
                                    <td>{{ $project->company_name }}</td>
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
					<h2>View Project</h2>
				</div>
				<br />
				<form class="ui small form" name="projectForm" id="projectForm">
					@csrf
					<input type="hidden" name="id" id="id">
					<div class="field">
						<label>Title</label>
						<p class="name"></p>
					</div>
                    <div class="field">
						<label>Project Type</label>
						<p class="project_type"></p>
					</div>
                    <div class="field">
						<label>Company Name</label>
						<p class="company_name"></p>
					</div>
                    <div class="field">
						<label>Description</label>
						<p class="description"></p>
					</div>
                    <div class="field">
						<label>Status</label>
						<p class="status"></p>
					</div>
	            </form>
				<br />
				<p style="text-align: right">
                    <button class="ui red circular button delete-button">Delete</button>
					<button class="ui black circular button finish-button">Finish</button>
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

<div class="ui basic tiny finish modal">
    
    <div class="content">
		<div class="ui segment" style="color: black !important">
            <div class="header">
                <h2>Finish Project?</h2>
                <br />
				<p style="text-align: right">
                    <button class="ui black circular button submit-form" data-form="projectForm" data-send="/app/project/update">Yes!</button>
				</p>
            </div>
        </div>
    </div>

</div>

@endsection

@section('js')

<script>

    $('.delete-button').click(function(){
        $('.delete.modal').modal('show');
    });
    $('.finish-button').click(function(){
        $('.finish.modal').modal('show');
    });

</script>

@endsection