<?php


namespace App\Interfaces;

use App\Models\MyUser;

interface UserInterface
{
    public function createUser($request);
    public function updateUser($request);
    public function showUser($request);
    public function deleteUser($request);

}