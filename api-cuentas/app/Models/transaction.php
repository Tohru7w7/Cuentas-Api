<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\account;
use App\Models\categorie;

class transaction extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
        'ammount',
        'type',
        'description',
        'user_id',
        'account_id',
        'category_id',
    ];
    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
    public function account(){
        return $this->hasOne(Account::class,'id','account_id');
    }
    public function category(){
        return $this->hasOne(Categorie::class,'id','category_id');
    }
}
