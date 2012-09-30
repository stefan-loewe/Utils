<?php

namespace ws\loewe\Utils\Geom;

/**
 * This class represents a point in the two-dimensional space.
 */
class Point
{
    /**
     * the x-coordinate of the point
     *
     * @var int
     */
    private $x = null;

    /**
     * the y-coordinate of the point
     *
     * @var int
     */
    private $y = null;

    /**
     * This method acts as the constructor of the class.
     *
     * @param int $x the x-coordinate of the point
     * @param int $y the y-coordinate of the point
     */
    public function __construct($x, $y)
    {
        $this->x = $x;

        $this->y = $y;
    }

    /**
     * This method is a magic getter method for the class.
     *
     * @todo replace this with Trait in PHP 5.4
     * @param string $memberName the name of the member to get
     * @return mixed the value of the member
     */
    public function __get($memberName)
    {
        return $this->$memberName;
    }

    /**
     * This method sets the x-coordinate of the point.
     *
     * @param int $x the new x-coordinate of the point
     * @return \ws\loewe\Utils\Geom\Point this point
     */
    public function setX($x)
    {
        return new Point($x, $this->y);
    }

    /**
     * This method sets the y-coordinate of the point.
     *
     * @param int $y the new y-coordinate of the point
     * @return \ws\loewe\Utils\Geom\Point this point
     */
    public function setY($y)
    {
        return new Point($this->x, $y);
    }

    /**
     * This method moves a point by an offset, given as dimension.
     *
     * @param \ws\loewe\Utils\Geom\Dimension $dimension the dimension by which this point shall be moved by
     * @return \ws\loewe\Utils\Geom\Point a new point moved by the offset encapsulated by the given point
     */
    public function moveBy(Dimension $dimension)
    {
        return new Point($this->x + $dimension->width, $this->y + $dimension->height);
    }

    /**
     * This method moves a point to another point, given as another point.
     *
     * @param \ws\loewe\Utils\Geom\Point $point the point by which this point shall be moved by
     * @return \ws\loewe\Utils\Geom\Point a new point moved by the offset encapsulated by the given point
     */
    public function moveTo(Point $point)
    {
        return new Point($this->x + $point->x, $this->y + $point->y);
    }

    /**
     * This method returns a string representation of the point.
     *
     * @return string the string representation of the point
     */
    public function __toString()
    {
        return 'x: '.$this->x.', y: '.$this->y;
    }
}