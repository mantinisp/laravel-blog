<?php

namespace App\Policies;

use App\Models\BlogComment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class BlogCommentPolicy
{
    use HandlesAuthorization;
	
	/**
	 * @param User $user
	 * @param BlogComment $blogComment
	 * @return Response
	 */
	public function deleteComment(User $user, BlogComment $blogComment)
	{
		return $user->id === $blogComment->user_id
			? Response::allow()
			: Response::deny('You do not own this blog.');
	}
}
