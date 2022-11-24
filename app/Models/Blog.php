<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    
    public const MAX_RESULT_PER_PAGE = 20;
    
    protected $table = 'blogs';

	protected $fillable = [
		'title',
		'description',
		'image',
		'public',
	];

	public function blogComments()
	{
		return $this->hasMany(BlogComment::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
