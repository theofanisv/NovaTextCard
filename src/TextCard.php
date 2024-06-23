<?php

namespace Ericlagarda\NovaTextCard;

use Illuminate\Support\Str;
use Laravel\Nova\Card;

class TextCard extends Card
{

    /**
     * @param $component
     */
    public function __construct($component = null)
    {
        $this->withMeta([
            'center'         => true,
            'height'         => 'default',
            'headingRaw'     => false,
            'textRaw'        => false,
            'forceFullWidth' => false,
        ]);
    }

    /**
     * The width of the card (1/3, 1/2, or full).
     *
     * @var string
     */
    public $width = '1/3';

    public $heading = null;

    public $text = null;

    /**
     * Get the component name for the element.
     *
     * @return string
     */
    public function component()
    {
        return 'text-card';
    }

    /**
     * Set the text link
     *
     * @return $this
     */
    public function center($boolean = true)
    {
        return $this->withMeta(['center' => $boolean]);
    }

    /**
     * Set the text link
     *
     * @return $this
     */
    public function heading($text)
    {
        $this->heading = $text;

        return $this;
    }

    /**
     * Set the height of card
     *
     * @return $this
     */
    public function headingAsHtml()
    {
        return $this->withMeta(['headingRaw' => true]);
    }

    /**
     * Set the text link
     *
     * @return $this
     */
    public function text($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Set the height of card
     *
     * @return $this
     */
    public function textAsHtml()
    {
        return $this->withMeta(['textRaw' => true]);
    }

    /**
     * Set the height of card
     *
     * @return $this
     */
    public function height($height = 'auto')
    {
        return $this->withMeta(['height' => $height]);
    }

    /**
     * Set the height of card
     *
     * @return $this
     */
    public function forceFullWidth()
    {
        return $this->withMeta(['forceFullWidth' => true, 'width' => '5/6']);
    }

    /**
     * Prepare the element for JSON serialization.
     *
     * @return array
     */
    public function jsonSerialize(): array
    {
        return array_merge([
            'name'    => Str::random(16),
            'width'   => $this->width,
            'heading' => value($this->heading, $this),
            'text'    => value($this->text, $this),
        ], parent::jsonSerialize());
    }
}
