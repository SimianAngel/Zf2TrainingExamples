<?php
/**
 * Created by PhpStorm.
 * User: Joshua.Holland
 * Date: 2/10/14
 * Time: 10:17 AM
 */

namespace Application\Model;

class Awesome {
    private $theThing = "effing great bacon";

    public function Baconify() {
        return $this->theThing;
    }

}