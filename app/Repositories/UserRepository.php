<?php


namespace App\Repositories;


use App\Interfaces\RepositoryInterface;
use App\Models\MyUser;

class UserRepository implements RepositoryInterface
{

    public function add(array $data): void
    {
        MyUser::create($data);

//        session([$data['id'] => $data]);
    }

    public function get(int $id)
    {
        return MyUser::where('id', $id)->first();

//        return session($id);
    }

    public function update(int $id, array $data)
    {
        return MyUser::where('id', $id)->update($data);

//        return session([$id => $data]);
    }

    public function delete(int $id)
    {
        return MyUser::where('id', $id)->delete();

//        session()->forget($id);

    }

    public function findByEmail(string $email)
    {
        return MyUser::where('email', $email)->first();

//        $users = session()->get();
//        foreach ($users as $user)
//        {
//            if($user['email'] == $email)
//            {
//                return $user;
//            }
//        }
//        return null;
    }
}
