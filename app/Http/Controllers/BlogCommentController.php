<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogCommentController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	/**
	 * @param Request $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(Request $request)
    {
	    $user = $request->user();
	    
	    if (!$user) {
	    	abort(404);
	    }
	    
    	$blogId = $request->input('blog_id');
    	$blog = Blog::find($blogId);
    	
    	if (!$blog) {
    		abort(404);
	    }
    	
	    $validator = Validator::make($request->all(), [
		    'comment' => 'required',
	    ]);
	
	    $blogComment = new BlogComment();
	    $blogComment->blog_id = $blog->id;
	    $blogComment->comment = $request->input('comment');
	    $blogComment->user_id = $user->id;
	    $blogComment->save();
	
	    return response()->json([
		    'success' => true,
	    ]);
    }
	
	/**
	 * @param Request $request
	 * @param $id
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function destroy(Request $request, $id)
	{
		$comment = BlogComment::find($id);
		
		if (!$comment) {
			abort(404);
		}
		
		$user = $request->user();
		
		if (!$user) {
			abort(404);
		}
		if ($user && $user->cannot('deleteComment', $comment)) {
			abort(404);
		}
		
		$comment->delete();
		
		return response()->json([
			'success' => true,
		]);
	}
}
