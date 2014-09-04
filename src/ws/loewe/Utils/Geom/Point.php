<?php

namespace ws\loewe\Utils\Geom;

/**
 * This class represents a point in the two-dimensional space.
 * 
 */
class Point {
    use \ws\loewe\Utils\Common\ValueObject;

    /**
     * the x-coordinate of the point
     *
     * @var int
     */
    private $x = 0;

    /**
     * the y-coordinate of the point
     *
     * @var int
     */
    private $y = 0;

    /**
     * the cache used for this value object class
     *
     * @var Point[string]
     */
    private static $cache = array();

    /**
     * This method acts as the constructor of the class.
     *
     * @param int $x the x-coordinate of the point
     * @param int $y the y-coordinate of the point
     */
    private function __construct($x, $y) {
        $this->x = $x;

        $this->y = $y;
    }

    /**
     * This method creates a new Point.
     * 
     * @param int $x the x-coordinate of the point
     * @param int $y the y-coordinate of the point
     * @return Point the new Point
     */
    public static function createInstance($x, $y) {
      $hash = $x.':'.$y;
      
      if(!isset(self::$cache[$hash])) {
        self::$cache[$hash] = new Point($x, $y); 
      }
      
      return self::$cache[$hash];
    }

    /**
     * This method sets the x-coordinate of the point.
     *
     * @param int $x the new x-coordinate of the point
     * @return Point this point
     */
    public function setX($x) {
        return Point::createInstance($x, $this->y);
    }

    /**
     * This method sets the y-coordinate of the point.
     *
     * @param int $y the new y-coordinate of the point
     * @return Point this point
     */
    public function setY($y) {
        return Point::createInstance($this->x, $y);
    }

    /**
     * This method moves a point by an offset, given as dimension.
     *
     * @param Dimension $dimension the dimension by which this point shall be moved by
     * @return Point a new point moved by the offset encapsulated by the given point
     */
    public function moveBy(Dimension $dimension) {
        return Point::createInstance($this->x + $dimension->width, $this->y + $dimension->height);
    }

    /**
     * This method moves a point to another point, given as another point.
     *
     * @param Point $point the point by which this point shall be moved by
     * @return Point a new point moved by the offset encapsulated by the given point
     */
    public function moveTo(Point $point) {
        return Point::createInstance($this->x + $point->x, $this->y + $point->y);
    }

    /**
     * This method returns a string representation of the point.
     *
     * @return string the string representation of the point
     */
    public function __toString() {
        return 'x: '.$this->x.', y: '.$this->y;
    }
}