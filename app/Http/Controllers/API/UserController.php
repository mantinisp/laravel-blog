<?php
declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogCollection;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blog;

class UserController extends Controller
{
	public function showUserBlogs(Request $request, $id)
	{
		$user = User::find($id);
		$requestUser = $request->user();
		
		if (!$user) {
			return response()->json(['error' => 'User not found']);
		}
		
		$blogs = Blog::where('user_id', $user->id)
			->where('public', true)
			->orderBy('created_at', 'desc')
			->paginate(Blog::MAX_RESULT_PER_PAGE);
		
		if ($requestUser && $requestUser->id === $user->id) {
			$blogs = Blog::where('user_id', $user->id)
				->orderBy('created_at', 'desc')
				->paginate(Blog::MAX_RESULT_PER_PAGE);
		}
		
		return new BlogCollection($blogs);
	}
}
