<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index()
//    {
//        $posts = Post::with('user','category')->orderBy('id','desc')->paginate(5);
//
//        return view('frontend.index',compact('posts'));
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('frontend.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'title'     => 'required|max:255',
            'body'      => 'required|max:2500',
            'category'  => 'required',
            'image'     => 'nullable|mimes:png,jpg,jpeg,gif|max:20000',
        ]);

        if ($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $post = new Post();
        $post['title'] = $request->title;
        $post['body'] = $request->body;
        $post['category_id'] = $request->category;
        $post['user_id'] = auth()->id();

        if ($image = $request->file('image')){
            $filename = Str::slug($request->title). '.' .$image->getClientOriginalExtension();
            $path = public_path('/assets/images/'.$filename);
            Image::make($image->getRealPath())->save($path,100);

            $post['image'] = $filename;
        }
        $post->save();

        return redirect()->route('posts.index')->with([
            'message' => 'Post created Successfully',
            'alert-type' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::with(['user','category'])->whereId($id)->first();
        return view('frontend.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $oldPost = Post::whereId($id)->first();

        if ($oldPost){
            $categories = Category::all();
            return view('frontend.edit',compact('oldPost','categories'));

        }
        return redirect()->route('home')->with([
            'message' => "you don't have permission",
            'alert-type' => 'danger',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(),[
            'title'     => 'required|max:255',
            'body'      => 'required|max:2500',
            'category'  => 'required',
            'image'     => 'nullable|mimes:png,jpg,jpeg,gif|max:20000',
        ]);

        if ($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $oldPost = Post::whereId($id)->first();

        if ($oldPost){


            $post['title'] = $request->title;
            $post['body'] = $request->body;
            $post['category_id'] = $request->category;

            if ($image = $request->file('image')){
                if (File::exists('assets/images/' . $oldPost->image)){
                    unlink('assets/images/' . $oldPost->image);
                }

                $filename = Str::slug($request->title). '.' .$image->getClientOriginalExtension();
                $path = public_path('/assets/images/'.$filename);
                Image::make($image->getRealPath())->save($path,100);

                $post['image'] = $filename;
            }
            $oldPost->update($post);

            return redirect()->route('posts.index')->with([
                'message' => 'Post Updated Successfully',
                'alert-type' => 'success',
            ]);
        }

        return redirect()->route('home')->with([
            'message' => "you don't have permission",
            'alert-type' => 'danger',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::whereId($id)->first();
            if ($post->image !== ''){
                unlink('assets/images/'.$post->image);
            }
        $post->delete();

        return redirect()->back()->with([
            'message' => "Post Deleted Successfully",
            'alert-type' => 'danger',
        ]);
    }
}
