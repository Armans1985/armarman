@extends('layouts.app')

@section('title', 'Profession list')

@section('page-name', 'Profession list')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    All Profession list
                    <a href="{{ route('profession.create') }}" class="btn btn-primary pull-right btn-sm" role="button"
                       style="margin: -5px;">Add new Profession</a>
                </div>
                <div class="panel-body" id="sortable">
                    @if(isset($professions) && is_object($professions))
                        <table width="100%" class="table table-striped table-bordered table-hover"
                               id="dataTables-example">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Profession</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($professions as $profession)
                                <tr class="odd gradeX">
                                    <td>{{ $profession->id }}</td>
                                    <td>{{ $profession->name }}</td>
                                    <td><a href="{{ route('profession.edit', $profession->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit fa-fw"></i></a></td>
                                    <td>
                                        <form action="{{ route('profession.destroy', $profession->id) }}" method="post" onsubmit="return confirm('Are you sure you want to send the profession to the trash?')">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o fa-fw"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $professions->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div id="load" data-sotr-order-image>
        <i class="fa fa-spinner fa-spin"></i>
    </div>
@endsection