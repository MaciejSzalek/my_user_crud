<?php


namespace App\Services;


use App\Interfaces\UserInterface;
use App\Models\MyUser;
use App\Repositories\UserRepository;
use \Exception;

class UserService implements UserInterface
{
    /**
     * @var UserRepository
     */
    private UserRepository $userRepository;

    /**
     * UserService constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function loginUser($request)
    {
        $user = MyUser::where('email', $request['email'])->where('password', $request['password'])->first();
        if(empty($user))
        {
            throw new Exception("Incorrect email or password");
        }
        return $user;
    }

    public function registerUser($request)
    {
        if(!filter_var($request['email'], FILTER_VALIDATE_EMAIL))
        {
            throw new Exception("Invalid email address");
        }

        $user = $this->userRepository->findByEmail($request['email']);
        if(empty($user))
        {
            $this->userRepository->add($request->all());
        } else {
            throw new Exception('User with email "' . $request['email'] . '"" exists');
        }
    }

    public function updateUser($request)
    {

    }

    public function deleteUser($request)
    {
        //validacja itp.
        $this->userRepository->delete($request['id']);
    }
}
