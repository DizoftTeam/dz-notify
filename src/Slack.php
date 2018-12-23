<?php
declare(strict_types=1);

namespace dz\notify;

use dz\notify\base\BaseNotify;
use dz\notify\exceptions\InvalidResponseException;

/**
 * Модуль оповещений использующий Slack
 *
 * @package dz\notify
 */
class Slack extends BaseNotify
{
    /**
     * @var string Имя канала, в который будем отправлять данные
     */
    public $channel;

    /**
     * @var string Текст оповещения
     */
    public $text;

    /**
     * @var string Имя пользователя, от имени кого будетм приходить сообщение
     */
    public $username;

    /**
     * @var string Иконка от кого пришло сообщение. Может быть URL до стороннего ресурса
     */
    public $icon_emoji;

    /**
     * Посылка нотификации
     *
     * @return bool
     * @throws InvalidResponseException
     */
    public function notify()
    {
        $result = $this->client->post([
            'text' => $this->text,
            'username' => $this->username,
            'icon_emoji' => $this->icon_emoji,
            'channel' => $this->getChannel()
        ]);

        if ($result !== 'ok') {
            throw new InvalidResponseException();
        }

        return true;
    }

    /**
     * Получение имени канала
     * Если в нем нет # то она добавится
     *
     * @return string
     */
    private function getChannel(): string
    {
        if (empty($this->channel)) {
            return '';
        }

        if (strpos($this->channel, '#') === false) {
            return "#{$this->channel}";
        }

        return $this->channel;
    }
}
