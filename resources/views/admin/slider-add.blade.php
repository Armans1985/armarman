@extends('layouts.app')

@section('title', 'Slider list')

@section('page-name', 'Add a new image to the carousel')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
            <form action="{{ route('slider.store') }}" method="post" role="form" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="add-image">New image</label>
                    <input type="file" name="images[]" id="add-image" multiple class="filestyle" data-buttonBefore="true" data-buttonName="btn-primary">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Add images</button>
                </div>
            </form>
        </div>
    </div>
@endsection