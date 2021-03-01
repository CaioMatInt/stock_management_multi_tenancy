<?php


namespace App\Tenant\Scopes;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class TenantScope implements Scope
{

    public function apply(Builder $builder, Model $model){
        if(!is_null(auth()->user())) {
           return $builder->where('company_id', auth()->user()->company_id);
        }
    }

}
