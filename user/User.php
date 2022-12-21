<?php

class User
{
    private string $email;
    private string $fio;
    private string $bloodGroup;
    private string $resusFactor;
    private string $birthday;
    private string $password;


    /**
     * @param array $params the POST.
     */
    public function __construct(array $params)
    {
        $this->email = $params['email'];
        $this->fio = $params['fio'];
        $this->bloodGroup = $params['bloodGroup'];
        $this->resusFactor = $params['resusFactor'];
        $this->birthday = $params['date_of_birthday'];
        $this->password = $params['password'];
    }

    public function getEmail(): string {
        return $this->email;
    }
    public function getFio(): string{
        return $this->fio;
    }
    public function getBloodGroup(): string{
        return $this->bloodGroup;
    }
    public function getResusFactor(): string{
        return $this->resusFactor;
    }
    public function getBirthday(): string{
        return $this->birthday;
    }
    public function getPassword(): string{
        return $this->password;
    }
}