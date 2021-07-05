<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
     ];

     //-------------------------------------------
     // Accessors
     //-------------------------------------------

     /**
      * Get the category's  Description.
      *
      * @param  string  $value
      * @return string
      */
     public function getDescriptionAttribute(string $value): string
     {
         return ucfirst($value);
     }

     //-------------------------------------------
     // Mutators
     //-------------------------------------------


     //-------------------------------------------
     // Relations
     //-------------------------------------------

     /**
      * Is responsible for the relationship with Users table
      * @return [type]
      */
     public function Users()
     {
         return $this->hasMany(User::class);
     }
}
