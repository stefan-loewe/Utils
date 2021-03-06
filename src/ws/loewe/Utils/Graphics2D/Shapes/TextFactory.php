<?php

namespace ws\loewe\Utils\Graphics2D\Shapes;

use \ws\loewe\Utils\Graphics2D\Shapes\Text;
use \ws\loewe\Utils\Graphics2D\Shapes\Styles\TextStyle;
use \ws\loewe\Utils\Geom\Point;
use \ws\loewe\ReingoldTilford\Models\ITreeModel;

/**
 * This class acts as factory for graphical text elements.
 */
final class TextFactory
{
    /**
     * This acts as the constructor of the class.
     */
    public function  __construct() {}

    /**
     * This method creates a text.
     *
     * @param TextStyle $textStyle the textStyle to use for the text.
     * @param Point $topLeftCorner the top-left corner where to position the text
     * @param string $text the text to represent
     * @return Text the new Text object
     */
    public function createText(TextStyle $textStyle, Point $topLeftCorner, $text)
    {
        return new Text($topLeftCorner, $textStyle, $text);
    }
}