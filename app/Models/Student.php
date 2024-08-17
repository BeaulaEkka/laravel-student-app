<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last-name', 'group_id', 'section_id', 'email'];

    public function groups()
    {
        return $this->belongsTo(Group::class);
    }

    public function sections()
    {
        return $this->belongsTo(Section::class);
    }
}