<?php
namespace App\DTO;
class UserDTO
{
    public function __construct(
        private string $name,
        private string $surname,
        private string $email,
        private string $dateOfBirth,
    ) {

    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getDateOfBirth(): string
    {
        return $this->dateOfBirth;
    }

    public static function fromArray(array $data): static
    {
        return new static(
            name: $data['name'],
            surname: $data['surname'],
            email: $data['email'],
            dateOfBirth: $data['dateOgBirth']
        );
    }
}

