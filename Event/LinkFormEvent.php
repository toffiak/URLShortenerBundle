<?php

namespace Toffiak\URLShortenerBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;

class LinkFormEvent extends Event
{

    private $form;
    private $response;

    /**
     * LinkFormType constructor.
     * 
     * @param \Symfony\Component\Form\FormInterface $form
     */
    public function __construct(FormInterface $form)
    {
        $this->form = $form;
    }

    /**
     * @return FormInterface
     */
    public function getForm()
    {
        return $this->form;
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

}
