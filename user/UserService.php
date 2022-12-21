<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/autoshop/user/AuthUser.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/autoshop/user/User.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/autoshop/user/UserRepository.php';

class UserService{

    private UserRepository $repository;

    public function __construct(UserRepository $repository) {
        $this->repository = $repository;
    }

    public function auth(): string {
        $auth = new AuthUser($_POST);
        if($this->isAuthorized()) {
            return 'you already authorized';
        }
        if($_SERVER['REQUEST_METHOD'] != 'POST') {
            return 'wrong method';
        }
        $user = $this->repository->byEmail($auth->getEmail());
        if(null == $user) {
            return 'User with this email doesn\'t exist.';
        }
        if ($auth->getPassword() != $user['password']) {
            return 'wrong password';
        }
        $_SESSION['USER_ID'] = $user['id'];
        return 'authorized';
    }

    public function registration(): string {
        if($_SERVER['REQUEST_METHOD'] != 'POST') {
            return 'wrong method';
        }
        try {
            $user = new User($_POST);
            if(null != $this->repository->byEmail($user->getEmail())) {
                return 'User with this email already exist';
            }
            $this->repository->create($user);

        } catch(Exception $ex) {
            return $ex->getMessage();
        }
        return 'success';
    }

    public function current(): mixed {
        if (!$this->isAuthorized()) {
            return null;
        }
        return $this->repository->byId($_SESSION['USER_ID']);
    }

    public function logout(): mixed {
        unset($_SESSION['USER_ID']);
        return null;
    }

    private function isAuthorized(): bool {
        return isset($_SESSION['USER_ID']);
    }
}