<?php
declare(strict_types=1);

require("../vendor/autoload.php");

use dz\notify\Slack;

$slack = new Slack([
    'url' => 'https://hooks.slack.com/services/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',

    'text' => 'Hell oFrom PHp ' . time(),
]);

$slack->notify();

$slack->text = 'Another one ' . time();

$slack->notify();
