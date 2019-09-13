<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 
        'title', 
        'country',
        'city',
        'creator_id'
    ];


    //  /**
    //  * The attributes that should be cast to native types.
    //  *
    //  * @var array
    //  */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    //     'count_workers' => 'integer',
    //     'is_book' => 'boolean',
    // ];
    // protected $attributes = [
    //     'count_workers', 
    //     'is_book', 
    //     'email_verified_at',
    // ];
    // protected $touches = [
    //     'vacancy', 
    // ];
   
    // protected $appends = [
    //     'count_workers',
    //     'is_book',
    //     'email_verified_at',
    //      ];

    public function creator()
    {
    	return $this->belongsTo(User::class, 'creator_id');
    }

    public function vacancies()
    {
    	return $this->hasMany('App\Vacancy');
    }
}
