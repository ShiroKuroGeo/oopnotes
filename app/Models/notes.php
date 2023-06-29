<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notes extends Model
{

    protected $table = 'notes';
    protected $primaryKey  = 'id';
    protected $fillable = ['title', 'subject', 'status', 'user_id'];
    protected $attributes = ['status' => 'Notes'];
    
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
