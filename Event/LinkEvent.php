<?php

namespace Toffiak\URLShortenerBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\Response;

/**
 * LinkEvent
 */
class LinkEvent extends Event
{

    /**
     * @var \Symfony \Component\HttpFoundation\Response
     */
    private $response;

    /**
     * @var string
     */
    private $link;

    /**
     * Constructing link event.
     * 
     * @param \Toffiak\UrlShortnerBundle\Model\Link $link
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
     * @return Toffiak\URLShortenerBundle\Model\Link
     */
    public function getLink()
    {
        return $this->link;
    }

}
