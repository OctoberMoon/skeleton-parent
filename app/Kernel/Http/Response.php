<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

namespace App\Kernel\Http;

use App\Constants\ErrorCode;
use Hyperf\HttpMessage\Cookie\Cookie;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Hyperf\Utils\Context;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as PsrResponseInterface;

class Response
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var ResponseInterface
     */
    protected $response;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->response = $container->get(ResponseInterface::class);
    }

    /**
     * @param $data
     * @return PsrResponseInterface
     */
    public function json($data)
    {
        return $this->response->json($data);
    }

    /**
     * @param string $message
     * @param string $data
     * @return PsrResponseInterface
     */
    public function success($data = '', $message = 'success')
    {
        $data = [
            'status_code' => 200,
            'message' => $message,
            'data' => $data
        ];

        return $this->response->json($data);
    }

    /**
     * @param string $message
     * @param int $code
     * @param string $data
     * @return PsrResponseInterface
     */
    public function fail($code = ErrorCode::SERVER_ERROR, $message = '', $data = '')
    {
        if($data){
            return $this->response->json([
                'status_code' => $code,
                'message' => $message,
                'data' => $data,
            ]);
        }else{
            return $this->response->json([
                'status_code' => $code,
                'message' => $message,
            ]);
        }

    }

    public function redirect($url, $status = 302)
    {
        return $this->response()
            ->withAddedHeader('Location', (string)$url)
            ->withStatus($status);
    }

    public function cookie(Cookie $cookie)
    {
        $response = $this->response()->withCookie($cookie);
        Context::set(PsrResponseInterface::class, $response);
        return $this;
    }

    /**
     * @return \Hyperf\HttpMessage\Server\Response
     */
    public function response()
    {
        return Context::get(PsrResponseInterface::class);
    }
}
