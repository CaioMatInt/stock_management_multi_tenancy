<?php


namespace App\Tenant\Observers;


use Illuminate\Database\Eloquent\Model;

class TenantObserver
{
    protected $routesToNotApplyCreating = [
      'users.register'
    ];

    public function creating(Model $model)
    {
        //todo: need a refactor here. Implement a specific observer for User model.
        $currentRoute = \Request::route();
        $currentRoute = $currentRoute ? $currentRoute->getName() : null;

        if(!is_null(auth()->user()) && !in_array($currentRoute, $this->routesToNotApplyCreating, true)) {
            $model->setAttribute('company_id', auth()->user()->company_id);
        }
    }


}
