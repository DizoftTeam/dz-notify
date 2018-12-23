<?php
declare(strict_types=1);

namespace dz\notify\base;

use dz\notify\helpers\Client;
use dz\notify\interfaces\NotifyInterface;

/**
 * Класс базовой нотификации
 *
 * @package dz\notify\base
 */
abstract class BaseNotify extends BaseObject implements NotifyInterface
{
    /**
     * @var string URL до WebHook
     */
    public $url;

    /**
     * @var Client
     */
    protected $client;

    /**
     * Посылка нотификации
     *
     * @return mixed
     */
    abstract public function notify();

    /**
     * @inheritdoc
     */
    public function init(): void
    {
        $this->client = new Client([
            'url' => $this->url
        ]);

        parent::init();
    }
}
