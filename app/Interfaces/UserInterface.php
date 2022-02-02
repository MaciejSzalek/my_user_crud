<?php


namespace App\Interfaces;

interface UserInterface
{
    public function registerUser(array $request);
    public function getUser(int $id);
    public function updateUser(array $request);
    public function loginUser(array $request);
    public function deleteUser(array $request);

}
