@extends('layouts.app')

@section('title', 'Member edit')

@section('page-name', 'Member add new update')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
            <form action="{{ route('member.update', $edit->id) }}" method="post" role="form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="new_path">Image</label>
                    <input type="file" name="new_path" value="" id="new_path" class="form-control" placeholder="Enter Image">
                </div>
                <div class="form-group">

                        <img src="{{asset('images').'/'. $edit->path}}" alt="{{$edit->path}}" width="100" height="100">
                        <input type="hidden" name="path" value="{{$edit->path}}" id="path" >

                </div>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{$edit->name}}" id="name" class="form-control" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="facebook_link">facebook_link</label>
                    <input type="text" name="facebook_link" value="{{ $edit->facebook_link }}" id="facebook_link" class="form-control" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="twitter_link">twitter_link</label>
                    <input type="text" name="twitter_link" value="{{ $edit->twitter_link }}" id="twitter_link" class="form-control" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="gplus_link">gplus_link</label>
                    <input type="text" name="gplus_link" value="{{ $edit->gplus_link }}" id="gplus_link" class="form-control" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="inkedin_link">inkedin_link</label>
                    <input type="text" name="inkedin_link" value="{{ $edit->inkedin_link }}" id="inkedin_link" class="form-control" placeholder="Enter name">
                </div>
                {{--<div class="form-group">--}}
                    {{--<label for="profession_id">profession_id</label>--}}
                    {{--<input type="text" name="profession_id" value="{{ $edit->profession_id }}" id="profession_id" class="form-control" placeholder="Enter name">--}}
                {{--</div>--}}
                @if(isset($profession) && is_object($profession))
                    <div class="form-group">
                        <label for="profession">Enter profession</label>
                        <select name="profession_id" id="profession" class="form-control">
                            <option value="">Choose category</option>
                            @foreach($profession as $profession)
                                <option value="{{ $profession->id }}">{{ $profession->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Add Member</button>
                </div>
            </form>
        </div>
    </div>
@endsection

