@extends('layouts.app')

@section('title', 'Category edit')

@section('page-name', 'Category add new update')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
            <form action="{{ route('profession.update', $edit->id) }}" method="post" role="form">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{$edit->name}}" id="name" class="form-control" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Add profession</button>
                </div>
            </form>
        </div>
    </div>
@endsection

