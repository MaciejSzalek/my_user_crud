<?php


namespace App\Interfaces;


use App\Models\MyUser;

interface RepositoryInterface
{
    public function add(array $data): void;
    public function get(int $id);
    public function update(int $id, array $data): void;
    public function delete(int $id): void;
    public function findByEmail(string $email);
    public function findByEmailPassword(string $email, string $password);
}
