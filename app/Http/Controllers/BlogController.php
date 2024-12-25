<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Faker\Provider\Base;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(9);
    return view('index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $imagepath=null;
        if ($request->hasFile('image')){
            $imagepath = $request->file('image')->store('blog_images', 'public');
        }
        Blog::create([
           'title'=>$request->input('title'),
           'category'=>$request->input('category'),
           'description'=>$request->input('description'),
           'status'=>$request->input('status'),
            'image'=>$imagepath,

        ]);
        return redirect()->route('blogs.index')->with('success', 'Blog post created successfully!');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
