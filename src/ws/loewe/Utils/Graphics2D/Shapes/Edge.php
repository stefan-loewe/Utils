<?php

namespace ws\loewe\Utils\Graphics2D\Shapes;

use \ws\loewe\Utils\Graphics2D\Shapes\Styles\EdgeStyle;

/**
 * This class represents an abstract edge shape.
 */
abstract class Edge extends Shape
{
    /**
     * the source of the edge
     *
     * @var IShape
     */
    protected $source       = null;

    /**
     * the collection of targets of the edge
     *
     * @var \ArrayAccess<IShape>
     */
    protected $targets      = null;

    /**
     * the style of the edge
     *
     * @var EdgeStyle
     */
    protected $style = null;

    /**
     * This acts as the constructor of the class.
     *
     * @param IShape $source the source of the edge
     * @param \ArrayAccess $targets the collection of targets of the shape
     * @param EdgeStyle $edgeStyle the style of the edge
     */
    public function __construct(IShape $source, \ArrayAccess $targets, EdgeStyle $edgeStyle)
    {
        $this->source       = $source;
        $this->targets      = $targets;
        $this->style        = $edgeStyle;
    }

    /**
     *
     */
    public function getConnectionPoint($orientation, $targetIndex = null)
    {
        if($targetIndex == null)
            return $this->source->getConnectionPoint($orientation);

        else
            return $this->targets[$targetIndex]->getConnectionPoint($orientation);
    }
}