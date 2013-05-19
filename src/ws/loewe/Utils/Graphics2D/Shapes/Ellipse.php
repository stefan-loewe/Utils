<?php

namespace ws\loewe\Utils\Graphics2D\Shapes;

use \ws\loewe\Utils\Graphics2D\Shapes\Styles\ShapeStyle;
use \ws\loewe\Utils\Graphics2D\DrawingPanes\DrawingPane;
use \ws\loewe\Utils\Geom\Dimension;
use \ws\loewe\Utils\Geom\Point;

/**
 * This class represents an ellipse shape.
 */
class Ellipse extends Shape
{
    /**
     * the center of the Ellipse
     *
     * @var Point
     */
    private $center     = null;

    /**
     * the dimension of the Ellipse
     *
     * @var Dimension
     */
    private $dimension  = null;

    /**
     * This acts as the constructor of the class.
     *
     * @param Point $center the center of the Ellipse.
     * @param ShapeStyle $style the style of the Ellipse.
     */
    public function __construct(Point $center, ShapeStyle $style)
    {
        parent::__construct($style);

        $this->center       = $center;

        $this->dimension    = new Dimension($this->style->width, $this->style->height);
    }

    /**
     *
     */
    public function draw(DrawingPane $document)
    {
        $document->setStrokeWidth($this->style->border->width)
                ->setStrokeColor($this->style->border->color)
                ->setFillColor($this->style->color)
                ->drawEllipse($this->center, $this->dimension);
    }

    /**
     *
     */
    public function getConnectionPoint($orientation)
    {
        if($orientation === IShape::NORTH)
            $offset = new Dimension(0, -$this->style->height);

        else if($orientation === IShape::SOUTH)
            $offset = new Dimension(0, $this->dimension->height);

        return $this->center->moveBy($offset);
    }
}