<?php

namespace ws\loewe\Utils\Graphics2D\Shapes;

use \ws\loewe\Utils\Graphics2D\Shapes\Styles\TextStyle;
use \ws\loewe\Utils\Graphics2D\DrawingPanes\DrawingPane;
use \ws\loewe\Utils\Geom\Point;

/**
 * This class represents a text shape.
 */
class Text implements IShape
{
    /**
     * the top-left corner of the Text
     *
     * @var Point
     */
    private $topLeftCorner  = null;

    /**
     * the style of the text
     *
     * @var TextStyle
     */
    protected $style = null;

    /**
     * the actual text of the Text
     *
     * @var string
     */
    private $text           = null;

    /**
     * This acts as the constructor of the class.
     *
     * @param Point $topLeftCorner the top-left corner where to position the text
     * @param TextStyle $textStyle the textStyle to use for the text.
     * @param string $text the actual text of the text shape
     */
    public function __construct(Point $topLeftCorner, TextStyle $style, $text)
    {
        $this->topLeftCorner  = $topLeftCorner;
        $this->style          = $style;
        $this->text           = $text;
    }

    /**
     *
     */
    public function draw(DrawingPane $drawingPane)
    {
        $drawingPane->setFontFamily($this->style->family)
                ->setFontSize($this->style->size)
                ->setFontColor($this->style->color)
                ->drawText($this->topLeftCorner, $this->text);
    }

    /**
     * @todo: to be implemented later
     */
    public function getConnectionPoint($orientation)
    {
        return null;
    }
}