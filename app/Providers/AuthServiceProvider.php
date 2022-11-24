<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\BlogComment;
use App\Policies\BlogCommentPolicy;
use App\Policies\BlogPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
    	'App\Models\Model' => 'App\Policies\ModelPolicy',
	    Blog::class => BlogPolicy::class,
	    BlogComment::class => BlogCommentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
