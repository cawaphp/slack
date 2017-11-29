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

class ActionConfirmation
{
    /**
     * The required title for the pop up window.
     *
     * @var string
     */
    protected $title;

    /**
     * @return string
     */
    public function getTitle() : string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return $this
     */
    public function setTitle($title) : self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * The required description.
     *
     * @var string
     */
    protected $text;

    /**
     * @return string
     */
    public function getText() : string
    {
        return $this->text;
    }

    /**
     * @param string $text
     *
     * @return $this
     */
    public function setText($text) : self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * The text label for the OK button.
     *
     * @var string
     */
    protected $okText;

    /**
     * @return string
     */
    public function getOkText() : ?string
    {
        return $this->okText;
    }

    /**
     * @param string $okText
     *
     * @return $this
     */
    public function setOkText(string $okText = null) : self
    {
        $this->okText = $okText;

        return $this;
    }

    /**
     * The text label for the Cancel button.
     *
     * @var string
     */
    protected $dismissText;

    /**
     * @return string
     */
    public function getDismissText() : ?string
    {
        return $this->dismissText;
    }

    /**
     * @param string $dismissText
     *
     * @return $this
     */
    public function setDismissText(string $dismissText = null) : self
    {
        $this->dismissText = $dismissText;

        return $this;
    }

    /**
     * Get the array representation of this action confirmation.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'title' => $this->getTitle(),
            'text' => $this->getText(),
            'ok_text' => $this->getOkText(),
            'dismiss_text' => $this->getDismissText(),
        ];
    }
}
