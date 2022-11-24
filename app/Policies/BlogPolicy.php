<?php

namespace App\Policies;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class BlogPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Blog $blog)
    {
	    return !$blog->public && $user->id !== $blog->user_id
	        ? Response::deny('You do not own this blog.')
	        : Response::allow();
    }
	
	/**
	 * Determine whether the user can update the model.
	 *
	 * @param  \App\Models\User  $user
	 * @param  \App\Models\Blog  $blog
	 * @return \Illuminate\Auth\Access\Response|bool
	 */
	public function edit(User $user, Blog $blog)
	{
		return $user->id === $blog->user_id
			? Response::allow()
			: Response::deny('You do not own this blog.');
	}

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Blog $blog)
    {
	    return $user->id === $blog->user_id
		    ? Response::allow()
		    : Response::deny('You do not own this blog.');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Blog $blog)
    {
	    return $user->id === $blog->user_id
		    ? Response::allow()
		    : Response::deny('You do not own this blog.');
    }
}
