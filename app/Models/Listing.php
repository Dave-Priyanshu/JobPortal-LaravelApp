<?php

namespace App\Models;

use GuzzleHttp\Psr7\Query;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    // one way it this.another way is to change the AppServiceProvider.php file
    protected $fillable =['title','company','location','email','description','tags','website','creator_name','user_id'];

    public function scopeFilter($query, array $filters){
        if($filters['tag'] ?? false){
            $query->where('tags','like','%'.request('tag').'%');
        }

        if($filters['search'] ?? false){
            $query->where('title','like','%'.request('search').'%')
                ->orWhere('description','like','%'.request('search').'%')
                    ->orWhere('tags','like','%'.request('search').'%');
        }
    }


    //relation to user
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    
}
