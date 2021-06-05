<?php

namespace Tests\Unit;

use Tests\TestCase;

class ClientTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testStoreDateToCsv()
    {

        // testing for storing data in csv file
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
        $response->assertStatus(201);
        $response->assertJson($data);

    }

    // testing for fetching data from csv file

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
