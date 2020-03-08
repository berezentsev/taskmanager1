<?php


namespace App\TaskManager\repositories;

use Illuminate\Http\Request;

interface RepositoryInterface
{
    public function store(Request $request);
}
