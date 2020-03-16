<?php


namespace Http;


use Data\PhonebookDTO;
use Data\UserDTO;
use Service\UserServiceInterface;

class UserHttpHandler extends UserHttpAbstract
{

    public function edit (UserServiceInterface $userService, array $formData=[])
    {

        if (!$userService->isLogged()){
            $this->redirect('login.php');
        }
        $user = $userService->currentUser();

        if(isset($formData['edit'])){

            $this->handleEditProcess($userService, $formData);
        }else{
            $this->render("/Users/profile",$user);
        }
    }

    public function register(UserServiceInterface $userService, array $formData=[]){
        if(isset($formData['register'])){

            $this->handleRegisterProcess($userService, $formData);
        }else{
            $this->render("/Users/register");
        }
    }

    private function handleRegisterProcess(UserServiceInterface $userService, array $formData)
    {
        $user = UserDTO::create(
            $formData['name'],
            $formData['password']

        );

        /**
         * var UserServiceInterface $userService
         */
        if ($userService->register($user,$formData['confirm_password'])){
            $this->redirect('login.php');
        }
    }



    public function login(UserServiceInterface $userService, array $formData = [])
    {

        if(isset($formData['login'])){

            $this->handleLoginProcess($userService, $formData);
        }else{
            $this->render("/Users/login");

        }
    }

    private function handleLoginProcess(UserServiceInterface $userService, array $formData)
    {

        /**
         * @var UserServiceInterface $userService
         */
        $user = $userService->login($formData['name'],$formData['password']);

        if (null !== $user){

            $_SESSION['id'] = $user->getId();
            $this->redirect('profile.php');
        }else{

        }
    }

    private function handleEditProcess(UserServiceInterface $userService, array $formData)
    {
        /**
         * @var UserServiceInterface $userService
         */
        $user = $userService->currentUser();

        $user->setName($formData['name']);
        $user->setPassword($formData['password']);


        if($userService->edit($user)){
            $this->redirect('profile.php');
        }
    }

    public function addPhone (UserServiceInterface $userService, array $formData = [])
    {

        if(isset($formData['add'])){
            $this->handleAddPhoneProcess($userService, $formData);
        }else{
            /*$this->render("/Users/allPhones");*/

        }
    }

    private function handleAddPhoneProcess(UserServiceInterface $userService, array $formData)
    {
        $idOwner = (int) $_SESSION['id'];


        $newPhone = PhonebookDTO::create(

            $formData['name'],
            $formData['secondName'],
            $formData['phone'],
            $formData['email'],
            $idOwner

        );

        $userService->addPhoneDB($newPhone, $userService->currentUser());




    }

    public function ShowAllPhones(UserServiceInterface $userService){
        $idOwner = (int) $_SESSION['id'];
        $data = $userService->findAllPhones($idOwner, $userService->currentUser());
        $this->render('/Users/allPhones', $data);

    }


    public function SearchForName(UserServiceInterface $userService, array $formData){

        if(isset($formData['search!'])){
            $ownerID = $_SESSION['id'];
            $data = $userService->searchByName($formData['search'], $ownerID);
            $this->render('/Users/search', $data);
        }else{
            $this->render('/Users/search');
        }

    }

}