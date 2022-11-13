<?php

namespace kradwhite\myTarget\api\oauth2\grant;

use GuzzleHttp\Exception\GuzzleException;
use kradwhite\myTarget\api\oauth2\Transport;

/**
 * Получение данных по коду
 * Class CodeInfo
 *
 * @package kradwhite\myTarget\api\oauth2\grant
 * @link    https://target.my.com/adv/api-marketing/doc/authorization
 */
class CodeInfo
{
    /** @var Transport */
    private $transport;

    /** @var string */
    private $code = null;

    /** @var string */
    private $client_id;

    /** @var string */
    private $client_secret;

    /**
     * CodeInfo constructor.
     *
     * @param Transport $transport
     * @param string    $code
     * @param string    $client_id
     * @param string    $client_secret
     */
    public function __construct(Transport $transport, string $code, string $client_id, string $client_secret)
    {
        $this->transport     = $transport;
        $this->code          = $code;
        $this->client_id     = $client_id;
        $this->client_secret = $client_secret;
    }

    /**
     * @return mixed
     * @throws GuzzleException
     */
    public function request()
    {
        $form_params = [
            'code'          => $this->code,
            'client_id'     => $this->client_id,
            'client_secret' => $this->client_secret
        ];
        return $this->transport->request('post', 'code_info.json', ['form_params' => $form_params]);
    }
}
