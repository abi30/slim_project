<?php

declare(strict_types=1);

namespace App\Service\Employee;

use App\Entity\Employee;

final class Create extends Base
{
    public function create(array $input): object
    {
        $data = json_decode((string) json_encode($input), false);
        // print_r($data);
        // exit;
        if (! isset($data->name)) {
            throw new \App\Exception\Employee('Invalid data: name is required.', 400);
        }
        $myemployee = new Employee();
        $myemployee->updateName(self::validateEmployeeName($data->name));
        $age = $data->age ?? null;
        $pos = $data->possion ?? null;
        $myemployee->updatePossion($pos);
        $myemployee->updateAge($age);
        /** @var Employee $note */
        $employee = $this->employeeRepository->createEmployee($myemployee);
        if (self::isRedisEnabled() === true) {
            $this->saveInCache($employee->getId(), $employee->toJson());
        }

        return $employee->toJson();
    }
}
