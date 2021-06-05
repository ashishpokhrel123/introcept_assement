<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClientTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
   

    //testing for fetching data from csv file

    public function testFetchDatefromCsv()
    {

          $data = [
            'name' => 'New Client',
            'email' => 'client123@gmail.com',
            'phone' => '9860409629',
            'gender' => 'male',
            'dob' => '1997-09-27',
            'nationality' => 'clientcountry',
            'education' => 'client',
        ];
        $response = $this->json('POST', route('create'), $data);
        $response = $this->json('GET', route('getclient'));
        $response->assertStatus(200);
        
        

    }
}
