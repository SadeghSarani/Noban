<?php

namespace Controller;

use App\Http\Controllers\TurnController;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Request;
use Tests\TestCase;

class TurnControllerTest extends TestCase
{

    public function testCreate()
    {
        $controller = new TurnController();
        $request = app(Request::class);

        $request->merge([
            'user_id' => 4,
            'doctor_id' => 2
        ]);

        $response = $controller->create($request);

        $this->assertJsonStringEqualsJsonString(
            '{"user_id":4,"doctor_id":2,"turn_id":' . json_decode($response->getContent(), true)['turn_id'] . '}',
            $response->getContent()
        );
    }

    public function testFailedWithWrongUserId()
    {
        $controller = new TurnController();
        $request = app('request');

        $request->merge([
            'user_id' => 1,
            'doctor_id' => 2
        ]);

        $response = $controller->create($request);

    }
}
