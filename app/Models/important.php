<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class important extends Model
{
    protected $table = 'importants';
    protected $primaryKey  = 'id';
    protected $fillable = ['title', 'subject', 'user_id'];
    
    use HasFactory;
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
