<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;

class ProfilesController extends Controller
{
    public function show($id)
    {
        echo 'Sorry '. Auth::user()->email .' but profiles page is not ready yet.';
    }
}
