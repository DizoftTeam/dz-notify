<?php
declare(strict_types=1);

namespace dz\notify\base;

/**
 * Базовый класс
 *
 * @package dz\notify
 */
abstract class BaseObject
{
    public final function __construct(array $params = [])
    {
        foreach ($params as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }

        $this->init();
    }

    /**
     * Функция для инициализации модуля
     */
    public function init(): void
    {
    }
}
