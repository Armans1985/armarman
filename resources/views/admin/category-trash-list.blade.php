@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    All services from trash
                </div>
                <div class="panel-body" id="sortable">
                    @if(isset($all_trashed_category) && is_object($all_trashed_category))
                        <table width="100%" class="table table-striped table-bordered table-hover"
                               id="dataTables-example">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Restore</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($all_trashed_category as $item)
                                <tr class="odd gradeX">
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <a href="{{ route('category.restore', $item->id) }}" class="btn btn-success btn-sm"><i class="fa fa-share-square-o fa-fw"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{ route('category.remove', $item->id) }}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span></a>
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