<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KasPengeluaran extends Model
{
    protected $table = 'kas_pengeluaran';

    public function users(){
        return $this->belongsTo('App\User', 'id_users', 'id');
    }
}
