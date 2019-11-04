<?php
namespace Framework\Helper;


/**
 * Class ArrayCollection
 * @package Project\Helper
 */
class ArrayCollection
{

    /**
     * @var array
     */
    private $items;


    /**
      * ArrayCollection constructor.
      * @param array $items
     */
     public function __construct(array $items)
     {
         $this->items = $items;
     }

     /**
      * Set item
      * @param $key
      * @param $value
     */
     public function set($key, $value)
     {
         $this->items[$key] = $value;
     }


     /**
     * @param $key
     * @return mixed
     * @throws \Exception
     */
     public function get($key)
     {
         if(!$this->has($key))
         {
             throw new \Exception(
               sprintf('Sorry, this key %s does not yet setted', $key)
             );
         }
         return $this->items[$key];
     }


     /**
      * Determine if given key has setted
      * @param $key
      * @return bool
     */
     public function has($key)
     {
          return isset($this->items[$key]);
     }

}