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

use Cawa\Date\DateTime;

class Attachment
{
    const COLOR_GOOD = 'good';
    const COLOR_WARNING = 'warning';
    const COLOR_DANGER = 'danger';

    /**
     * The fallback text to use for clients that don't support attachments.
     *
     * @var string
     */
    protected $fallback;

    /**
     * Get the fallback text.
     *
     * @return string
     */
    public function getFallback() : string
    {
        return $this->fallback;
    }

    /**
     * Set the fallback text.
     *
     * @param string $fallback
     *
     * @return $this
     */
    public function setFallback(string $fallback) : self
    {
        $this->fallback = $fallback;

        return $this;
    }

    /**
     * Optional text that should appear within the attachment.
     *
     * @var string
     */
    protected $text;

    /**
     * Get the optional text to appear within the attachment.
     *
     * @return string
     */
    public function getText() : ?string
    {
        return $this->text;
    }

    /**
     * Set the optional text to appear within the attachment.
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
     * Optional image that should appear within the attachment.
     *
     * @var string
     */
    protected $imageUrl;

    /**
     * Get the optional image to appear within the attachment.
     *
     * @return string
     */
    public function getImageUrl() : ?string
    {
        return $this->imageUrl;
    }

    /**
     * Set the optional image to appear within the attachment.
     *
     * @param string $imageUrl
     *
     * @return $this
     */
    public function setImageUrl(string $imageUrl = null)
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * Optional thumbnail that should appear within the attachment.
     *
     * @var string
     */
    protected $thumbUrl;

    /**
     * Get the optional thumbnail to appear within the attachment.
     *
     * @return string
     */
    public function getThumbUrl() : ?string
    {
        return $this->thumbUrl;
    }

    /**
     * Set the optional thumbnail to appear within the attachment.
     *
     * @param string $thumbUrl
     *
     * @return $this
     */
    public function setThumbUrl(string $thumbUrl = null)
    {
        $this->thumbUrl = $thumbUrl;

        return $this;
    }

    /**
     * Optional text that should appear above the formatted data.
     *
     * @var string
     */
    protected $pretext;

    /**
     * Get the text that should appear above the formatted data.
     *
     * @return string
     */
    public function getPretext() : ?string
    {
        return $this->pretext;
    }

    /**
     * Set the text that should appear above the formatted data.
     *
     * @param string $pretext
     *
     * @return $this
     */
    public function setPretext(string $pretext = null) : self
    {
        $this->pretext = $pretext;

        return $this;
    }

    /**
     * Optional title for the attachment.
     *
     * @var string
     */
    protected $title;

    /**
     * Get the title to use for the attachment.
     *
     * @return string
     */
    public function getTitle() : ?string
    {
        return $this->title;
    }

    /**
     * Set the title to use for the attachment.
     *
     * @param string $title
     *
     * @return $this
     */
    public function setTitle(string $title) : self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Optional title link for the attachment.
     *
     * @var string
     */
    protected $titleLink;

    /**
     * Get the title link to use for the attachment.
     *
     * @return string
     */
    public function getTitleLink() : ?string
    {
        return $this->titleLink;
    }

    /**
     * Set the title link to use for the attachment.
     *
     * @param string $titleLink
     *
     * @return $this
     */
    public function setTitleLink(string $titleLink = null) : self
    {
        $this->titleLink = $titleLink;

        return $this;
    }

    /**
     * Optional author name for the attachment.
     *
     * @var string
     */
    protected $authorName;

    /**
     * Get the author name to use for the attachment.
     *
     * @return string
     */
    public function getAuthorName() : ?string
    {
        return $this->authorName;
    }

    /**
     * Set the author name to use for the attachment.
     *
     * @param string $authorName
     *
     * @return $this
     */
    public function setAuthorName(string $authorName = null) : self
    {
        $this->authorName = $authorName;

        return $this;
    }

    /**
     * Optional author link for the attachment.
     *
     * @var string
     */
    protected $authorLink;

    /**
     * Get the author link to use for the attachment.
     *
     * @return string
     */
    public function getAuthorLink() : ?string
    {
        return $this->authorLink;
    }

    /**
     * Set the auhtor link to use for the attachment.
     *
     * @param string $authorLink
     *
     * @return $this
     */
    public function setAuthorLink(string $authorLink) : self
    {
        $this->authorLink = $authorLink;

        return $this;
    }

    /**
     * Optional author icon for the attachment.
     *
     * @var string
     */
    protected $authorIcon;

    /**
     * Get the author icon to use for the attachment.
     *
     * @return string
     */
    public function getAuthorIcon() : ?string
    {
        return $this->authorIcon;
    }

    /**
     * Set the author icon to use for the attachment.
     *
     * @param string $authorIcon
     *
     * @return $this
     */
    public function setAuthorIcon(string $authorIcon) : self
    {
        $this->authorIcon = $authorIcon;

        return $this;
    }

    /**
     * The color to use for the attachment.
     *
     * @var string
     */
    protected $color = self::COLOR_GOOD;

    /**
     * Get the color to use for the attachment.
     *
     * @return string
     */
    public function getColor() : string
    {
        return $this->color;
    }

    /**
     * Set the color to use for the attachment.
     *
     * @param string $color
     *
     * @return $this
     */
    public function setColor(string $color) : self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * The text to use for the attachment footer.
     *
     * @var string
     */
    protected $footer;

    /**
     * Get the footer to use for the attachment.
     *
     * @return string
     */
    public function getFooter() : ?string
    {
        return $this->footer;
    }

    /**
     * Set the footer text to use for the attachment.
     *
     * @param string $footer
     *
     * @return $this
     */
    public function setFooter(string $footer = null)
    {
        $this->footer = $footer;

        return $this;
    }

    /**
     * The icon to use for the attachment footer.
     *
     * @var string
     */
    protected $footerIcon;

    /**
     * Get the footer icon to use for the attachment.
     *
     * @return string
     */
    public function getFooterIcon() : ?string
    {
        return $this->footerIcon;
    }

    /**
     * Set the footer icon to use for the attachment.
     *
     * @param string $footerIcon
     *
     * @return $this
     */
    public function setFooterIcon(string $footerIcon = null) : self
    {
        $this->footerIcon = $footerIcon;

        return $this;
    }

    /**
     * The timestamp to use for the attachment.
     *
     * @var DateTime
     */
    protected $timestamp;

    /**
     * Get the timestamp to use for the attachment.
     *
     * @return DateTime
     */
    public function getTimestamp() : ?DateTime
    {
        return $this->timestamp;
    }

    /**
     * Set the timestamp to use for the attachment.
     *
     * @param DateTime $timestamp
     *
     * @return $this
     */
    public function setTimestamp(DateTime $timestamp = null) : self
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * The fields of the attachment.
     *
     * @var array|AttachmentField[]
     */
    protected $fields = [];

    /**
     * Get the fields for the attachment.
     *
     * @return array|AttachmentField[]
     */
    public function getFields() : array
    {
        return $this->fields;
    }

    /**
     * Set the fields for the attachment.
     *
     * @param array|AttachmentField[] $fields
     *
     * @return $this
     */
    public function setFields(array $fields) : self
    {
        $this->clearFields();

        foreach ($fields as $field) {
            $this->addField($field);
        }

        return $this;
    }

    /**
     * Add a field to the attachment.
     *
     * @param AttachmentField $field
     *
     * @return $this
     */
    public function addField(AttachmentField $field) : self
    {
        $this->fields[] = $field;

        return $this;
    }

    /**
     * Clear the fields for the attachment.
     *
     * @return $this
     */
    public function clearFields() : self
    {
        $this->fields = [];

        return $this;
    }

    /**
     * The fields of the attachment that Slack should interpret
     * with its Markdown-like language.
     *
     * @var array
     */
    protected $markdownFields = [];

    /**
     * Get the fields Slack should interpret in its
     * Markdown-like language.
     *
     * @return array
     */
    public function getMarkdownFields() : array
    {
        return $this->markdownFields;
    }

    /**
     * Add a fields Slack should interpret in its
     * Markdown-like language.
     *
     * @param string $field
     *
     * @return $this
     */
    public function addMarkdownFields(string $field) : self
    {
        $this->markdownFields[] = $field;

        return $this;
    }

    /**
     * Set the fields Slack should interpret in its
     * Markdown-like language.
     *
     * @param array $fields
     *
     * @return $this
     */
    public function setMarkdownFields(array $fields) : self
    {
        $this->markdownFields = $fields;

        return $this;
    }

    /**
     * A collection of actions (buttons) to include in the attachment.
     * A maximum of 5 actions may be provided.
     *
     * @var array|AttachmentAction
     */
    protected $actions = [];

    /**
     * Get the collection of actions (buttons) to include in the attachment.
     *
     * @return array|AttachmentAction[]
     */
    public function getActions() : array
    {
        return $this->actions;
    }

    /**
     * Set the collection of actions (buttons) to include in the attachment.
     *
     * @param array $actions
     *
     * @return $this
     */
    public function setActions($actions) : self
    {
        $this->clearActions();

        foreach ($actions as $action) {
            $this->addAction($action);
        }

        return $this;
    }

    /**
     * Clear the actions for the attachment.
     *
     * @return $this
     */
    public function clearActions() : self
    {
        $this->actions = [];

        return $this;
    }

    /**
     * Add an action to the attachment.
     *
     * @param AttachmentAction $action
     *
     * @return $this
     */
    public function addAction(AttachmentAction $action) : self
    {
        $this->actions[] = $action;

        return $this;
    }

    /**
     * Convert this attachment to its array representation.
     *
     * @return array
     */
    public function toArray()
    {
        $data = [
            'fallback' => $this->getFallback(),
            'text' => $this->getText(),
            'pretext' => $this->getPretext(),
            'color' => $this->getColor(),
            'footer' => $this->getFooter(),
            'footer_icon' => $this->getFooterIcon(),
            'ts' => $this->getTimestamp() ? $this->getTimestamp()->getTimestamp() : null,
            'mrkdwn_in' => $this->getMarkdownFields(),
            'image_url' => $this->getImageUrl(),
            'thumb_url' => $this->getThumbUrl(),
            'title' => $this->getTitle(),
            'title_link' => $this->getTitleLink(),
            'author_name' => $this->getAuthorName(),
            'author_link' => $this->getAuthorLink(),
            'author_icon' => $this->getAuthorIcon(),
        ];

        foreach ($this->getFields() as $field) {
            $data['fields'][] = $field->toArray();
        }

        foreach ($this->getActions() as $action) {
            $data['actions'][] = $action->toArray();
        }

        return $data;
    }
}
