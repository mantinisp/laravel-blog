<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\BlogResource;
use App\Traits\BlogPreviewTrait;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
	use BlogPreviewTrait;
	
	public function index()
	{
		$blogs = Blog::where('public', 1)
			->with('blogComments', 'user')
			->orderBy('created_at', 'desc')
			->get();
		
		return view('welcome', [
			'blogs' => $blogs,
		]);
	}
	
	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function myBlogs()
	{
		$user = Auth::user();
		$blogs = Blog::where('user_id', $user->id)
			->with('blogComments', 'user')
			->orderBy('created_at', 'desc')
			->get();
		
		return view('home', [
			'myBlogs' => $blogs,
		]);
	}
	
	/**
	 * @param Request $request
	 * @param $id
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
	 */
	public function show(Request $request, $id)
	{
		$blog = $this->getCurrentBlog($request, $id);
		
		if (null === $blog) {
			abort(404);
		}
		
		return view('blog.show', [
			'blog' => $blog,
		]);
	}
	
	/**
	 * @param Request $request
	 * @param $id
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
	 */
	public function edit(Request $request, $id)
	{
		$blog = Blog::find($id);
		$user = $request->user();
		
		if (!$blog || !$user) {
			abort(404);
		}
		if (!$user->can('edit', $blog)) {
			abort(404);
		}
		
		return view('blog.edit', [
			'blog' => $blog,
		]);
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
	 */
	public function create()
	{
		return view('blog.create');
	}
	
	/**
	 * @param Request $request
	 * @return BlogResource
	 */
	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'title' => 'required|unique:blogs|max:255',
			'description' => 'required',
			'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
		]);
		
		$blog = new Blog;
		$blog->title = $request->input('title');
		$blog->description = $request->input('description');
		
		if ($request->file()) {
			$fileName = time().'_'. $request->file('image')->getClientOriginalName();
			$request->file('image')->storeAs('images', $fileName, 'public');
			
			$blog->image = Storage::url('app/public/images/' . $fileName);
		}
		
		$blog->public = $request->input('public') ?? 0;
		$blog->user_id = Auth::id();
		$blog->save();
		
		return new BlogResource($blog);
	}
	
	/**
	 * @param Request $request
	 * @param $id
	 * @return BlogResource
	 */
	public function update(Request $request, $id)
	{
		$blog = Blog::find($id);
		$user = $request->user();
		
		if (!$blog || !$user) {
			abort(404);
		}
		if (!$user->can('update', $blog)) {
			abort(404);
		}
		
		$validator = Validator::make($request->all(), [
			'title' => 'required|unique:blogs|max:255',
			'description' => 'required',
		]);
		
		$blog->title = $request->input('title');
		$blog->description = $request->input('description');
		
		if ($request->file()) {
			$fileName = time().'_'. $request->file('image')->getClientOriginalName();
			$request->file('image')->storeAs('images', $fileName, 'public');
			
			$blog->image = Storage::url('app/public/images/' . $fileName);
		}
		
		$blog->public = $request->input('public') ?? 0;
		$blog->user_id = Auth::id();
		$blog->update();
		
		return new BlogResource($blog);
	}
	
	/**
	 * @param Request $request
	 * @param $id
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function destroy(Request $request, $id)
	{
		$blog = Blog::find($id);
		
		if (!$blog) {
			abort(404);
		}
		
		$user = $request->user();
		
		if (!$user) {
			abort(404);
		}
		if ($user && $user->cannot('delete', $blog)) {
			abort(404);
		}
		
		$blog->delete();
		
		return response()->json([
			'success' => true,
		]);
	}
}
