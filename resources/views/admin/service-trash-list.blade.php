@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    All services from trash
                </div>
                <div class="panel-body" id="sortable">
                    @if(isset($all_trashed_services) && is_object($all_trashed_services))
                        <table width="100%" class="table table-striped table-bordered table-hover"
                               id="dataTables-example">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Text</th>
                                <th>Icon</th>
                                <th>Restore</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($all_trashed_services as $item)
                                <tr class="odd gradeX">
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ mb_strimwidth($item->description, 0, 70, '...') }}</td>
                                    <td>{!! mb_strimwidth($item->text, 0, 200, '...') !!}</td>
                                    <td><i class="fa {{ $item->icone }} fa-fw fa-3x"></i></td>
                                    <td>
                                        <a href="{{ route('service.restore', $item->id) }}" class="btn btn-success btn-sm"><i class="fa fa-share-square-o fa-fw"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{ route('service.remove', $item->id) }}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span></a>
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