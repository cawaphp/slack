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

class AttachmentAction
{
    const TYPE_BUTTON = 'button';

    const STYLE_DEFAULT = 'default';
    const STYLE_PRIMARY = 'primary';
    const STYLE_DANGER = 'danger';

    /**
     * The required name field of the action. The name will be returned to your Action URL.
     *
     * @var string
     */
    protected $name;

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName(string $name) : self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * The required label for the action.
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
    public function setText(string $text) : self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Button style.
     *
     * @var string
     */
    protected $style;

    /**
     * @return string
     */
    public function getStyle() : ?string
    {
        return $this->style;
    }

    /**
     * @param string $style
     *
     * @return $this
     */
    public function setStyle(string $style) : self
    {
        $this->style = $style;

        return $this;
    }

    /**
     * The required type of the action.
     *
     * @var string
     */
    protected $type = self::TYPE_BUTTON;

    /**
     * @return string
     */
    public function getType() : string
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return $this
     */
    public function setType(string $type) : self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Optional value. It will be sent to your Action URL.
     *
     * @var string
     */
    protected $value;

    /**
     * @return string
     */
    public function getValue() : ?string
    {
        return $this->value;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setValue(string $value = null) : self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Confirmation field.
     *
     * @var ActionConfirmation
     */
    protected $confirm;

    /**
     * @return ActionConfirmation
     */
    public function getConfirm() : ?ActionConfirmation
    {
        return $this->confirm;
    }

    /**
     * @param ActionConfirmation $confirm
     *
     * @return $this
     */
    public function setConfirm(ActionConfirmation $confirm = null) : self
    {
        $this->confirm = $confirm;

        return $this;
    }

    /**
     * Get the array representation of this attachment action.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'name' => $this->getName(),
            'text' => $this->getText(),
            'style' => $this->getStyle(),
            'type' => $this->getType(),
            'value' => $this->getValue(),
            'confirm' => $this->getConfirm()->toArray(),
        ];
    }
}
