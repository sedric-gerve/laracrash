<?php

namespace App\Models;

use DeepCopy\Filter\Filter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    protected $fillable =['title', 'company', 'location', 'webside', 'email', 'description', 'tags'];
    public function scopeFilter($query, array $filters){
        if($filters['tag'] ?? false ){
          $query->where('tags', 'like', '%' .request('tag'). '%');
        }
        if($filters['search'] ?? false ){
            $query->where('title', 'like', '%' .request('search'). '%')
                  ->orWhere('description', 'like', '%' .request('search'). '%')
                  ->orwhere('tags', 'like', '%' .request('search'). '%');
          }

    }
}
