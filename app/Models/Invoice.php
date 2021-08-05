<?php

namespace App\Models;

use App\Models\Product;
use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'invoices';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'date'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'seller_id',
        'date',
        'type',
        'total'
    ];

    /**
     * Relationship with ticket items
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship with ticket items
     *
     * @return void
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'invoice_id', 'id');
    }
}
