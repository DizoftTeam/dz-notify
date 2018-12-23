<?php
declare(strict_types=1);

namespace dz\notify\interfaces;

/**
 * Интерфейс описывающий методы для модуля оповещений
 *
 * @package dz\notify
 */
interface NotifyInterface
{
    /**
     * Посылка нотификации
     *
     * @return mixed
     */
    public function notify();
}
