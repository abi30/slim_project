<?php

namespace App\Service;

use App\Service\Messages;
use Respect\Validation\Validator as v;

/**
 * Base Service.
 */
abstract class BaseService
{
    protected $database;

    protected $request;

    protected $response;

    protected $args;

    /**
     * Validate and sanitize a username.
     *
     * @param string $name
     * @return string
     * @throws \Exception
     */
    protected function validateName($name)
    {
        if (!v::alnum()->length(2, 100)->validate($name)) {
            throw new \Exception(Messages::USER_NAME_INVALID, 400);
        }

        return $name;
    }

    /**
     * Validate and sanitize a email address.
     *
     * @param string $emailValue
     * @return string
     * @throws \Exception
     */
    protected function validateEmail($emailValue)
    {
        $email = filter_var($emailValue, FILTER_SANITIZE_EMAIL);
        if (!v::email()->validate($email)) {
            throw new \Exception(Messages::USER_EMAIL_INVALID, 400);
        }

        return $email;
    }

    /**
     * Validate and sanitize a task name.
     *
     * @param string $name
     * @return string
     * @throws \Exception
     */
    protected function validateTaskName($name)
    {
        if (!v::alnum()->length(2, 100)->validate($name)) {
            throw new \Exception(Messages::TASK_NAME_INVALID, 400);
        }

        return $name;
    }

    /**
     * Validate and sanitize a task status.
     *
     * @param int $status
     * @return string
     * @throws \Exception
     */
    protected function validateStatus($status)
    {
        if (!v::numeric()->between(0, 1)->validate($status)) {
            throw new \Exception(Messages::TASK_STATUS_INVALID, 400);
        }

        return $status;
    }

    /**
     * Validate and sanitize input data when create new user.
     *
     * @param array $input
     * @return string
     * @throws \Exception
     */
    protected function validateInputOnCreateUser($input)
    {
        if (!isset($input['name'])) {
            throw new \Exception(Messages::USER_NAME_REQUIRED, 400);
        }
        $name = $this->validateName($input['name']);
        $email = null;
        if (isset($input['email'])) {
            $email = $this->validateEmail($input['email']);
        }

        return ['name' => $name, 'email' => $email];
    }

    /**
     * Validate and sanitize input data when update a user.
     *
     * @param array $input
     * @param object $user
     * @return string
     * @throws \Exception
     */
    protected function validateInputOnUpdateUser($input, $user)
    {
        if (!isset($input['name']) && !isset($input['email'])) {
            throw new \Exception(Messages::USER_INFO_REQUIRED, 400);
        }
        $name = $user->name;
        if (isset($input['name'])) {
            $name = $this->validateName($input['name']);
        }
        $email = $user->email;
        if (isset($input['email'])) {
            $email = $this->validateEmail($input['email']);
        }

        return ['name' => $name, 'email' => $email];
    }

    /**
     * Validate and sanitize input data when create new task.
     *
     * @param array $input
     * @return string
     * @throws \Exception
     */
    protected function validateInputOnCreateTask($input)
    {
        if (empty($input['task'])) {
            throw new \Exception(Messages::TASK_NAME_REQUIRED, 400);
        }
        $task = $this->validateTaskName($input['task']);
        $status = 0;
        if (isset($input['status'])) {
            $status = $this->validateStatus($input['status']);
        }

        return ['task' => $task, 'status' => $status];
    }

    /**
     * Validate and sanitize input data when update a task.
     *
     * @param array $input
     * @param object $task
     * @return string
     * @throws \Exception
     */
    protected function validateInputOnUpdateTask($input, $task)
    {
        if (!isset($input['task']) && !isset($input['status'])) {
            throw new \Exception(Messages::TASK_INFO_REQUIRED, 400);
        }
        $name = $task->task;
        if (isset($input['task'])) {
            $name = $this->validateTaskName($input['task']);
        }
        $status = $task->status;
        if (isset($input['status'])) {
            $status = $this->validateStatus($input['status']);
        }

        return ['task' => $name, 'status' => $status];
    }
}