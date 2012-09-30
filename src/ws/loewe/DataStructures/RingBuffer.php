<?php
namespace ws\loewe\Utils\DataStructures;


class RingBuffer {
  /**
   * the size of the buffer
   *
   * @var int
   */
  private $buffer = null;

  /**
   * the current index of the buffer
   *
   * @var int
   */
  private $index  = 0;

  /**
   * This method acts as the constructor of the class.
   *
   * @param int $size the size of the buffer
   */
  public function __construct($size) {
    $this->buffer = new \SplFixedArray($size);
  }

  /**
   * This method adds the item to the buffer.
   *
   * @param mixed $item the item to add
   */
  public function add($item) {
    $this->index = (++$this->index) % $this->buffer->getSize();

    $this->buffer[$this->index] = $item;
  }

  /**
   * This method returns the items in reversed (i.e. last in, first out) order, starting with the item that was inserted
   * last.
   *
   * @return array[int]mixed the set of items, in reveresed order
   */
  public function getLifoOrder() {
    $result = array();
    for($i = 0; $i < $this->buffer->getSize(); $i++) {
      $currentIndex = $this->index - $i;

      if($currentIndex < 0) {
        $currentIndex = $currentIndex + $this->buffer->getSize();
      }

      if($this->buffer[$currentIndex] !== null) {
        $result[] = $this->buffer[$currentIndex];
      }
    }

    return $result;
  }
}