<?php

namespace Rover;
use Obstacles;
class MarsRover {

    //private $initialPosition;
    private $x;
    private $y;
    private $direction;
    private $obstacles = array(); //tableau des obstacles
    //private $obstacle = new Obstacles();
    //generer entre 1 et 9

    public function __construct(){
        $this->x = 0;
        $this->y = 0;
        $this->direction = 'N';

        for ($i=0; $i<10; $i++) { //on ajoute 10 obstacles à la liste 
            //nombre random entre 1 et 9
            $random_x = random_int(1, 9);
            $random_y = random_int(1, 9);
            $obstacle = new Obstacles($random_x, $random_y);
            array_push($obstacles, $obstacle);
        }
        
    }

    public function getPosition(){
        $res= strval($this->x) . ", " . strval($this->y) . ", " . $this->direction;
        return $res;
    }

    public function getDirection(){
        return $this->direction;
    }

    public function getObstacle(){ 

    }

    public function move($instructions) {

        if(!preg_match('/^[RLM]*$/i', $instructions)) {
            return "Erreur, argument.s invalide.s !";
        }

        else if ($instructions == '') {
            return getPosition();
        }
        
        while(strlen($instructions) != 0) { //tant qu'il reste des instruction a effectuer
            $direction = $this->getDirection(); //direction

            if ($instructions[0] == "R"){

                if($direction == "N"){
                    $this->direction = "E"; //on le place à l'est
                }
                else if($direction == "E"){
                    $this->direction = "S"; //on le place au sud
                }
                else if($direction == "S"){
                    $this->direction = "W"; //on le place à l'ouest
                }
                else{ //il est à l'ouest
                    $this->direction = "N"; //on le place au nord
                }
            }

            else if($instructions[0] == "L"){

                if($direction == "N"){
                    $this->direction = "W"; //on le place à l'ouest
                }
                else if($direction == "E"){
                    $this->direction = "N"; //on le place au nord
                }
                else if($direction == "S"){
                    $this->direction = "E"; //on le place à l'est
                }
                else{ //il est à l'ouest
                    $this->direction = "S"; //on le place au sud
                }

            }

            else { //on avance
                if ($direction == "N"){

                    for ($i=0; $i<count($this->obstacles); $i++) { //on regarde si un obstacle pourrait gêner
                        if(($obstacles[i].getY() == $this->y + 1) || ($obstacles[i].getY() == 0 && $this->y == 9)){
                            return "On ne peut plus avancer !
                            Position du Rover : " . $this->getPosition() . ", 
                            Position de l'obstacle : X ->" . $obstacles[i].getX() . 
                            ", Y -> " . $obstacles[i].getY(); 
                        }
                    }

                    if($this->y != 9){//on bouge en y
                        $this->y += 1;
                    }
                    else{ //on revient à 0 monde sacrément sphérique
                        $this->y = 0;
                    }
                }

                else if ($direction == "S"){ 

                    for ($i=0; $i<count($this->obstacles); $i++) { //on regarde si un obstacle pourrait gêner
                        if(($obstacles[i].getY() == $this->y - 1) || ($obstacles[i].getY() == 9 && $this->y == 0)){
                            return "On ne peut plus avancer !
                            Position du Rover : " . $this->getPosition() . ", 
                            Position de l'obstacle : X ->" . $obstacles[i].getX() . 
                            ", Y -> " . $obstacles[i].getY(); 
                        }
                    }

                    if($this->y != 0){//on bouge en y
                        $this->y -= 1; //on descend
                    }
                    else{ //on revient à 9 monde sacrément sphérique
                        $this->y = 9; 
                    }
                }

                else if ($direction == "W"){ 

                    for ($i=0; $i<count($this->obstacles); $i++) { //on regarde si un obstacle pourrait gêner
                        if(($obstacles[i].getX() == $this->x - 1) || ($obstacles[i].getX() == 9 && $this->y == 0)){
                            return "On ne peut plus avancer !
                            Position du Rover : " . $this->getPosition() . ", 
                            Position de l'obstacle : X ->" . $obstacles[i].getX() . 
                            ", Y -> " . $obstacles[i].getY(); 
                        }
                    }

                    if($this->x != 0){//on bouge en x
                        $this->x -= 1; //on va à gauche
                    }
                    else{ //on revient à 9 monde sacrément sphérique
                        $this->x = 9; 
                    }
                }

                else{  //Vers l'Est

                    for ($i=0; $i<count($this->obstacles); $i++) { //on regarde si un obstacle pourrait gêner
                        if(($obstacles[i].getX() == $this->x + 1) || ($obstacles[i].getX() == 0 && $this->y == 9)){
                            return "On ne peut plus avancer !
                            Position du Rover : " . $this->getPosition() . ", 
                            Position de l'obstacle : X ->" . $obstacles[i].getX() . 
                            ", Y -> " . $obstacles[i].getY(); 
                        }
                    }

                    if($this->x != 9){ //on bouge en x
                        $this->x += 1; //on va à droite
                        }
                        else{ //on revient à 0 monde sacrément sphérique
                            $this->x = 0;
                        }
                }
        }

            $instructions = substr($instructions,1); //on retire l'instruction effectuée 
        }

        return $this->getPosition();//on retourne la nouvelle position
    }
}

?>