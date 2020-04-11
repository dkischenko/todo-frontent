<?php

namespace App\Http\Controllers;

use App\Http\Traits\ProjectTrait;

class WelcomeController extends Controller
{
    use ProjectTrait;

    public function index()
    {
        return view('welcome')
            ->with('projects', $this->model->all());
    }
}
