<?php

declare(strict_types=1);

namespace App\Controller\Employee;

use App\Controller\BaseController;
use App\Service\Employee\Create;
use App\Service\Employee\Delete;
use App\Service\Employee\Find;
use App\Service\Employee\Update;

abstract class Base extends BaseController
{
    protected function getServiceFindEmployee(): Find
    {
        return $this->container->get('find_employee_service');
    }

    protected function getServiceCreateEmployee(): Create
    {
        return $this->container->get('create_employee_service');
    }

    protected function getServiceUpdateEmployee(): Update
    {
        return $this->container->get('update_employee_service');
    }

    protected function getServiceDeleteEmployee(): Delete
    {
        return $this->container->get('delete_employee_service');
    }
}
