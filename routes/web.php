<?php

use Illuminate\Support\Facades\Route;
use App\Models\Employee;
use App\Models\Job;
use App\Models\BonusSales;
use App\Models\Project;
use App\Models\Client;

use Illuminate\Database\Eloquent\Builder; // Додадете го ова на врвот на датотеката


// whereHas('job') e imeto na metodot job vo Employee modelot  
// whereHas se koristi samo ako postoi vrska megu2te tabeli 
Route::get('/employees-info', function () {
    $allemplys = Employee::whereHas('job', function (Builder $query) { // Заменете Illuminate\Database\Query\Builder со Illuminate\Database\Eloquent\Builder
        $query->where('role_name', 'developer')->orWhere('role_name', 'sales');
    })->get();

    return $allemplys;
});


    Route::get('/sales/bonus', function () {
    
                // mi trebaat site vraboteni od sales sto imaa pogolem bonus od prosecniot bonus podredeni po nivnoto ime 
                // whereHas se upotrebuva i se za iminja na relaciite so hasmany i belongsTo etc... dodeka where e ime na kolonata 

    $avgBonus = BonusSales::avg('bonus'); // zemanje na prosecna vrednost na site bonusi 

    $salesEmpl = Employee::whereHas('job', function(Builder $query) {

            $query->where('role_name', 'sales');
            })->whereHas('bonus', function(Builder $query) use ($avgBonus) {

                // bidjeki koristime klousur mora da stavime use ($avgBonus)
                $query->where('bonus', '>', $avgBonus);
            })
            ->get();

        return $salesEmpl;
    });



// da se prikazat prektite zaedno so nivniot klient 
    Route::get('/projectsWithClients', function (Builder $query) {

   
        $allProjectss = Project::with('client')->get(); 

        return $allProjectss;
  
});


    

