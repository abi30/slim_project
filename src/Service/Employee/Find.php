<?php

declare(strict_types=1);

namespace App\Service\Employee;

final class Find extends Base
{
    public function getAll(): array
    {
        return $this->employeeRepository->getEmployees();
    }

    public function getEmployeesByPage(
        int $page,
        int $perPage,
        ?string $name,
        ?string $age,
        ?string $possion
    ): array {
        if ($page < 1) {
            $page = 1;
        }
        if ($perPage < 1) {
            $perPage = self::DEFAULT_PER_PAGE_PAGINATION;
        }

        return $this->employeeRepository->getEmployeesByPage(
            $page,
            $perPage,
            $name,
            $age,
            $possion
        );
    }

    public function getOne(int $employeeId): object
    {
        if (self::isRedisEnabled() === true) {
            $employee = $this->getOneFromCache($employeeId);
        } else {
            $employee = $this->getOneFromDb($employeeId)->toJson();
        }

        return $employee;
    }
}
