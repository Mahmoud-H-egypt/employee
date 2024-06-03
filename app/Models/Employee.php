<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'fname',
        'lname',
        'address',
        'zipcode',
        'birthdate',
        'hireddate',
        'groupe_id',
        'city_id',
        'country_id',
        'department_id',
        
         
    ];
    public function groupe(){
        return $this->belongsTo(Groupe::class);
    }
    public function country(){
        return $this->belongsTo(Country::class);
    }
    public function city(){
        return $this->belongsTo(City::class);
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }
}
