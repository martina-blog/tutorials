<?php

// app/Http/Controllers/ExampleController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function index()
    {
        // Your controller logic here

        // Record a Pulse metric for this HTTP request
        pulse()->increment('http_requests');

        return view('example.index');
    }
}