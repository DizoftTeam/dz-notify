<?php
declare(strict_types=1);

namespace dz\notify;

/**
 * Базовый класс
 *
 * @package dz\notify
 */
abstract class BaseObject
{
    public function __construct(array $params = [])
    {
        foreach ($params as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }

        $this->init();
    }

    public function init(): void
    {
    }
}
