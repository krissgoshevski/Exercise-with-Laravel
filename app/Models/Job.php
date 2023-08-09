<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;


    // edna rabota moze da ja rabotat poveke vraboteni 
    public function employee()
    {
            return $this->belongsTo(Employee::class);
    }
}
