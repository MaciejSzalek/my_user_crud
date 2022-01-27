<?php


namespace App\Repositories;


use App\Interfaces\RepositoryInterface;
use App\Models\MyUser;

class UserRepository implements RepositoryInterface
{

    public function add(array $data): void
    {
        MyUser::create($data);
    }

    public function get(int $id): MyUser
    {
        return MyUser::where('id', $id)->first();
    }

    public function update(int $id, array $data): void
    {
        MyUser::where('id', $id)->update($data);
    }

    public function delete(int $id): void
    {
        MyUser::where('id', $id)->delete();
    }

    public function findByEmail(string $email): MyUser
    {
        return MyUser::where('email')->first();
    }
}
