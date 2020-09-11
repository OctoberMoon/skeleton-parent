<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace App\Controller;

use App\Constants\ErrorCode;
use App\Exception\BusinessException;
use Hyperf\Logger\LoggerFactory;
use Hyperf\Logger\Logger;

class IndexController extends AbstractController
{
    public function index()
    {
        throw new BusinessException(ErrorCode::ACCOUNT_ERROR);
        logger('cloud', 'default')->info('ewdsfsgsgs');
        return $this->response->success(111, 11);
//        $user = $this->request->input('user', 'Hyperf');
//        $method = $this->request->getMethod();
//
//        return [
//            'method' => $method,
//            'message' => "Hello {$user}.111111222",
//        ];
    }
}
