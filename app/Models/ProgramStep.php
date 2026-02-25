<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramStep extends Model
{
    protected $fillable = [
        'name',
        'program_id',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
