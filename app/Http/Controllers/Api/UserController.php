<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        //get all posts
        $users = User::latest()->get();

        //return collection of posts as a resource
        return new UserResource(true, 'List Data Berita', $users);
    }
}
