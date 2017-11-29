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

use Cawa\Http\Request;
use Cawa\HttpClient\HttpClientFactory;
use Cawa\Net\Uri;
use Cawa\Serializer\Json;
use Cawa\Slack\Message\Message;

class Webhook
{
    use HttpClientFactory;

    /**
     * @param string $endpoint
     */
    public function __construct(string $endpoint = null)
    {
        $this->endpoint = $endpoint;
    }

    /**
     * The Slack incoming webhook endpoint.
     *
     * @var string
     */
    protected $endpoint;

    /**
     * Get the Slack endpoint.
     *
     * @return string
     */
    public function getEndpoint() : string
    {
        return $this->endpoint;
    }

    /**
     * Set the Slack endpoint.
     *
     * @param string $endpoint
     *
     * @return $this
     */
    public function setEndpoint($endpoint) : self
    {
        $this->endpoint = $endpoint;

        return $this;
    }

    /**
     * The default channel to send messages to.
     *
     * @var string
     */
    protected $defaultChannel;

    /**
     * Get the default channel messages will be created for.
     *
     * @return string
     */
    public function getDefaultChannel() : string
    {
        return $this->defaultChannel;
    }

    /**
     * Set the default channel messages will be created for.
     *
     * @param string $channel
     *
     * @return $this
     */
    public function setDefaultChannel(string $channel) : self
    {
        $this->defaultChannel = $channel;

        return $this;
    }

    /**
     * The default username to send messages as.
     *
     * @var string
     */
    protected $defaultUsername;

    /**
     * Get the default username messages will be created for.
     *
     * @return string
     */
    public function getDefaultUsername() : ?string
    {
        return $this->defaultUsername;
    }

    /**
     * Set the default username messages will be created for.
     *
     * @param string $username
     *
     * @return $this
     */
    public function setDefaultUsername(string $username = null) : self
    {
        $this->defaultUsername = $username;

        return $this;
    }

    /**
     * The default icon to send messages with.
     *
     * @var string
     */
    protected $defaultIcon;

    /**
     * Get the default icon messages will be created with.
     *
     * @return string
     */
    public function getDefaultIcon() : ?string
    {
        return $this->defaultIcon;
    }

    /**
     * Set the default icon messages will be created with.
     *
     * @param string $icon
     *
     * @return $this
     */
    public function setDefaultIcon(string $icon = null) : self
    {
        $this->defaultIcon = $icon;

        return $this;
    }

    /**
     * Create a new message with defaults.
     *
     * @return Message
     */
    public function createMessage()
    {
        $message = new Message($this);

        if ($this->defaultChannel) {
            $message->setChannel($this->defaultChannel);
        }

        if ($this->defaultUsername) {
            $message->setUsername($this->defaultUsername);
        }

        if ($this->defaultIcon) {
            $message->setIcon($this->defaultIcon);
        }

        return $message;
    }

    /**
     * Send a message.
     *
     * @param Message $message
     *
     * @return bool
     */
    public function send(Message $message) : bool
    {
        $payload = $message->toArray();

        $request = (new Request(new Uri($this->endpoint)))
            ->setMethod('POST')
            ->setPayload(Json::encode($payload, JSON_UNESCAPED_UNICODE))
            ->addHeader('Content-type', 'application/json')
        ;

        $return = self::httpClient(self::class)->send($request);

        return $return->getBody() === 'ok';
    }
}
