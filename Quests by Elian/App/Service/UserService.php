<?php


namespace Service;


use Data\PhonebookDTO;
use Data\UserDTO;
use Repository\PhonebookInterface;
use Repository\UserRepositoryInterface;
use Service\Encryption\EncryptionServiceInterface;

class UserService implements UserServiceInterface
{
    /**
     * @var UserRepositoryInterface
     */

    private $userRepository;

    /**
     * @var EncryptionServiceInterface
     */
    private $encryptionService;

    /**
     * @var PhonebookInterface
     */
    private $phoneBookRepository;

    public function __construct(UserRepositoryInterface $userRepository, EncryptionServiceInterface $encryptionService, PhonebookInterface $phoneBookRepository)
    {
        $this->userRepository=$userRepository;
        $this->encryptionService=$encryptionService;
        $this->phoneBookRepository = $phoneBookRepository;
    }

    public function register(UserDTO $userDTO, string $confirmPassword): bool
    {
        if ($userDTO->getPassword() !== $confirmPassword){
            return false;
        }

        if(null !== $this->userRepository->findOneByUsername($userDTO->getName())){
            return false;
        }

        $this->encryptPassword($userDTO);

        return $this->userRepository->insert($userDTO);

    }

    public function login(string $userName, string $password): ?UserDTO
    {
        /**
         * @var UserDTO $user
         */
        $user=$this->userRepository->findOneByUsername($userName);

        if ($user === null){

            return null;
        }

        if (false === $this->encryptionService->verify($password, $user->getPassword())){

            return null;
        }

        return $user;
    }

    public function currentUser(): ?UserDTO
    {
       if(!$_SESSION['id']){
           return null;
       }

       return  $this->userRepository->findOneById((int) $_SESSION['id']);
    }

    public function isLogged(): bool
    {
        if (!$this->currentUser()){
            return false;
        }

        return true;
    }

    /**
     * @inheritDoc
     */
    public function getAll(): \Generator
    {
        $this->userRepository->findAll();
    }

    public function edit(UserDTO $userDTO): bool
    {

        if(null !== $this->userRepository->findOneByUsername($userDTO->getName())){
            return false;
        }

        $this->encryptPassword($userDTO);
        return $this->userRepository->update((int)$_SESSION['id'], $userDTO);
    }

    /**
     * @param UserDTO $userDTO
     */
    public function encryptPassword(UserDTO $userDTO): void
    {
        $plainPassword = $userDTO->getPassword();
        $passwordHash = $this->encryptionService->hash($plainPassword);
        $userDTO->setPassword($passwordHash);
    }

    public function addPhoneDB(PhonebookDTO $newPhone, UserDTO $userDTO)
    {

        $this->phoneBookRepository->addContact($newPhone);
        $userDTO->addPhone($newPhone);

        return true;

    }

    public function findAllPhones(int $sessionId, UserDTO $userDTO)
    {

      return  $this->phoneBookRepository->findAll($sessionId, $userDTO);

    }


    public function searchByName(string $name, $ownerID){

        return $this->phoneBookRepository->findContactByName($name, $ownerID);
    }


}