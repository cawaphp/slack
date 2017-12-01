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

namespace Cawa\Slack;

use Cawa\Core\DI;
use Cawa\Net\Uri;

trait SlackFactory
{
    /**
     * @param string $name config key or class name
     *
     * @return Webhook
     */
    private static function slackWebhook(string $name = null) : Webhook
    {
        list($container, $config, $return) = DI::detect(__METHOD__, 'slack', $name, false);

        if ($return) {
            return $return;
        }

        $item = new Webhook();

        if (isset($config['endpoint'])) {
            $item->setEndpoint($config['endpoint']);
        }

        if (isset($config['transport'])) {
            $item->setTransport(new $config['transport']());
        }

        if (isset($config['username'])) {
            $item->setDefaultUsername($config['username']);
        }

        if (isset($config['channel'])) {
            $item->setDefaultChannel($config['channel']);
        }

        if (isset($config['icon'])) {
            $item->setDefaultIcon((new Uri($config['icon']))->get(false));
        }

        return DI::set(__METHOD__, $container, $item);
    }
}
