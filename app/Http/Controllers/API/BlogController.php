<?php
declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogCollection;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use App\Traits\BlogPreviewTrait;
use Illuminate\Http\Request;

class BlogController extends Controller
{
	use BlogPreviewTrait;
	
	/**
	 * @return BlogCollection
	 */
	public function index()
	{
		$blogs = Blog::where('public', 1)
			->orderBy('created_at', 'desc')
			->paginate(Blog::MAX_RESULT_PER_PAGE);
		
		return new BlogCollection($blogs);
	}
	
	/**
	 * @param Request $request
	 * @param $id
	 * @return BlogResource
	 */
	public function show(Request $request, $id)
	{
		$blog = $this->getCurrentBlog($request, $id);
		
		if (null === $blog) {
			return response()->json(['error' => 'Blog not found']);
		}
		
		return new BlogResource($blog);
	}
}
