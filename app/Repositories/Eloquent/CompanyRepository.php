<?php

namespace App\Repositories\Eloquent;

use App\Models\Company;
use App\Repositories\Contracts\CompanyRepositoryInterface;

class CompanyRepository extends AbstractRepository implements CompanyRepositoryInterface
{
    protected $model;

    public function __construct(Company $model)
    {
        $this->model = $model;
    }

}
