@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    All services from trash
                </div>
                <div class="panel-body" id="sortable">
                    @if(isset($all_trashed_members) && is_object($all_trashed_members))
                        <table width="100%" class="table table-striped table-bordered table-hover"
                               id="dataTables-example">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>facebook_link</th>
                                <th>twitter_link</th>
                                <th>gplus_link</th>
                                <th>inkedin_link</th>
                                <th>Profession</th>
                                <th>Restore</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($all_trashed_members as $item)
                                <tr class="odd gradeX">
                                    <td>{{ $item->id }}</td>
                                    @if(isset($item->path))

                                        <td>
                                            <img src="{{asset('images').'/'.$item->path}}" alt="" width="80" height="60">
                                        </td>
                                    @else
                                        <td>null</td>
                                    @endif
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->facebook_link }}</td>
                                    <td>{{ $item->twitter_link }}</td>
                                    <td>{{ $item->gplus_link }}</td>
                                    <td>{{ $item->inkedin_link }}</td>
                                    @if(isset($item->profes->name))
                                        <td>{{$item->profes->name}}</td>
                                    @else
                                        <td>null</td>
                                    @endif
                                    <td>
                                        <a href="{{ route('member.restore', $item->id) }}" class="btn btn-success btn-sm"><i class="fa fa-share-square-o fa-fw"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{ route('member.remove', $item->id) }}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span></a>
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