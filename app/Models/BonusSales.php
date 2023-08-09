<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonusSales extends Model
{
    use HasFactory;

    protected $table = 'bonuses_sales';
    public function employee()
    {
            return $this->belongsTo(Employee::class);
    }
}
