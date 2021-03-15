<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        return new Profile(auth()->user());
    }
}
