<?php

namespace ws\loewe\Utils\Graphics2D\DrawingPanes;

use \ws\loewe\Utils\Color\Color;
use \ws\loewe\Utils\Geom\Dimension;
use \ws\loewe\Utils\Geom\Point;
use \ws\loewe\Utils\Graphics2D\Shapes\IShape;

/**
 * This interface defines a common super type for drawing panes.
 */
interface IDrawingPane
{
    /**
     * This method draws a generic shape onto the document.
     * 
     * The actual drawing should be delegated back to the shape, which then
     * draws itself on the document.
     *
     * @param IShape $shape the shape to draw
     * @return IDrawingPane $this
     */
    public function draw(IShape $shape);

    /**
     * This method draws a line on the document.
     *
     * @param Point $source the source point of the line
     * @param Point $target the target point of the line
     * @return IDrawingPane $this
     */
    function drawLine(Point $source, Point $target);

    /**
     * This method draws a poly line onto the the document.
     *
     * It expects an traversable of points, where each point is represented by a object of the class Point.
     *
     * @param \Traversable $points the coordinates of the points of the line
     * @return IDrawingPane $this
     */
    function drawPolyLine(\Traversable $points);

    /**
     * This method draws an ellipse on the document.
     *
     * @param Point $center the center of the ellipse
     * @param Dimension $dimension the dimension of the ellipse
     * @return IDrawingPane $this
     */
    function drawEllipse(Point $center, Dimension $dimension);

    /**
     * This method draws a rectangle on the document.
     *
     * @param Point $topLeftCorner the top left corner of the rectangle
     * @param Dimension $dimension the dimension of the rectangle
     * @return IDrawingPane $this
     */
    function drawRectangle(Point $topLeftCorner, Dimension $dimension);

    /**
     * This method draws a polygon on the document.
     *
     * @param \Traversable $points the points defining the polygon
     * @return IDrawingPane $this
     */
    function drawPolygon(\Traversable $points);

    /**
     * This method draws text at the given position.
     *
     * @param Point $topLeftCorner the top left corner of the text to draw
     * @param string $text the text to draw
     * @return IDrawingPane $this
     */
    function drawText(Point $topLeftCorner, $text);

    /**
     * This method sets the stroke width.
     *
     * @param int $strokeWidth the new stroke width
     * @return DrawingPane $this
     */
    function setStrokeWidth($strokeWidth);

    /**
     * This method sets the stroke color.
     *
     * @param Color $strokeColor the new stroke color
     * @return DrawingPane $this
     */
    public function setStrokeColor(Color $strokeColor);

    /**
     * This method sets the fill color.
     *
     * @param Color $fillColor the new fill color
     * @return DrawingPane $this
     */
    function setFillColor(Color $fillColor);

    /**
     * This method sets the font familiy.
     *
     * @param string $fontFamily the name of the new font family
     * @return DrawingPane $this
     */
    function setFontFamily($fontFamily);

    /**
     * This method sets the font size.
     *
     * @param int $fontSize the new font size in pixel
     * @return DrawingPane $this
     */
    function setFontSize($fontSize);

    /**
     * This method sets the font color.
     *
     * @param Color $fontColor the new font color
     * @return DrawingPane $this
     */
    function setFontColor(Color $fontColor);

    /**
     * This method saves this DrawingPane to a string.
     *
     * @return string
     */
    function save();
}