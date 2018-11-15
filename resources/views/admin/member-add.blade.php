@extends('layouts.app')

@section('title', 'Member add')

@section('page-name', 'Member add page')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
            <form action="{{ route('member.store') }}" method="post" role="form" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="path">Image</label>
                    <input type="file" name="path" value="" id="path" class="form-control" placeholder="Enter Image">
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="facebook_link">facebook_link</label>
                    <input type="text" name="facebook_link" value="{{ old('facebook_link') }}" id="facebook_link" class="form-control" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="twitter_link">twitter_link</label>
                    <input type="text" name="twitter_link" value="{{ old('twitter_link') }}" id="twitter_link" class="form-control" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="gplus_link">gplus_link</label>
                    <input type="text" name="gplus_link" value="{{ old('gplus_link') }}" id="gplus_link" class="form-control" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="inkedin_link">inkedin_link</label>
                    <input type="text" name="inkedin_link" value="{{ old('inkedin_link') }}" id="inkedin_link" class="form-control" placeholder="Enter name">
                </div>
                {{--<div class="form-group">--}}
                    {{--<label for="profession_id">profession_id</label>--}}
                    {{--<input type="text" name="profession_id" value="{{ old('profession_id') }}" id="profession_id" class="form-control" placeholder="Enter name">--}}
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

