<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Posts;

class PostsController extends Controller
{
    public function index()
    {
        return Posts::get();
    }
}
