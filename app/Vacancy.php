<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 
        'vacancy_name',           
        'workers_amount',
        'organization_id',
        'salary',
        //user_id
    ];

     /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_active' => 'boolean',
    ];
    protected $attributes = [
        'is_active', 
        'email_verified_at',
    ];
    protected $touches = [
        'user', 
    ];
   
    protected $appends = [
        'is_active',
        'email_verified_at',
         ];
    public function bookers()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

     public function organization()
    {
    	return $this->belongsTo('App\Organization');
    }

    public function setIsActiveAttribute()
    {
        $is_active = $this->vacancies->is_active;
        $this->attribute['is_active'] = $is_active;
    }

    public function getIsActiveAttribute()
    {
        // $isPausedactive = true;
        // if($this->vacancy->is_active == true){
        //     $is_active = false;
            return $is_active;
        }
    }

    
}
