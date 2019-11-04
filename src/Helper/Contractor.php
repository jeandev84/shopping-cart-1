<?php
namespace Framework;


/**
 * Class Contractor
 * @package Project
 */
class Contractor
{
    private $electrician;
    private $plumber;
    private $designer;

    /**
     * Contractor constructor.
     * @param $electrician
     * @param $plumber
     * @param $designer
     */
     public function __construct($electrician, $plumber, $designer)
     {
         $this->electrician = $electrician;
         $this->plumber = $plumber;
         $this->designer = $designer;
     }


     public function performWork()
     {
          // electrician
          // plumber
     }
}