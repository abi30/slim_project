<?php

declare(strict_types=1);

namespace App\Controller\Employee;

use Slim\Http\Request;
use Slim\Http\Response;

final class GetAll extends Base
{
    public function __invoke(
        Request $request,
        Response $response
    ): Response {
        $page = $request->getQueryParam('page', null);
        $perPage = $request->getQueryParam('perPage', null);
        $name = $request->getQueryParam('name', null);
        $age = $request->getQueryParam('age', null);
        $possion = $request->getQueryParam('possion', null);

        $employees = $this->getServiceFindEmployee()
            ->getEmployeesByPage((int) $page, (int) $perPage,$name,$age,$possion);

        return $this->jsonResponse($response, 'success', $employees, 200);
    }
}
