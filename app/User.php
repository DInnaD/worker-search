<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 
        'email', 
        'password',
        'first_name',
        'last_name',
        'country',
        'city',
        'phone',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'count_workers' => 'integer',
        'is_book' => 'boolean',
    ];
//    protected $attributes = [
//        'count_workers', 
//        'is_book', 
//    ];
    protected $touches = [
        'vacancy', 
    ];
   
    protected $appends = [//add to return obj
        'count_workers',
        'is_book',
        'email_verified_at',
         ];

    public function vacancies()
        {
        return $this->belongsToMany(Vacancy::class);
        }

    public function organization()
        {
        return $this->hasOne(Organization::class);
        }    

    public function makeBook()
    {
        $this->vacancies->is_book = true;
        $this->save();
        
    }

    public function makeUnBook()
    {
        $this->vacancies->is_book = false;
        $this->save();
        
    }

    public function setBookAttribute()
    {
        $is_book = $this->vacancies->is_book;
        $this->attribute['is_book'] = $is_book;
    }

    public function getBookAttribute()
    {
        $isPausedBook = true;
        if($this->vacancy->is_book == true){
            $is_book = false;
            return $is_book;
        }
    }

    public function scopeFilter(Builder $builder, QueryFilter $filters)
    {
        return $filters->apply($builder);
    }

    // public function setCount_workersAttribute()
    // {
    //     $count_workers = $this->vacancies->count_workers;
    //     $this->attribute['count_workers'] = $count_workers;
    // }

    // public function getCount_workersAttribute()
    // {
    //     $isPausedCount_workers = true;
    //     if($this->vacancy->count_workers == true){
    //         $count_workers = false;
    //         return $count_workers;
    //     }
    // }
}
