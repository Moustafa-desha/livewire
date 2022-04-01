<div>
        @if(session()->has('message_success'))
            <div class="alert alert-success" role="alert">
                {{ session('message_success') }}
            </div>

        @elseif(session()->has('message_error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('message_error') }}
                </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <b>Posts</b>
                        <a href="javascript:void(0);" wire:click="create_post" class="btn btn-primary btn-sm" style="float: right">Create Post</a>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Owner</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($posts as $post)
                                    <tr>
                                        <td><img src="{{ asset("assets/images/$post->image") }}" style="width: 150px;height: 100px;display: block;"></img></td>
                                        <td>
                                            <a href="javascript:void(0);" wire:click="show_post({{ $post->id }})" style="text-decoration: none">
                                                {{ str_limit($post->title ,$limit = 30) }}
                                            </a>
                                        </td>
                                        <td>{{ $post->user->name }}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>
                                            <a href="javascript:void(0);" wire:click="edit_post({{$post->id}});" class="btn btn-info btn-sm">Edit</a>
                                            <a href="javascript:void(0);" wire:click="delete_post({{$post->id}});" class="btn btn-danger btn-sm"
                                               onclick="confirm('Are You Sure?'); return false;">Delete</a>
                                        </td>
                                    </tr>
                                @empty
                                    <span class="alert-danger"> No Post's Found </span>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div style="float: right">
                            {{ $posts->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>


</div>
