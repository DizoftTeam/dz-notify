<?php
declare(strict_types=1);

namespace dz\notify\exceptions;

/**
 * Исключение, когда пришел неверный ответ
 *
 * @package dz\notify\exceptions
 */
class InvalidResponseException extends \Exception
{
    protected $message = 'Неверный ответ от сервера';
}
