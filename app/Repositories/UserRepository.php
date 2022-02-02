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

    public function get(int $id)
    {
        return MyUser::where('id', $id)->first();
    }

    public function update(int $id, array $data)
    {
        return MyUser::where('id', $id)->update($data);
    }

    public function delete(int $id)
    {
        return MyUser::where('id', $id)->delete();
    }

    public function findByEmail(string $email)
    {
        return MyUser::where('email', $email)->first();
    }
}
