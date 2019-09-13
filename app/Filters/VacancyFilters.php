<?php

namespace App\Filters;

class VacancyFilters extends QueryFilter
{

    public function bookers($userIds)//each & all
    {
        return $this->builder->whereIn('user_id', $this->paramToArray($userIds));
    }

    public function search($keyword)
    {
        return $this->builder->where('title', 'like', '%'.$keyword.'%');
    }

    public function organizations($organizationIds)// add  here only active
    {
        return $this->builder->whereIn('organization_id', $this->paramToArray($organizationIds));
    }
}