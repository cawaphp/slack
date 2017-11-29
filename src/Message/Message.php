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

namespace Cawa\Slack\Message;

use Cawa\Slack\Webhook;

class Message
{
    const ICON_TYPE_URL = 'icon_url';
    const ICON_TYPE_EMOJI = 'icon_emoji';

    /**
     * @param Webhook $webhook
     */
    public function __construct(Webhook $webhook = null)
    {
        $this->webhook = $webhook;
    }

    /**
     * Reference to the Slack webhook responsible for sending the message.
     *
     * @var Webhook
     */
    protected $webhook;

    /**
     * @return Webhook
     */
    public function getWebhook() : Webhook
    {
        return $this->webhook;
    }

    /**
     * @param Webhook $webhook
     *
     * @return $this
     */
    public function setWebhook(Webhook $webhook) : self
    {
        $this->webhook = $webhook;

        return $this;
    }

    /**
     * The text to send with the message.
     *
     * @var string
     */
    protected $text;

    /**
     * Get the message text.
     *
     * @return string
     */
    public function getText() : ?string
    {
        return $this->text;
    }

    /**
     * Set the message text.
     *
     * @param string $text
     *
     * @return $this
     */
    public function setText(string $text = null) : self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * The channel the message should be sent to.
     *
     * @var string
     */
    protected $channel;

    /**
     * Get the channel we will post to.
     *
     * @return string
     */
    public function getChannel() : string
    {
        return $this->channel;
    }

    /**
     * Set the channel we will post to.
     *
     * @param string $channel
     *
     * @return $this
     */
    public function setChannel(string $channel) : self
    {
        $this->channel = $channel;

        return $this;
    }

    /**
     * The username the message should be sent as.
     *
     * @var string
     */
    protected $username;

    /**
     * Get the username we will post as.
     *
     * @return string
     */
    public function getUsername() : string
    {
        return $this->username;
    }

    /**
     * Set the username we will post as.
     *
     * @param string $username
     *
     * @return $this
     */
    public function setUsername(string $username) : self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * The URL to the icon to use.
     *
     * @var string
     */
    protected $icon;

    /**
     * Get the icon (either URL or emoji) we will post as.
     *
     * @return string
     */
    public function getIcon() : ?string
    {
        return $this->icon;
    }

    /**
     * Set the icon (either URL or emoji) we will post as.
     *
     * @param string $icon
     *
     * @return $this
     */
    public function setIcon(string $icon = null) : self
    {
        if ($icon == null) {
            $this->icon = $this->iconType = null;

            return $this;
        }

        if (mb_substr($icon, 0, 1) == ':' && mb_substr($icon, mb_strlen($icon) - 1, 1) == ':') {
            $this->iconType = self::ICON_TYPE_EMOJI;
        } else {
            $this->iconType = self::ICON_TYPE_URL;
        }

        $this->icon = $icon;

        return $this;
    }

    /**
     * The type of icon we are using.
     *
     * @var string
     */
    protected $iconType;

    /**
     * Get the icon type being used, if an icon is set.
     *
     * @return string
     */
    public function getIconType() : ?string
    {
        return $this->iconType;
    }

    /**
     * Whether the message text should be interpreted in Slack's
     * Markdown-like language.
     *
     * @var bool
     */
    protected $allowMarkdown = true;

    /**
     * Get whether message text should be formatted with
     * Slack's Markdown-like language.
     *
     * @return bool
     */
    public function isAllowMarkdown() : bool
    {
        return $this->allowMarkdown;
    }

    /**
     * Set whether message text should be formatted with
     * Slack's Markdown-like language.
     *
     * @param bool $value
     *
     * @return $this
     */
    public function setAllowMarkdown(bool $value) : self
    {
        $this->allowMarkdown = $value;

        return $this;
    }

    /**
     * The attachment fields which should be formatted with
     * Slack's Markdown-like language.
     *
     * @var array
     */
    protected $markdownInAttachments = [];

    /**
     * Get the attachment fields which should be formatted
     * in Slack's Markdown-like language.
     *
     * @return array
     */
    public function getMarkdownInAttachments() : array
    {
        return $this->markdownInAttachments;
    }

    /**
     * Set the attachment fields which should be formatted
     * in Slack's Markdown-like language.
     *
     * @param array $fields
     *
     * @return $this
     */
    public function setMarkdownInAttachments(array $fields) : self
    {
        $this->markdownInAttachments = $fields;

        return $this;
    }

    /**
     * An array of attachments to send.
     *
     * @var array|Attachment[]
     */
    protected $attachments = [];

    /**
     * Get the attachments for the message.
     *
     * @return array|Attachment[]
     */
    public function getAttachments() : array
    {
        return $this->attachments;
    }

    /**
     * Set the attachments for the message.
     *
     * @param array|Attachment[] $attachments
     *
     * @return $this
     */
    public function setAttachments(array $attachments) : self
    {
        $this->clearAttachments();

        foreach ($attachments as $attachment) {
            $this->addAttachment($attachment);
        }

        return $this;
    }

    /**
     * Remove all attachments for the message.
     *
     * @return $this
     */
    public function clearAttachments() : self
    {
        $this->attachments = [];

        return $this;
    }

    /**
     * Whether to link names like @regan or leave
     * them as plain text.
     *
     * @var bool
     */
    protected $linkNames = false;

    /**
     * Get whether messages sent will have names (like @regan)
     * will be converted into links.
     *
     * @return bool
     */
    public function isLinkNames() : bool
    {
        return $this->linkNames;
    }

    /**
     * Set whether messages sent will have names (like @regan)
     * will be converted into links.
     *
     * @param bool $value
     *
     * @return $this
     */
    public function setLinkNames(bool $value) : self
    {
        $this->linkNames = $value;

        return $this;
    }

    /**
     * Whether Slack should unfurl text-based URLs.
     *
     * @var bool
     */
    protected $unfurlLinks = false;

    /**
     * Get whether text links should be unfurled.
     *
     * @return bool
     */
    public function isUnfurlLinks() : bool
    {
        return $this->unfurlLinks;
    }

    /**
     * Set whether text links should be unfurled.
     *
     * @param bool $value
     *
     * @return $this
     */
    public function setUnfurlLinks(bool $value) : self
    {
        $this->unfurlLinks = $value;

        return $this;
    }

    /**
     * Whether Slack should unfurl media URLs.
     *
     * @var bool
     */
    protected $unfurlMedia = true;

    /**
     * Get whether media links should be unfurled.
     *
     * @return bool
     */
    public function isUnfurlMedia() : bool
    {
        return $this->unfurlMedia;
    }

    /**
     * Set whether media links should be unfurled.
     *
     * @param bool $value
     *
     * @return $this
     */
    public function setUnfurlMedia(bool $value) : self
    {
        $this->unfurlMedia = $value;

        return $this;
    }

    /**
     * Add an attachment to the message.
     *
     * @param Attachment $attachment
     *
     * @return $this
     */
    public function addAttachment(Attachment $attachment) : self
    {
        $this->attachments[] = $attachment;

        return $this;
    }

    /**
     * Prepares the payload to be sent to the webhook.
     *
     * @return array
     */
    public function toArray() : array
    {
        $payload = [
            'text' => $this->getText(),
            'channel' => $this->getChannel(),
            'username' => $this->getUsername(),
            'link_names' => $this->isLinkNames() ? 1 : 0,
            'unfurl_links' => $this->isUnfurlLinks(),
            'unfurl_media' => $this->isUnfurlMedia(),
            'mrkdwn' => $this->isAllowMarkdown(),
        ];

        if ($icon = $this->getIcon()) {
            $payload[$this->getIconType()] = $icon;
        }

        $payload['attachments'] = [];
        foreach ($this->getAttachments() as $attachment) {
            $payload['attachments'][] = $attachment->toArray();
        }

        return $payload;
    }

    /**
     * Send the message.
     *
     * @param string $text The text to send
     *
     * @return bool
     */
    public function send(string $text = null) : bool
    {
        if ($text) {
            $this->setText($text);
        }

        return $this->webhook->send($this);
    }
}
