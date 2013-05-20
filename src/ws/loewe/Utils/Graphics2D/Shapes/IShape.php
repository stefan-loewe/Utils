<?php

namespace ws\loewe\Utils\Graphics2D\Shapes;

use \ws\loewe\Utils\Graphics2D\DrawingPanes\DrawingPane;

/**
 * This interface defines a type for generic shapes.
 */
interface IShape
{
    /**
     * the identifier for a connection point facing north
     */
    const NORTH = 0;

    /**
     * the identifier for a connection point facing south
     */
    const SOUTH = 1;

    /**
     * This method draws the shape onto the IDrawingPane.
     *
     * @param DrawingPane $drawingPane
     */
    function draw(DrawingPane $drawingPane);

    /**
     * This method returns the connection points of a shape.
     *
     * @param int $orientation where the connections should face to, either IShape::NORTH or IShape::SOUTH
     */
    function getConnectionPoint($orientation);
}