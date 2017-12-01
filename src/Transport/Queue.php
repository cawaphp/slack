<?php

/*
 * This file is part of the Сáша framework.
 *
 * (c) tchiotludo <http://github.com/tchiotludo>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace Cawa\Slack\Transport;

use Cawa\Queue\Job;
use Cawa\Queue\QueueFactory;
use Cawa\Slack\Commands\Webhook;

class Queue implements TransportInterface
{
    use QueueFactory;

    /**
     * {@inheritdoc}
     */
    public function send(string $url, string $payload) : bool
    {
        self::queue()->publish((new Job())
            ->setClass(Webhook::class)
            ->setBody([
                'url' => $url,
                'payload' => base64_encode($payload),
            ])
            ->serialize()
        );

        return true;
    }
}
