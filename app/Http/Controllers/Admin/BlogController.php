<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BlogReq;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->can('r-blog'))
        {
            $blogs = Blog::paginate(15);
            return view('admin.blogs.index', compact('blogs'));

        } else {
            Log::newLog("Usuário tentou acessar: R-BLOG, user: " . Auth::user()->name);
            return view('admin.layout.403');
        }
    }


    public function create()
    {
        if (Auth::user()->can('c-blog'))
        {
            $categs = BlogCategory::all()->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->pluck('name', 'id');
            return view('admin.blogs.add', compact('categs'));

        } else {
            Log::newLog("Usuário tentou criar: C-BLOG, user: " . Auth::user()->name);
            return view('admin.layout.403');
        }
    }

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

        Log::newLog("Usuário criou novo blog, user: " . Auth::user()->name);

        return redirect('dashboard/blogs');
    }

    public function edit($id)
    {
        if (Auth::user()->can('u-blog'))
        {
            $blog = Blog::findOrFail($id);
            $categs = BlogCategory::all()->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->pluck('name', 'id');
            return view('admin.blogs.edit', compact('blog', 'categs'));

        } else {
            Log::newLog("Usuário tentou editar: U-BLOG-{$id}, user: " . Auth::user()->name);
            return view('admin.layout.403');
        }
    }


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

        Log::newLog("Usuário alterou blog-{$id}, user: " . Auth::user()->name);

        flash('Blog atualizado com sucesso!')->success();
        return redirect('dashboard/blogs');
    }

    public function destroy($id)
    {
        if (Auth::user()->can('d-blog'))
        {
            $blog = Blog::findOrFail($id);

            \File::delete(public_path('uploads/blogs/big/' . $blog->image));
            \File::delete(public_path('uploads/blogs/small/' . $blog->image));
            \File::delete(public_path('uploads/blogs/thumb/' . $blog->image));

            $blog->delete();

            Log::newLog("Usuário deletou blog-{$id}, user: " . Auth::user()->name);

            flash("Blog: {$blog->title} foi deletado!")->warning();
            return redirect('dashboard/blogs');

        } else {
            Log::newLog("Usuário tentou deletar: BLOG-{$id}, user: " . Auth::user()->name);
            return view('admin.layout.403');
        }
    }

}
