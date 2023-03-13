<?php

use PHPUnit\Framework\TestCase;
use \Rover\MarsRover;

class testRover extends TestCase {

    /** @test **/
    function shouldHaveInitialPosition() {
        // GIVEN
        $marsRover = new MarsRover();

        // WHEN
        $position = $marsRover->getPosition();

        // THEN
        $this->assertEquals("0, 0, N", $position);
    }

    /** @test **/
    function shouldTurnRight() {
        // GIVEN
        $marsRover = new MarsRover();

        // WHEN
        $position = $marsRover->move("R");

        // THEN
        $this->assertEquals("0, 0, E", $position);
    }

    /** @test **/
    function shouldTurnRight3Times() {
        // GIVEN
        $marsRover = new MarsRover();

        // WHEN
        $position = $marsRover->move("RRR");

        // THEN
        $this->assertEquals("0, 0, W", $position);
    }
    /** @test **/
    function shouldTurnLeft() {
        // GIVEN
        $marsRover = new MarsRover();

        // WHEN
        $position = $marsRover->move("L");

        // THEN
        $this->assertEquals("0, 0, W", $position);
    }

    /** @test **/
    function shouldTurnLeft3Times() {
        // GIVEN
        $marsRover = new MarsRover();

        // WHEN
        $position = $marsRover->move("LLL");

        // THEN
        $this->assertEquals("0, 0, E", $position);
    }

    /** @test **/
    function shouldTurnLeftAndRight() {
        // GIVEN
        $marsRover = new MarsRover();

        // WHEN
        $position = $marsRover->move("LR");

        // THEN
        $this->assertEquals("0, 0, N", $position);
    }

    /** @test **/
    function shouldTurnRightAndLeft() {
        // GIVEN
        $marsRover = new MarsRover();

        // WHEN
        $position = $marsRover->move("RL");

        // THEN
        $this->assertEquals("0, 0, N", $position);
    }

    /** @test **/
    function shouldReturnError() {
        // GIVEN
        $marsRover = new MarsRover();

        // WHEN
        $position = $marsRover->move("4");

        // THEN
        $this->assertEquals("Erreur, argument.s invalide.s !", $position);
    }

    /** @test **/
    function shouldMoveForward() {
        // GIVEN
        $marsRover = new MarsRover();

        // WHEN
        $position = $marsRover->move("M");

        // THEN
        $this->assertEquals("0, 1, N", $position);
    }

    /** @test **/
    function shouldMoveForward3Times() {
        // GIVEN
        $marsRover = new MarsRover();

        // WHEN
        $position = $marsRover->move("MMM");

        // THEN
        $this->assertEquals("0, 3, N", $position);
    }

    /** @test **/
    function shouldMoveForward10Times() {
        // GIVEN
        $marsRover = new MarsRover();

        // WHEN
        $position = $marsRover->move("MMMMMMMMMM");

        // THEN
        $this->assertEquals("0, 0, N", $position);
    }

    /** @test **/
    function shouldMoveForwardLeft() {
        // GIVEN
        $marsRover = new MarsRover();

        // WHEN
        $position = $marsRover->move("LM");

        // THEN
        $this->assertEquals("9, 0, W", $position);
    }

    /** @test **/
    function shouldMoveForwardLeft10Times() {
        // GIVEN
        $marsRover = new MarsRover();

        // WHEN
        $position = $marsRover->move("LMMMMMMMMMM");

        // THEN
        $this->assertEquals("0, 0, W", $position);
    }

    /** @test **/
    function shouldMoveForwardRight() {
        // GIVEN
        $marsRover = new MarsRover();

        // WHEN
        $position = $marsRover->move("RM");

        // THEN
        $this->assertEquals("1, 0, E", $position);
    }

    /** @test **/
    function shouldMoveForwardRight10Times() {
        // GIVEN
        $marsRover = new MarsRover();

        // WHEN
        $position = $marsRover->move("RMMMMMMMMMM");

        // THEN
        $this->assertEquals("0, 0, E", $position);
    }

    /** @test **/
    function shouldMoveForwardRightAndLeft() {
        // GIVEN
        $marsRover = new MarsRover();

        // WHEN
        $position = $marsRover->move("RMMLM");

        // THEN
        $this->assertEquals("2, 1, N", $position);
    }

    


}

?>