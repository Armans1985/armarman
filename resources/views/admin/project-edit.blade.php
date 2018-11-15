@extends('layouts.app')

@section('title', 'Project edit')

@section('page-name', 'Project add new update')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
            <form action="{{ route('project.update', $edit->id) }}" method="post" role="form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" value="{{$edit->title}}" id="title" class="form-control" placeholder="Enter Title">
                </div>
                <div class="form-group">
                    <label for="url">Url</label>
                    <input type="text" name="url" value="{{ $edit->url }}" id="url" class="form-control" placeholder="Enter url">
                </div>
                <div class="form-group">
                    <label for="poster">Poster</label>
                    <input type="file" name="new_poster[]" multiple value="" id="poster"  class="form-control" placeholder="Enter poster">
                </div>
                <div class="form-group">
                    @foreach($edit->poster as $poster )
                    <img src="{{asset('images').'/'. $poster}}" alt="{{$poster}}" width="100" height="100">
                    <input type="hidden" name="poster[]" multiple value="{{$poster}}" id="poster" >
                     @endforeach
                </div>
                {{--<div class="form-group">--}}
                    {{--<label for="category_id">Category_id</label>--}}
                    {{--<input type="text" name="category_id" value="{{ $edit->category_id }}" id="category_id" class="form-control" placeholder="Enter category_id">--}}
                {{--</div>--}}
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

