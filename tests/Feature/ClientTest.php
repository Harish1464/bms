<?php

namespace Tests\Feature;

use App\Models\Client;

use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskApiTest extends TestCase
{
    use RefreshDatabase;

    protected $client;

    // public function setUp():void
    // {
    //     parent::setUp();

    //     $this->client = factory(Client::class)->create();

    //     $this->actingAs($this->client, 'api');
    // }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_create_client()
    {
        
        $formData =[
            'id'  => 1,
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'phone' => '986453648',
            'gender' => 'male',
            'address' => 'Kathmandu, Naepal',
            'dob' => '1993-03-23',
            'nationality' => 'Nepali',
            'education_background' => 'BCA',
            'mode_of_contact' => 'Email',
        ];

        $this->withoutExceptionHandling();
        $this->post(route('client.store'),$formData)
             ->assertStatus(201)
             ->assertJson(['data'=>$formData])
             ;   

    }

    // public function test_can_update_client()
    // {
    //     $client = factory(Task::class)->make();

    //     $this->client->clients()->save($client);

    //     $updatedData = [
    //         'title' => 'second client',
    //         'description' => 'first client description',
    //         'due' => Carbon::parse('next friday')
    //     ];


    //     $this->json('PUT', route('clients.update', $client->id), $updatedData)
    //         ->assertStatus(200)
    //         ->assertJson(['data' => $updatedData]);
    // }

    // public function test_can_show_client()
    // {

    //     $client= factory(Task::class)->make();

    //     $this->client->clients()->save($client);
        

    //     $this->get(route('clients.show', $client->id))->assertStatus(200);
    // }
   
    // public function test_can_delete_client()
    // {

    //     $client= factory(Task::class)->make();

    //     $this->client->clients()->save($client);
        

    //     $this->delete(route('clients.destroy', $client->id))->assertStatus(200);
    // }

    // public function test_can_list_clients()
    // {
    //     $clients = factory(Task::class, 3)->make();

    //     $this->client->clients()->saveMany($clients);

    //     $this->get(route('clients.index'))
    //     ->assertJson(['data'=> $clients->toArray()])
    //     ->assertJsonStructure([
    //         'data'=>['*'=>['title','description','due','creator']],
    //         'links',
    //         'meta'
    //     ])
    //     ->assertStatus(200);
    // }
}