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

interface TransportInterface
{
    /**
     * @param string $url
     * @param string $payload
     *
     * @return bool
     */
    public function send(string $url, string $payload) : bool;
}
