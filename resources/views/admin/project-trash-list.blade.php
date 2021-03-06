@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    All services from trash
                </div>
                <div class="panel-body" id="sortable">
                    @if(isset($all_trashed_project) && is_object($all_trashed_project))
                        <table width="100%" class="table table-striped table-bordered table-hover"
                               id="dataTables-example">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Url</th>
                                <th>Poster</th>
                                <th>Category Name</th>
                                <th>Restore</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($all_trashed_project as $item)
                                <tr class="odd gradeX">
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td><a href="{{ $item->url }}">{{ $item->title }}</a></td>
                                    <td>
                                        @foreach($item->poster as $poster)
                                            <img src="{{ asset('images') . '/' . $poster}}" alt="{{ $poster}} " width="100" height="100">
                                        @endforeach
                                    </td>
                                    @if(isset($item->category->name))
                                        <td>{{$item->category->name}}</td>
                                    @else
                                        <td>null</td>
                                    @endif
                                    <td>
                                        <a href="{{ route('project.restore', $item->id) }}" class="btn btn-success btn-sm"><i class="fa fa-share-square-o fa-fw"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{ route('project.remove', $item->id) }}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection