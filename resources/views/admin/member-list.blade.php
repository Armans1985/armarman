@extends('layouts.app')

@section('title', 'Team list')

@section('page-name', 'Team list')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    All Team list
                    <a href="{{ route('member.create') }}" class="btn btn-primary pull-right btn-sm" role="button"
                       style="margin: -5px;">Add new Member</a>
                </div>
                <div class="panel-body" id="sortable">
                    @if(isset($members) && is_object($members))
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
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($members as $member)
                                <tr class="odd gradeX">
                                    <td>{{ $member->id }}</td>
                                    @if(isset($member->path))

                                    <td>
                                            <img src="{{asset('images').'/'.$member->path}}" alt="" width="80" height="60">
                                        </td>
                                        @else
                                        <td>null</td>
                                    @endif
                                    <td>{{ $member->name }}</td>
                                    <td>{{ $member->facebook_link }}</td>
                                    <td>{{ $member->twitter_link }}</td>
                                    <td>{{ $member->gplus_link }}</td>
                                    <td>{{ $member->inkedin_link }}</td>
                                    @if(isset($member->profes->name))
                                        <td>{{$member->profes->name}}</td>
                                    @else
                                        <td>null</td>
                                    @endif

                                    <td><a href="{{ route('member.edit', $member->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit fa-fw"></i></a></td>
                                    <td>
                                        <form action="{{ route('member.destroy', $member->id) }}" method="post" onsubmit="return confirm('Are you sure you want to send the catrgory to the trash?')">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o fa-fw"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $members->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div id="load" data-sotr-order-image>
        <i class="fa fa-spinner fa-spin"></i>
    </div>
@endsection