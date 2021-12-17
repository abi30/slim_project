<?php

declare(strict_types=1);

namespace App\Service\User;

use App\Exception\User;
use DateTime;
use Firebase\JWT\JWT;
use Tuupola\Base62;

final class Login extends Base
{
    public function login(array $input): string
    {
        $data = json_decode((string) json_encode($input), false);
        if (! isset($data->email)) {
            throw new User('The field "email" is required.', 400);
        }
        if (! isset($data->password)) {
            throw new User('The field "password" is required.', 400);
        }
        $now = new DateTime();
        $future = new DateTime("now +2 hours");
        // $jti =Base62::encode(random_bytes(16));
        $password = hash('sha512', $data->password);
        $user = $this->userRepository->loginUser($data->email, $password);
        $token = [
            'sub' => $user->getId(),
            'email' => $user->getEmail(),
            'name' => $user->getName(),
            // "jti" => $jti,
            "iat" => $now->getTimeStamp(),
            "nbf" => $future->getTimeStamp(),
            // 'iat' => time(),
            'exp' => time() + (7 * 24 * 60 * 60),
        ];

        return JWT::encode($token, $_SERVER['SECRET_KEY']);
    }
}
