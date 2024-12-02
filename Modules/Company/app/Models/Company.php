<?php

namespace Modules\Company\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

// use Modules\Company\Database\Factories\CompanyFactory;

class Company extends Model
{
    use HasFactory;

    protected $table = 'company';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'phone',
        'description',
        'author_user_id'
    ];

    public function companies(): HasMany
    {
        return $this->hasMany(Company::class, 'author_user_id', 'id');
    }

    // protected static function newFactory(): CompanyFactory
    // {
    //     // return CompanyFactory::new();
    // }
}
