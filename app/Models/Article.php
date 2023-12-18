<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;

    protected  $fillable = ['title', 'full_text', 'category_id', 'user_id', 'published_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        if (auth()->check() && !auth()->user()->is_admin && !auth()->user()->is_publisher) {
            static::addGlobalScope('user', function (Builder $builder) {
                // $builder->where('user_id', auth()->id());
            });
        }
    }

    public function getCreatedAtAttribute($date)
    {
        if ($date) {
            return date('d-m-Y', strtotime($date));
        }
        return null;
    }

    public function getPublishedAtAttribute($date)
    {
        if ($date) {
            return date('d-m-Y', strtotime($date));
        }
        return null;
    }
}
