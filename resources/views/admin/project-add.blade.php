@extends('layouts.app')

@section('title', 'Project add')

@section('page-name', 'Project add page')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
            <form action="{{ route('project.store') }}" method="post" role="form" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" value="{{ old('title') }}" id="title" class="form-control" placeholder="Enter title">
                </div>
                <div class="form-group">
                    <label for="url">Url</label>
                    <input type="text" name="url" value="{{ old('url') }}" id="url" class="form-control" placeholder="Enter url">
                </div>

                {{--<div class="form-group">--}}
                    {{--<label for="category_id">Category_id</label>--}}
                    {{--<input type="text" name="category_id" value="{{ old('category_id') }}" id="category_id" class="form-control" placeholder="Enter category_id">--}}
                {{--</div>--}}
                <div class="form-group">
                    <label for="poster">Poster</label>
                    <input type="file" multiple name="poster[]" value="" id="poster" class="form-control" placeholder="Enter poster">
                </div>
                @if(isset($categories) && is_object($categories))
                    <div class="form-group">
                        <label for="category">Enter category</label>
                        <select name="category_id" id="category" class="form-control">
                            <option value="">Choose category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Add Project</button>
                </div>
            </form>
        </div>
    </div>
@endsection

