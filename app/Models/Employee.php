<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    // ZAPAMTI KADE STO SE NAOGA FOREIGN KEY TAMU SEKOGAS ODI BELONGS_TO
    
    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function bonus()
    {
        return $this->hasOne(BonusSales::class); // eden vraboten moze da ima eden bonus 
    }

    public function title()
    {
        // eden vraboten moze da ima edna titula // se odnesuva samo za Developers 
        return $this->hasOne(TitleDeveloper::class);
    }

    public function checkInOut()
    {
        return $this->hasMany(CheckInOut::class);
    }

    public function projects()
    {
        // eden vraboten moze da ima poveke proekti
        return $this->belongsToMany(Project::class);
    }

}
