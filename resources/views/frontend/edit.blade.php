@extends('layouts.app')
@section('content')

    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <b>Edit Post</b>
                    <a href="{{route('posts.index')}}" class="btn btn-primary btn-sm" style="float: right">Posts</a>
                </div>
                <div class="card-body">

                    <form action="{{route('posts.update',$oldPost->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label for="title"> Title </label>
                            <input type="text"  name="title" value="{{ old('title',$oldPost->title) }}" class="form-control">
                            @error('title')<span class="text-danger">{{$message}}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="category"> Category </label>
                            <select  name="category" class="form-control">
                                <option>Choose Category</option>

                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ old('category',$oldPost->category_id) == $cat->id ? 'selected' : ''}}> {{ $cat->name }} </option>
                                @endforeach
                            </select>
                            @error('category')<span class="text-danger"> {{$message}} </span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="body"> Body </label>
                            <textarea  name="body" class="form-control" rows="5"> {{ old('body',$oldPost->body) }} </textarea>
                            @error('body')<span class="text-danger"> {{$message}} </span>@enderror
                        </div>

                        @if($oldPost->image !== '')
                            <div class="form-group my-2">
                                <img src="{{ asset('assets/images/'.$oldPost->image) }}" alt="{{$oldPost->title}}" width="100px">
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="image"> Image </label>
                            <input type="file" name="image" class="form-control">
                            @error('image')<span class="text-danger"> {{$message}} </span>@enderror
                        </div>

                        <button type="submit" name="save" class="btn btn-primary mt-4"> Update Post </button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
