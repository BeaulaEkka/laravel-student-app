<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last-name', 'group_id', 'section_id', 'email'];

    protected $with = ['group', 'section'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}