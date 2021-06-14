<?php

use App\Models\Company;
use Tests\Builders\UserBuilder;

it('should be authenticated to list companies by route', function () {
    $response = $this->get(route('companies.index'));
    $response->assertRedirect('/api/login');
});

it('can get all companies by route', function () {
    $response = $this->actingAs((new UserBuilder())->create())->get(route('companies.index'));
    $response->assertStatus(200)->assertJson(['success' => 'true']);
});

it('should by authenticated to show a company by route', function () {
    $company = Company::factory()->create();
    $response = $this->get(route('companies.show', $company->id));
    $response->assertRedirect('/api/login');
});

it('can get a company by route', function () {
    $company = Company::factory()->create();
    $response = $this->actingAs((new UserBuilder())->create())->get(route('companies.show', $company->id));
    $response->assertStatus(200)->assertJson(['success' => 'true']);
});

it('should by authenticated to create a company by route', function () {
    $company = Company::factory()->make();
    $response = $this->post(route('companies.store'), $company->toArray());
    $response->assertRedirect('/api/login');
});

it('can create a company by route', function () {
    $company = Company::factory()->make();
    $response = $this->actingAs((new UserBuilder())->create())->post(route('companies.store'), $company->toArray());
    $response->assertStatus(200)->assertJson(['success' => 'true']);
    $this->assertDatabaseHas('companies', [
        'name' => $company->name
    ]);
});

it('should by authenticated to update a company by route', function () {
    $company = Company::factory()->create();
    $prepare['name'] = Company::factory()->make()->name;
    $response = $this->patch(route('companies.update', $company->id), $prepare);
    $response->assertRedirect('/api/login');
});

it('can update a company by route', function () {
    $company = Company::factory()->create();
    $prepare['name'] = Company::factory()->make()->name;
    $response = $this->actingAs((new UserBuilder())->create())->patch(route('companies.update', $company->id), $prepare);
    $response->assertStatus(200)->assertJson(['success' => 'true']);
    $this->assertDatabaseMissing('companies', [
        'name' => $company->name
    ]);

});

it('should by authenticated to delete a company by route', function () {
    $company = Company::factory()->create();
    $response = $this->delete(route('companies.destroy', $company->id));
    $response->assertRedirect('/api/login');
});

it('can delete a company by route', function () {
    $company = Company::factory()->create();
    $response = $this->actingAs((new UserBuilder())->create())->delete(route('companies.destroy', $company->id));
    $response->assertStatus(200)->assertJson(['success' => 'true']);
    $this->assertSoftDeleted('companies', [
        'name' => $company->name
    ]);
});

