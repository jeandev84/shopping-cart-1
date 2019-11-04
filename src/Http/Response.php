<?php
namespace Framework\Http;


/**
 * Class Response
 * @package Project\Http
 */
class Response
{
    /**
     * @var string
     */
    private $content;

    /**
     * @var int
     */
    private $status;

    /**
     * @var array
     */
    private $headers;

    /**
     * Response constructor.
     * @param string $content
     * @param $status
     * @param array $headers
     */
     public function __construct(string $content, $status = 200, $headers = [])
     {
         $this->content = $content;
         $this->status  = $status;
         $this->headers = $headers;
     }


     /**
      * Send Headers to server
     */
     public function send()
     {
         http_response_code($this->status);
         if(!headers_sent())
         {
              foreach ($this->headers as $key => $value)
              {
                  header(sprintf('%s : %s', $key, $value));
              }
         }

         echo $this->content;
     }
}