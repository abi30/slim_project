<?php

declare(strict_types=1);

namespace App\Controller\Employee;

use Slim\Http\Request;
use Slim\Http\Response;

final class GetOne extends Base
{
    public function __invoke(
        Request $request,
        Response $response,
        array $args
    ): Response {
        $employee = $this->getServiceFindEmployee()->getOne((int) $args['id']);

        return $this->jsonResponse($response, 'success', $employee, 200);
    }
}
