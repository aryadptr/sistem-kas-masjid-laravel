<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanaSosialPengeluaran extends Model
{
    protected $table = 'dana_sosial_pengeluaran';

    public function users(){
        return $this->belongsTo('App\Users', 'id_users', 'id');
    }
}
