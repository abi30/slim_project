<?php

declare(strict_types=1);

namespace App\Service\Employee;

final class Delete extends Base
{
    public function delete(int $employeeId): void
    {
        $this->getOneFromDb($employeeId);
        $this->employeeRepository->deleteEmployee($employeeId);
        if (self::isRedisEnabled() === true) {
            $this->deleteFromCache($employeeId);
        }
    }
}
