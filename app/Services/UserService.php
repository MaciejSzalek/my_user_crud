<?php


namespace App\Services;


use App\Interfaces\UserInterface;
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
        $user = $this->userRepository->findByEmail($request['email']);

        if(empty($user))
        {
            throw new Exception("Incorrect email or password");
        }

        if($request['password'] == $user->password){
            \session(['login' => true]);
            return $this->getUser($user->id);
        } else {
            throw new Exception("Incorrect email or password");
        }
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
            $this->userRepository->add($request);
        } else {
            throw new Exception('User with email "' . $request['email'] . '"" exists');
        }
    }

    public function updateUser($request)
    {
        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password']
        ];
        $this->userRepository->update($request['id'], $data);
    }

    public function deleteUser($request)
    {
        $this->userRepository->delete($request['id']);
    }

    public function getUser(int $id)
    {
        return $this->userRepository->get($id);
    }
}
