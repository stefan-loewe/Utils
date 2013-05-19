<?php

namespace ws\loewe\Utils\Graphics2D\Shapes;

use \ws\loewe\Utils\Graphics2D\Shapes\Styles\ShapeStyle;
use \ws\loewe\Utils\Graphics2D\DrawingPanes\DrawingPane;
use \ws\loewe\Utils\Geom\Dimension;
use \ws\loewe\Utils\Geom\Point;

/**
 * This class represents a rectangle shape.
 */
class Rectangle extends Shape
{
    /**
     * the top-left corner of the Rectangle
     *
     * @var Point
     */
    private $topLeftCorner  = null;

    /**
     * the dimension of the Rectangle
     *
     * @var Dimension
     */
    private $dimension      = null;

    /**
     * This acts as the constructor of the class.
     *
     * @param Point $topLeftCorner the center of the Rectangle.
     * @param ShapeStyle $style the style of the Rectangle.
     */
    public function __construct(Point $topLeftCorner, ShapeStyle $style)
    {
        parent::__construct($style);

        $this->topLeftCorner    = $topLeftCorner;

        $this->dimension        = new Dimension($this->style->width, $this->style->height);
    }

    /**
     *
     */
    public function draw(DrawingPane $document)
    {
        $document->setStrokeWidth($this->style->border->width)
                ->setStrokeColor($this->style->border->color)
                ->setFillColor($this->style->color)
                ->drawRectangle($this->topLeftCorner, $this->dimension);
    }

    /**
     *
     */
    public function getConnectionPoint($orientation)
    {
        if($orientation === IShape::NORTH)
            $offset = new Dimension($this->dimension->width / 2, -$this->style->border->width);

        else if($orientation === IShape::SOUTH)
            $offset = new Dimension($this->dimension->width / 2, $this->dimension->height + $this->style->border->width);

        return $this->topLeftCorner->moveBy($offset);
    }
}