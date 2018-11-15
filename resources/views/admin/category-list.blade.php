@extends('layouts.app')

@section('title', 'Category list')

@section('page-name', 'Category list')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    All Category list
                    <a href="{{ route('category.create') }}" class="btn btn-primary pull-right btn-sm" role="button"
                       style="margin: -5px;">Add new Category</a>
                </div>
                <div class="panel-body" id="sortable">
                    @if(isset($categories) && is_object($categories))
                        <table width="100%" class="table table-striped table-bordered table-hover"
                               id="dataTables-example">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr class="odd gradeX">
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td><a href="{{ route('category.edit', $category->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit fa-fw"></i></a></td>
                                    <td>
                                        <form action="{{ route('category.destroy', $category->id) }}" method="post" onsubmit="return confirm('Are you sure you want to send the catrgory to the trash?')">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o fa-fw"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div id="load" data-sotr-order-image>
        <i class="fa fa-spinner fa-spin"></i>
    </div>
@endsection