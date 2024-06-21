<?php

class Position
{
  public $x;
  public $y;

  public function __construct($y, $x)
  {
    $this->y = $y;
    $this->x = $x;
  }
}