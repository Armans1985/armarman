@extends('layouts.app')

@section('title', 'Service list')

@section('page-name', 'Service list')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    All service list
                    <a href="{{ route('service.create') }}" class="btn btn-primary pull-right btn-sm" role="button"
                       style="margin: -5px;">Add new service</a>
                </div>
                <div class="panel-body" id="sortable">
                    @if(isset($services) && is_object($services))
                        <table width="100%" class="table table-striped table-bordered table-hover"
                               id="dataTables-example">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Text</th>
                                <th>Icon</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($services as $service)
                                <tr class="odd gradeX">
                                    <td>{{ $service->id }}</td>
                                    <td>{{ $service->title }}</td>
                                    <td>{{ mb_strimwidth($service->description, 0, 70, '...') }}</td>
                                    <td>{!! mb_strimwidth($service->text, 0, 200, '...') !!}</td>
                                    <td><i class="fa {{ $service->icone }} fa-fw fa-3x"></i></td>
                                    <td><a href="{{ route('service.edit', $service->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit fa-fw"></i></a></td>
                                    <td>
                                        <form action="{{ route('service.destroy', $service->id) }}" method="post" onsubmit="return confirm('Are you sure you want to send the service to the trash?')">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o fa-fw"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $services->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div id="load" data-sotr-order-image>
        <i class="fa fa-spinner fa-spin"></i>
    </div>
@endsection