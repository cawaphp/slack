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

namespace Cawa\Slack\Commands;

use Cawa\Console\Command;
use Cawa\HttpClient\HttpClientFactory;
use Cawa\Slack\Transport\Http;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Webhook extends Command
{
    use HttpClientFactory;

    /**
     *
     */
    protected function configure()
    {
        $this->setName('slack:webhook')
            ->setDescription('Send error to sentry')
            ->addArgument('url', InputArgument::REQUIRED, 'Url')
            ->addArgument('payload', InputArgument::REQUIRED, 'Json payload')
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output) : int
    {
        $http = new Http();
        $return = $http->send($input->getArgument('url'), base64_decode($input->getArgument('payload')));

        return $return ? 0 : 1;
    }
}
