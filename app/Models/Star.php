<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property string $firstname
 * @property string $lastname
 * @property string $fullname
 * @property string $description
 * @property string $image_path
 */
class Star extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int,string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'description',
        'image_path',
    ];

    /** @return Attribute<string,void> */
    protected function fullname(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, mixed $attributes) => gettype($attributes) === "array" ? $attributes['firstname'] . ' ' . $attributes['lastname'] : null,
        );
    }
}
