<?php

namespace Toffiak\URLShortenerBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\Response;

class LinkEvent extends Event
{

    private $response;
    private $link;

    public function __construct($link)
    {
        $this->link = $link;
    }

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

    public function getLink()
    {
        return $this->link;
    }

}
