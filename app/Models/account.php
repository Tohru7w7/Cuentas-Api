<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class account extends Model
{
    protected $table = 'accounts';

    protected $fillable = [
        'name',
        'ammount',
        'status',
        'user_id',
    ];
    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
