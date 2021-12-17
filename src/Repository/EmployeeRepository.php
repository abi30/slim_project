<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Employee;

final class EmployeeRepository extends BaseRepository
{
    public function checkAndGetEmployee(int $employeeId): Employee
    {
        $query = 'SELECT * FROM `employees` WHERE `id` = :id';
        $statement = $this->database->prepare($query);
        $statement->bindParam(':id', $employeeId);
        $statement->execute();
        $employee = $statement->fetchObject(Employee::class);
        if (! $employee) {
            throw new \App\Exception\Employee('Employee not found.', 404);
        }

        return $employee;
    }

    public function getEmployees(): array
    {
        $query = "SELECT * FROM `employees` ORDER BY `id`";
        $statement = $this->database->prepare($query);
        $statement->execute();

        return (array) $statement->fetchAll();
    }

    public function getQueryEmployeesByPage(): string
    {
        return "
            SELECT *
            FROM `employees`
            WHERE 
            `name` LIKE CONCAT('%', :name , '%')
            AND `age` LIKE CONCAT('%', :age , '%')
            AND `possion` LIKE CONCAT('%', :possion , '%')
            ORDER BY `id`
        ";
    }

    public function getEmployeesByPage(
        int $page,
        int $perPage,
        ?string $name,
        ?string $age,
        ?string $possion
    ): array {
        $params = [
            'name' => is_null($name) ? '' : $name,
            'age' => is_null($age) ? '' : $age,
            'possion' => is_null($possion) ? '' : $possion,
        ];
        
        $query = $this->getQueryEmployeesByPage();
        $statement = $this->database->prepare($query);
        $statement->bindParam(':name', $params['name']);
        $statement->bindParam(':age', $params['age']);
        $statement->bindParam(':possion', $params['possion']);
        $statement->execute();
        $total = $statement->rowCount();

        return $this->getResultsWithPagination(
            $query,
            $page,
            $perPage,
            $params,
            $total
        );
    }

    public function createEmployee(Employee $employee): Employee
    {
        $query = '
            INSERT INTO `employees`
                (`name`, `age`, `possion`)
            VALUES
                (:name, :age, :possion)
        ';
        $statement = $this->database->prepare($query);
        $name = $employee->getName();
        $age = $employee->getAge();
        $pos = $employee->getPossion();
        $statement->bindParam(':name', $name);
        $statement->bindParam(':age', $age);
        $statement->bindParam(':possion', $pos);
        $statement->execute();

        return $this->checkAndGetEmployee((int) $this->database->lastInsertId());
    }

    public function updateEmployee(Employee $employee): Employee
    {
        $query = "
            UPDATE `employees`
            SET `name` = :name, `age` = :age, `possion` = :possion
            WHERE `id` = :id
        ";
        $statement = $this->database->prepare($query);
        $id = $employee->getId();
        $name = $employee->getName();
        $desc = $employee->getAge();
        $desc = $employee->getPossion();
        $statement->bindParam(':id', $id);
        $statement->bindParam(':name', $name);
        $statement->bindParam(':age', $age);
        $statement->bindParam(':possion', $desc);
        $statement->execute();

        return $this->checkAndGetEmployee((int) $id);
    }

    public function deleteEmployee(int $employeeId): void
    {
        $query = 'DELETE FROM `employees` WHERE `id` = :id';
        $statement = $this->database->prepare($query);
        $statement->bindParam(':id', $employeeId);
        $statement->execute();
    }
}
