<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'title',
        'slug',
        'ISBN_10',
        'contact_no',
        'author',
        'created_by',
        'contact_name',
        'contact_number',
        'address_line_1',
        'address_line_2',
        'address_line_3',
        'pincode',
        'city',
        'state',
        'country',
        'is_default_from',
        'is_default_to',
    ];

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by');
    }
    public function getCreatedAtAttribute($date): string
    {
        return Carbon::parse($date)->format('d-m-y H:i:s');
    }
}
