<?php
declare(strict_types=1);

namespace dz\notify\helpers;

use dz\notify\base\BaseObject;

/**
 * Curl клиент для посылки запросов
 *
 * @package dz\notify
 */
class Client extends BaseObject
{
    /**
     * @var string $url URL запроса
     */
    public $url;

    /**
     * @var resource Curl handler resource
     */
    private $_client;

    /**
     * Инициализация curl
     */
    public function init(): void
    {
        parent::init();

        $this->_client = curl_init();

        curl_setopt($this->_client, CURLOPT_URL, $this->url);
    }

    /**
     * Выполнение POST запроса
     *
     * @param array $data
     * @return bool|string
     */
    public function post(array $data = [])
    {
        $jsonData = json_encode($data);

        curl_setopt($this->_client, CURLOPT_POST, true);
        curl_setopt($this->_client, CURLOPT_POSTFIELDS, $jsonData);

        return $this->run();
    }

    /**
     * Выполнение запроса
     *
     * @param bool $shouldClose Нужно ли закрывать соединение
     * @return bool|string
     */
    private function run(bool $shouldClose = false)
    {
        curl_setopt($this->_client, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($this->_client);

        if ($shouldClose) {
            curl_close($this->_client);
        }

        return $result;
    }
}
