<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanaSosialPemasukan extends Model
{
    protected $table = 'dana_sosial_pemasukan';

    public function users(){
        return $this->belongsTo('App\Users', 'id_users', 'id');
    }
}
