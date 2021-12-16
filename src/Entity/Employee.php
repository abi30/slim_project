<?php

declare(strict_types=1);

namespace App\Entity;

final class Employee
{
    private int $id;

    private string $name;

    private int $age;


    private ?string $possion;

    public function toJson(): object
    {
        return json_decode((string) json_encode(get_object_vars($this)), false);
    }

    public function getId(): int
    {
        return $this->id;
    }


    public function getName(): string
    {
        return $this->name;
    }

    public function updateName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
    public function getAge(): int
    {
        return $this->age;
    }

    public function updateAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getPossion(): ?string
    {
        return $this->possion;
    }

    public function updatePossion(?string $possion): self
    {
        $this->possion = $possion;

        return $this;
    }
}
