<?php


namespace App\Controller\Api;

use App\Constants\ErrorCode;
use Hyperf\Di\Annotation\Inject;


class UserController
{
    /**
     * @Inject()
     * @var UserService
     */
    private $userService;

    public function login()
    {
        return $this->userService;
    }
}