<?php

namespace App\Models;

use App\Models\Curs;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Modul extends Model
{
    use HasFactory;

    // protected $primaryKey = "id";
    // public $incrementing = "false";
    // protected $keyType = 'int'

    protected $table = "cursos";
    public $timestamps = false;

    public function cursos() {
        return $this->belongsToMany(Curs::class,"moduls_has_cursos","moduls_id","cursos_id")->withPivot("curs_academic_id");
    }
}
