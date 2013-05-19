<?php

namespace ws\loewe\Utils\Graphics2D\Shapes;

use \ws\loewe\Utils\Graphics2D\Shapes\Styles\ShapeStyle;

/**
 * This class represents an abstract shape.
 */
abstract class Shape implements IShape
{
    /**
     * the style of the shape
     *
     * @var ShapeStyle
     */
    protected $style = null;

    /**
     * This acts as the constructor of the class.
     *
     * @param ShapeStyle $style the style of the shape
     */
    protected function __construct(ShapeStyle $style)
    {
        $this->style = $style;
    }
}