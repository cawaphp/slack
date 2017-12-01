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

use Cawa\Http\Request;
use Cawa\HttpClient\HttpClientFactory;
use Cawa\Net\Uri;

class Http implements TransportInterface
{
    use HttpClientFactory;

    /**
     * {@inheritdoc}
     */
    public function send(string $url, string $payload) : bool
    {
        $request = (new Request(new Uri($url)))
            ->setMethod('POST')
            ->setPayload($payload)
            ->addHeader('Content-type', 'application/json')
        ;

        $return = self::httpClient(self::class)->send($request);

        return $return->getBody() === 'ok';
    }
}
