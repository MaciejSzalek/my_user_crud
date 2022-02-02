<?php


namespace App\Interfaces;


interface RepositoryInterface
{
    public function add(array $data);
    public function get(int $id);
    public function update(int $id, array $data);
    public function delete(int $id);
    public function findByEmail(string $email);
}
