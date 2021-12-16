<?php

declare(strict_types=1);

namespace App\Service\Employee;

use App\Entity\Employee;

final class Update extends Base
{
    public function update(array $input, int $employeeId): object
    {
        $employee = $this->getOneFromDb($employeeId);
        $data = json_decode((string) json_encode($input), false);
        if (isset($data->name)) {
            $employee->updateName(self::validateEmployeeName($data->name));
        }
        if (isset($data->description)) {
            $employee->updatePossion($data->possion);
        }
        /** @var Employee $employees */
        $employees = $this->employeeRepository->updateEmployee($employee);
        if (self::isRedisEnabled() === true) {
            $this->saveInCache($employees->getId(), $employees->toJson());
        }

        return $employees->toJson();
    }
}
