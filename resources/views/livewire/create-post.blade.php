<div>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <b>Create New Post</b>
                    <a href="javascript:void(0);" wire:click="posts" class="btn btn-primary btn-sm" style="float: right">Posts</a>
                </div>
                <div class="card-body">

                    <form wire:submit.prevent="save" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title"> Title </label>
                            <input type="text"  name="title" wire:model="title" class="form-control">
                            @error('title')<span class="text-danger">{{$message}}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="category"> Category </label>
                            <select  name="category" wire:model="category" class="form-control">
                                <option>Choose Category</option>

                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ old('category') == $cat->id ? 'selected' : ''}}> {{ $cat->name }} </option>
                                @endforeach
                            </select>
                            @error('category')<span class="text-danger"> {{$message}} </span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="body"> Body </label>
                            <textarea  name="body" class="form-control" wire:model="body"  rows="5">  </textarea>
                            @error('body')<span class="text-danger"> {{$message}} </span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="image"> Image </label>
                            <input type="file" name="image" class="form-control" wire:model="image" >
                            @error('image')<span class="text-danger"> {{$message}} </span>@enderror
                        </div>

                        <button type="submit" name="save" class="btn btn-primary mt-4"> Add Post </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
