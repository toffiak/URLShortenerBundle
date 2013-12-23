<?php

namespace Toffiak\URLShortenerBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\Response;

class LinkEvent extends Event
{

    private $response;
    private $link;

    /**
     * Constructing link event.
     * 
     * @param type $link
     */
    public function __construct($link)
    {
        $this->link = $link;
    }

    /**
     * Setting response.
     * 
     * @param \Symfony\Component\HttpFoundation\Response $response
     */
    public function setResponse(Response $response)
    {
        $this->response = $response;
    }

    /**
     * @return Response|null
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Getting link entity.
     * 
     * @return type
     */
    public function getLink()
    {
        return $this->link;
    }

}
