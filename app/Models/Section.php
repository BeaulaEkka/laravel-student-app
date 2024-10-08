<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'group_id'];

    public function student()
    {
        return $this->hasMany(Student::class);
    }

    public function group ()
    {
        return $this->belongsTo(Group::class);
    }

}