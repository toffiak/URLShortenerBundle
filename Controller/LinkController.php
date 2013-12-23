<?php

namespace Toffiak\URLShortenerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Toffiak\URLShortenerBundle\Event\LinkEvent;
use Toffiak\URLShortenerBundle\Event\LinkFormEvent;
use Toffiak\URLShortenerBundle\Event\ToffiakURLShortenerEvents;

/**
 * Link controller.
 *
 */
class LinkController extends Controller
{

    /**
     * Displays a form to create a new Link entity.
     * 
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAction()
    {
        $linkManager = $this->get('toffiak_urlshortener.link.manager');
        $link = $linkManager->createLink();
        $form = $this->createCreateForm($link);

        return $this->render('ToffiakURLShortenerBundle:Link:new.html.twig', array(
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new Link entity.
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request)
    {
        $dispatcher = $this->container->get('event_dispatcher');
        $response = new Response();

        // Creating link
        $linkManager = $this->get('toffiak_urlshortener.link.manager');
        $link = $linkManager->createLink();

        // Generating link name
        $generator = $this->get('toffiak_urlshortener.link.generator');
        $link->setName($generator->generateLinkName());

        // Creating form
        $form = $this->createCreateForm($link);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $linkManager->saveLink($link);
            $event = new LinkEvent($link);
            $dispatcher->dispatch(ToffiakURLShortenerEvents::LINK_ADDED, $event);
            if (null === $response = $event->getResponse()) {
                return $this->redirect($this->generateUrl($this->container->getParameter('toffiak_urlshortener.link.success_url'), array('name' => $link->getName())));
            }

            return $response;
        }

        $event = new LinkFormEvent($form);
        $dispatcher->dispatch(ToffiakURLShortenerEvents::LINK_FORM_INVALID, $event);
        if (null === $response = $event->getResponse()) {
            return $this->render('ToffiakURLShortenerBundle:Link:new.html.twig', array(
                        'form' => $form->createView(),
            ));
        }

        return $response;
    }

    /**
     * Creates a form to create a Link entity.
     * 
     * @param $entity The entity
     * @return \Symfony\Component\Form\Form
     */
    private function createCreateForm($entity)
    {
        $formFactory = $this->get('toffiak_urlshortener.form_factory');
        $form = $formFactory->createForm();
        $form->setData($entity);

        return $form;
    }

    /**
     * Succesfully added new link.
     * 
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addedAction()
    {
        $request = $this->getRequest();
        $name = $request->attributes->get('name');

        return $this->render('ToffiakURLShortenerBundle:Link:added.html.twig', array('name' => $name));
    }

    /**
     * Showing original URL by name.
     * 
     * It's just redirecting user to originla URL.
     * 
     * @param string $name Link name
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws NotFoundHttpException
     */
    public function showAction($name)
    {
        $linkManager = $this->get('toffiak_urlshortener.link.manager');
        $link = $linkManager->findByName($name);
        if (!$link) {
            throw new NotFoundHttpException();
        }

        return $this->redirect($link->getOriginalUrl());
    }

}
