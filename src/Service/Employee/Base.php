<?php

declare(strict_types=1);

namespace App\Service\Employee;

use App\Entity\Employee;
use App\Repository\EmployeeRepository;
use App\Service\BaseService;
use App\Service\RedisService;
use Respect\Validation\Validator as v;

abstract class Base extends BaseService
{
    private const REDIS_KEY = 'employee:%s';

    protected EmployeeRepository $employeeRepository;

    protected RedisService $redisService;

    public function __construct(
        EmployeeRepository $employeeRepository,
        RedisService $redisService
    ) {
        $this->employeeRepository = $employeeRepository;
        $this->redisService = $redisService;
    }

    protected static function validateEmployeeName(string $name): string
    {
        if (! v::length(1, 50)->validate($name)) {
            throw new \App\Exception\Employee('The name of the employee is invalid.', 400);
        }

        return $name;
    }

    protected function getOneFromCache(int $employeeId): object
    {
        $redisKey = sprintf(self::REDIS_KEY, $employeeId);
        $key = $this->redisService->generateKey($redisKey);
        if ($this->redisService->exists($key)) {
            $employee = $this->redisService->get($key);
        } else {
            $employee = $this->getOneFromDb($employeeId)->toJson();
            $this->redisService->setex($key, $employee);
        }

        return $employee;
    }

    protected function getOneFromDb(int $employeeId): Employee
    {
        return $this->employeeRepository->checkAndGetemployee($employeeId);
    }

    protected function saveInCache(int $id, object $employee): void
    {
        $redisKey = sprintf(self::REDIS_KEY, $id);
        $key = $this->redisService->generateKey($redisKey);
        $this->redisService->setex($key, $employee);
    }

    protected function deleteFromCache(int $employeeId): void
    {
        $redisKey = sprintf(self::REDIS_KEY, $employeeId);
        $key = $this->redisService->generateKey($redisKey);
        $this->redisService->del([$key]);
    }
}
