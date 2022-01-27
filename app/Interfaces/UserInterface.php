<?php


namespace App\Interfaces;

interface UserInterface
{
    public function registerUser($request);
    public function updateUser($request);
    public function loginUser($request);
    public function deleteUser($request);

}