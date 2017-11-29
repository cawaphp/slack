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

class AttachmentField
{
    /**
     * @param string $title
     * @param string $value
     */
    public function __construct(string $title = null, string $value = null)
    {
        $this->title = $title;
        $this->value = $value;
    }

    /**
     * The required title field of the field.
     *
     * @var string
     */
    protected $title;

    /**
     * Get the title of the field.
     *
     * @return string
     */
    public function getTitle() : string
    {
        return $this->title;
    }

    /**
     * Set the title of the field.
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
     * The required value of the field.
     *
     * @var string
     */
    protected $value;

    /**
     * Get the value of the field.
     *
     * @return string
     */
    public function getValue() : string
    {
        return $this->value;
    }

    /**
     * Set the value of the field.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setValue(string $value) : self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Whether the value is short enough to fit side by side with
     * other values.
     *
     * @var bool
     */
    protected $short = true;

    /**
     * Get whether this field is short enough for displaying
     * side-by-side with other fields.
     *
     * @return bool
     */
    public function isShort() : bool
    {
        return $this->short;
    }

    /**
     * Set whether this field is short enough for displaying
     * side-by-side with other fields.
     *
     * @param bool $value
     *
     * @return $this
     */
    public function setShort(bool $value) : self
    {
        $this->short = (bool) $value;

        return $this;
    }

    /**
     * Get the array representation of this attachment field.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'title' => $this->getTitle(),
            'value' => $this->getValue(),
            'short' => $this->isShort(),
        ];
    }
}
