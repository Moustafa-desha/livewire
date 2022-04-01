{{--@extends('layouts.app')--}}
{{--@section('content')--}}
{{--<div class="row justify-content-center">--}}
{{--    <div class="col-12">--}}
{{--        <div class="card">--}}
{{--            <div class="card-header">--}}
{{--               <b>Posts</b>--}}
{{--                <a href="{{route('posts.create')}}" class="btn btn-primary btn-sm" style="float: right">Create Post</a>--}}
{{--            </div>--}}
{{--                <div class="card-body">--}}

{{--                    <div class="table-responsive">--}}
{{--                        <table class="table">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th>Image</th>--}}
{{--                                <th>Title</th>--}}
{{--                                <th>Owner</th>--}}
{{--                                <th>Category</th>--}}
{{--                                <th>Action</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            @forelse($posts as $post)--}}
{{--                                <tr>--}}
{{--                                    <td><img src="{{ asset("assets/images/$post->image") }}" style="width: 150px;height: 100px;display: block;"></img></td>--}}
{{--                                    <td>--}}
{{--                                        <a href="{{ route('posts.show',$post->id) }}" style="text-decoration: none">--}}
{{--                                            {{ str_limit($post->title ,$limit = 30) }}--}}
{{--                                        </a>--}}
{{--                                    </td>--}}
{{--                                    <td>{{ $post->user->name }}</td>--}}
{{--                                    <td>{{ $post->category->name }}</td>--}}
{{--                                    <td>--}}
{{--                                        <a href="{{route("posts.edit",$post->id)}}" class="btn btn-info btn-sm">Edit</a>--}}
{{--                                        <a href="javascript:void(0)" class="btn btn-danger btn-sm"--}}
{{--                                           onclick="if (confirm('Are You Sure')) {document.getElementById('delete-{{$post->id}}').submit();}--}}
{{--                                               else {return false;}">Delete</a>--}}
{{--                                        <form action="{{ route('posts.destroy',$post->id) }}"--}}
{{--                                              method="post" id="delete-{{$post->id}}"--}}
{{--                                              style="display: none">--}}
{{--                                            @csrf--}}
{{--                                            @method('DELETE')--}}
{{--                                        </form>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            @empty--}}
{{--                                <span class="alert-danger"> No Post's Found </span>--}}
{{--                            @endforelse--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}

{{--                    <div style="float: right">--}}
{{--                        {{$posts->links()}}--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}
