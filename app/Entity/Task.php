<?php
namespace App\Entity;


/**
 * Class Task
 */
class Task
{

    /**
     * @var string
     */
    public $description;

    /**
     * @var bool
     */
    public $completed; // true


    /**
     * Determine if task completed or not
     * @return bool
     */
    public function isComplete()
    {
        return $this->completed;
    }

    /**
     *
     */
    public function complete()
    {
        $this->completed = true;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

}