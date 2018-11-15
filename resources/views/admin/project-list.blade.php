@extends('layouts.app')

@section('title', 'Project list')

@section('page-name', 'Project list')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    All Team list
                    <a href="{{ route('project.create') }}" class="btn btn-primary pull-right btn-sm" role="button"
                       style="margin: -5px;">Add new Member</a>
                </div>
                <div class="panel-body" id="sortable">
                    @if(isset($projects) && is_object($projects))
                        <table width="100%" class="table table-striped table-bordered table-hover"
                               id="dataTables-example">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Url</th>
                                <th>Poster</th>
                                <th>Category Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($projects as $project)
                                <tr class="odd gradeX">
                                    <td>{{ $project->id }}</td>
                                    <td>{{ $project->title }}</td>
                                    <td><a href="{{ $project->url }}">{{ $project->title }}</a></td>
                                    <td>
                                        @foreach($project->poster as $poster)
                                            <img src="{{ asset('images') . '/' . $poster}}" alt="{{ $poster}} " width="100" height="100">
                                        @endforeach
                                    </td>
                                    @if(isset($project->category->name))
                                    <td>{{$project->category->name}}</td>
                                        @else
                                        <td>null</td>
                                    @endif
                                    <td><a href="{{ route('project.edit', $project->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit fa-fw"></i></a></td>
                                    <td>
                                        <form action="{{ route('project.destroy', $project->id) }}" method="post" onsubmit="return confirm('Are you sure you want to send the catrgory to the trash?')">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o fa-fw"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $projects->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div id="load" data-sotr-order-image>
        <i class="fa fa-spinner fa-spin"></i>
    </div>
@endsection