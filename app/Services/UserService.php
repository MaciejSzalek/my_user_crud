<?php


namespace App\Services;


use App\Interfaces\UserInterface;
use App\Models\MyUser;

class UserService implements UserInterface
{
    private $myUser;

    /**
     * UserService constructor.
     */
    public function __construct()
    {
        $this->myUser = new MyUser();
    }

    public function updateUser($request)
    {

    }

    public function showUser($request)
    {

    }

    public function deleteUser($request)
    {

    }

    public function createUser($request)
    {
        $user = MyUser::where('email', $request['email'])->first();
        if(empty($user))
        {
            MyUser::create($request->all());
            return redirect()->route('users.index')
                ->with('success','New user created successfully.');
        } else {
            return redirect()->back()->withErrors('User with email "' . $request['email'] . '"" exists');
        }
    }
}