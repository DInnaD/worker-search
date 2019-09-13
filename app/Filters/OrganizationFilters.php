<?php

namespace App\Filters;

class OrganizationFilters extends QueryFilter
{



    public function search($keyword)
    {
        return $this->builder->where('title', 'like', '%'.$keyword.'%');
    }

}//perm + api.php collection will ask   