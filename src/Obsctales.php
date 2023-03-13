<?php

namespace Obstacles;

class Obstacles {

    private $x;
    private $y;

    public function __construct($x, $y){
        $this->x = $x;
        $this->y = $y;
    }

    public function getObstacle() {
        $res= strval($this->x) . ", " . strval($this->y);
        return $res;
    }

}