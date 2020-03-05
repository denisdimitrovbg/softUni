<?php


namespace Service;


use \Data\UserDTO;
use \Repository\UserRepositoryInterface;
use Service\Encryption\EncryptionServiceInterface;
use Generator;

class UserService implements UserServiceInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * @var EncryptionServiceInterface
     */
    private $encryprionService;

    public function __construct(UserRepositoryInterface $userRepository, EncryptionServiceInterface $encryptionService)
    {
        $this->userRepository=$userRepository;
        $this->encryprionService= $encryptionService;
    }


    public function register(UserDTO $userDTO, string $confirmPassword): bool
    {
        if($userDTO->getPassword() !== $confirmPassword){
            return false;
        }

        if (null !== $this->userRepository->findOneByUsername($userDTO->getUsername())){
            return false;
        }

        $this->encryptPassword($userDTO);

        return $this->userRepository->insert($userDTO);

    }

    public function login(string $username, string $password): ?UserDTO
    {
        $user= $this->userRepository->findOneByUsername($username);
        if ($user === null){
            return null;
        }

        if (false === $this->encryprionService->verify($password, $user->getPassword())){
            return null;
        }
        return $user;

    }

    public function currentUser(): ?UserDTO
    {
        if (!$_SESSION['id']){
            return null;
        }

        return $this->userRepository->findOneById((int) $_SESSION['id']);
    }

    public function isLogged(): bool
    {
        if(!$this->currentUser()){
            return false;
        }
        return true;
    }

    public function Edit(UserDTO $userDTO): bool
    {

        if (null !== $this->userRepository->findOneByUsername($userDTO->getUsername())){
            return false;
        }
        $this->encryptPassword($userDTO);
        return $this->userRepository->update(((int) $_SESSION['id']), $userDTO);
    }

    /**
     * @inheritDoc
     */
    public function getAll(): Generator
    {
       return $this->userRepository->findAll();
    }

    /**
     * @param UserDTO $userDTO
     */
    public function encryptPassword(UserDTO $userDTO): void
    {
        $plainPassword = $userDTO->getPassword();
        $passwordHash = $this->encryprionService->hash($plainPassword);
        $userDTO->setPassword($passwordHash);
    }
}