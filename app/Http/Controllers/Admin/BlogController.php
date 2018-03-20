<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BlogReq;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::paginate(15);
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categs = BlogCategory::all()->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->pluck('name', 'id');
        return view('admin.blogs.add', compact('categs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogReq $request)
    {
        $blog = new Blog();
        $blog->user_id = 1;
        $blog->category_id = $request->get('category_id');
        $blog->title = $request->get('title');
        $blog->meta_title = $request->get('meta_title');
        $blog->meta_keywords = $request->get('meta_keywords');
        $blog->meta_description = $request->get('meta_description');

        $img = $request->file('image');
        if ($img) {
            $localb = public_path('uploads/blogs/big/');
            $locals = public_path('uploads/blogs/small/');
            $localt = public_path('uploads/blogs/thumb/');

            $file = $request->get('image') . strtolower(str_random(25));
            $image = Image::make("$img");
            $image->backup();
            $image->resize(166, 106)->save($localt . $file .'.'. $img->getClientOriginalExtension());
            $image->reset();
            $image->resize(370, 300)->save($locals . $file .'.'. $img->getClientOriginalExtension());
            $image->reset();
            $image->resize(800, 600)->save($localb . $file .'.'. $img->getClientOriginalExtension());

            $blog->image = $file .'.'. $img->getClientOriginalExtension();
        }
        $blog->video = $request->get('video');
        $blog->content = $request->get('content');

        $blog->save();

        return redirect('dashboard/blogs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $categs = BlogCategory::all()->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->pluck('name', 'id');
        return view('admin.blogs.edit', compact('blog', 'categs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogReq $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->user_id = Auth::user()->id;
        $blog->category_id = $request->get('category_id');
        $blog->title = $request->get('title');
        $blog->meta_title = $request->get('meta_title');
        $blog->meta_keywords = $request->get('meta_keywords');
        $blog->meta_description = $request->get('meta_description');

        $img = $request->file('image');
        if ($img) {

            \File::delete(public_path('uploads/blogs/big/' . $blog->image));
            \File::delete(public_path('uploads/blogs/small/' . $blog->image));
            \File::delete(public_path('uploads/blogs/thumb/' . $blog->image));

            $localb = public_path('uploads/blogs/big/');
            $locals = public_path('uploads/blogs/small/');
            $localt = public_path('uploads/blogs/thumb/');

            $file = $request->get('image') . strtolower(str_random(25));
            $image = Image::make("$img");
            $image->backup();
            $image->resize(166, 106)->save($localt . $file .'.'. $img->getClientOriginalExtension());
            $image->reset();
            $image->resize(370, 300)->save($locals . $file .'.'. $img->getClientOriginalExtension());
            $image->reset();
            $image->resize(800, 600)->save($localb . $file .'.'. $img->getClientOriginalExtension());

            $blog->image = $file .'.'. $img->getClientOriginalExtension();
        }
        $blog->video = $request->get('video');
        $blog->content = $request->get('content');

        $blog->update();

        flash('Blog atualizado com sucesso!')->success();
        return redirect('dashboard/blogs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        \File::delete(public_path('uploads/blogs/big/' . $blog->image));
        \File::delete(public_path('uploads/blogs/small/' . $blog->image));
        \File::delete(public_path('uploads/blogs/thumb/' . $blog->image));

        $blog->delete();

        flash("Blog: {$blog->title} foi deletado!", 'warning');
        return redirect('dashboard/blogs');
    }
}
