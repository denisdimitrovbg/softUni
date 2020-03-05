<?php


namespace Http;

use Data\ErrorDTO;
use Data\UserDTO;
use Service\UserService;
use Service\UserServiceInterface;

class UserHttpHandler extends UserHttpHandlerAbstract
{

    public function index(UserServiceInterface $userService)
    {
        $this->render('home/index',$userService);
    }

    public function all(UserServiceInterface $userService)
    {
        $this->render('users/all',$userService->getAll());
    }

    public function profile(UserServiceInterface $userService, array $formData)
    {

        if(!$userService->isLogged())
        {
            $this->redirect('login.php');
        }
        $user = $userService->currentUser();

        if(isset($formData['edit'])){
            $this->handleEditProcess($userService, $formData);
        }else{
            $this->render('users/profile', $user);
        }
    }

    public function register(UserServiceInterface $userService, array $formData=[])
    {
        if(isset($formData['register'])){
            $this->handleRegisterProcess($userService, $formData);
        }else{
                $this->render('users/register');
        }
    }

    private function handleRegisterProcess(UserServiceInterface $userService, array $formData)
    {
        $user = $this->dataBinder->bind($formData, UserDTO::class);
        /**
         * var UserServiceInterface $userService
         */
        if($userService->register($user,$formData['confirm_password'])){
            $this->redirect('login.php');
        }

    }

    public function login(UserServiceInterface $userService, array $formData=[])
    {
        if(isset($formData['login'])){
            $this->handleLoginProcess($userService, $formData);
        }else{
            $this->render('users/login');
        }
    }

    private function handleLoginProcess(UserServiceInterface $userService, array $formData)
    {
        $user = $userService->login($formData['username'],$formData['password']);
        if(null !== $user){
            $_SESSION['id'] = $user->getId();
            $this->redirect('profile.php');
        }else{
            $this->render('users/login',null, new ErrorDTO('Username does not exist or password missmatch.'));
        }
    }

    private function handleEditProcess(UserServiceInterface $userService, array $formData)
    {
        /**
         * var UserServiceInterface $userService
         */
        $user = $this->dataBinder->bind($formData, UserDTO::class);


        if($userService->Edit($user)){
            $this->redirect('profile.php');
        }else{

        }

    }


}