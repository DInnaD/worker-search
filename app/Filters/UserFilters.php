<?php

namespace App\Filters;

class UserFilters extends QueryFilter
{

    public function vacancies($vacancyIds)// add  here only active
    {
        return $this->builder->whereIn('vacancy_id', $this->paramToArray($vacancyIds));
    }public function only_active($user->vacansies() = 'asc')
    {
        return $this->builder->orderBy('is_active', $user);//->vacansies()->where('is_active', '==','true')->get());
    }


    public function search($keyword)
    {
        return $this->builder->where('title', 'like', '%'.$keyword.'%');
    }

}//perm + api.php collection will ask   