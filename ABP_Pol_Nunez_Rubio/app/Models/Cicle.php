<?php

namespace App\Models;

use App\Models\Curs;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cicle extends Model
{
    use HasFactory;

    // protected $primaryKey = "id";
    // public $incrementing = "false";
    // protected $keyType = 'int'

    protected $table = "cicles";
    public $timestamps = false;

    public function cursos() {
        return $this->hasMany(Curs::class,"cicles_id");
    }

}
