<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outfit extends Model
{
    use HasFactory;
    protected $table = 'outfits';

    protected $primaryKey = 'id';

    protected $fillable = ['top_id', 'bottom_id', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function bottom(){
        return $this->belongsTo(Item::class,'bottom_id','id');
    }
    public function top(){
        return $this->belongsTo(Item::class,'top_id','id');
    }


}
