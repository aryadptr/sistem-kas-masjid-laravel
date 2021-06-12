<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KasPemasukan extends Model
{
    protected $table = 'kas_pemasukan';

    public function users(){
        return $this->belongsTo('App\User', 'id_users', 'id');
    }
}
