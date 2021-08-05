<?php

namespace App\Models;

use App\Models\Log;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    
    /**
     *
     */
    protected $table = 'tasks';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'expired_at',
        'completed_at'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'priority',
        'title',
        'description',
        'expired_at',
        'completed_at',
    ];

    /**
     * The attributes that should be cast to native types
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:d-m-Y h:i a',
        'updated_at' => 'datetime:d-m-Y h:i a',
        'expired_at' => 'datetime:d-m-Y h:i a',
        'completed_at' => 'datetime:d-m-Y h:i a',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'is_expired',
    ];

    /**
     * Relationship with user items
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship with user items
     *
     * @return void
     */
    public function logs()
    {
        return $this->hasMany(Log::class, 'task_id', 'id')
            ->orderBy('created_at', 'DESC');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function getIsExpiredAttribute()
    {
        $now = Carbon::now();
        return (bool) $now->gte($this->attributes['expired_at']);
    }
}
