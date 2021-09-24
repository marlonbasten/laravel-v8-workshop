<?php

namespace App\Http\Controllers;

class TestController extends Controller
{
    public function test()
    {
//        try {
//            $res = \Http::retry(3, 100)->withToken('76f47d29e25e27572dff5660bf518ff6faa103ec6119728fd56d7be8a8b9ec9f')
//                ->post('https://gorest.co.in/public/v1/users', [
//                    'name' => 'Test Hallo 123',
//                    'gender' => 'male',
//                    'email' => \Str::random().'@test.de',
//                    'status' => 'active',
//                ]);
//        } catch (RequestException $exception) {
//            dd($exception);
//        }
//
//        dd($res->collect());

        $users = collect();
        $res = \Http::get('https://gorest.co.in/public/v1/users');

        $collection = $res->collect();
        $collection = collect($collection->get('data'));

        $data = $collection->filter(fn($user) => false !== stripos($user['name'], 'G'));

        dd($data);
    }
}
