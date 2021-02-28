<?php


namespace App\Tenant\Observers;


use Illuminate\Database\Eloquent\Model;

class TenantObserver
{


    public function creating(Model $model)
    {
        if(!is_null(auth()->user())) {
            $model->setAttribute('company_id', auth()->user()->company_id);
        }
    }


}
