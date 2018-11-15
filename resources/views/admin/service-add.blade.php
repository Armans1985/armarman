@extends('layouts.app')

@section('title', 'Service add')

@section('page-name', 'Service add page')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
            <form action="{{ route('service.store') }}" method="post" role="form">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" value="{{ old('title') }}" id="title" class="form-control" placeholder="Enter title">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" value="{{ old('description') }}" id="description" class="form-control" placeholder="Enter description">
                </div>
                <div class="form-group">
                    <label for="text">Description</label>
                    <textarea name="text" id="text" class="form-control" rows="10" placeholder="Enter text">{{ old('text') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="icon">Icon</label>
                    <input type="text" name="icone" value="{{ old('icone') }}" id="icon" class="form-control" placeholder="Enter icon">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Add service</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        CKEDITOR.replace('text');
    </script>
@endsection