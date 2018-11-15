@extends('layouts.app')

@section('title', 'Category add')

@section('page-name', 'Category add page')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
            <form action="{{ route('profession.store') }}" method="post" role="form">
                @csrf
                <div class="form-group">
                    <label for="name">Name Profession</label>
                    <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Add profession</button>
                </div>
            </form>
        </div>
    </div>
@endsection

