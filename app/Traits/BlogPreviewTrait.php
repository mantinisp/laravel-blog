<?php
declare(strict_types=1);

namespace App\Traits;

use Illuminate\Http\Request;
use App\Models\Blog;

trait BlogPreviewTrait
{
	/**
	 * @param Request $request
	 * @param $id
	 * @return Blog|null
	 */
	public function getCurrentBlog(Request $request, $id)
	{
		$blog = Blog::where('id', $id)
			->with('user')
			->with(['blogComments' => function ($query) {
				$query->orderBy('created_at', 'desc');
				$query->with('user');
			}])
			->firstOrFail();
		
		$user = $request->user();
		
		if (!$user && !$blog->public) {
			return null;
		}
		if ($user && !$user->can('view', $blog) && !$blog->public) {
			return null;
		}
		
		return $blog;
	}
}
