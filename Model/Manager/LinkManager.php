<?php

namespace Toffiak\URLShortenerBundle\Model\Manager;

use Toffiak\URLShortenerBundle\Model\Manager\LinkManagerInterface;
use Toffiak\URLShortenerBundle\Model\Manager\AbstractLinkManager;

class LinkManager extends AbstractLinkManager implements LinkManagerInterface
{

    public function __construct($em, $linkClass)
    {
        parent::__construct($em, $linkClass);
    }

    /**
     * Creating link entity
     * 
     * @return \Toffiak\URLShortenerBundle\Model\Manager\linkClass
     */
    public function createLink()
    {
        return new $this->linkClass;
    }

    /**
     * Saving link
     * 
     * @param type $link
     */
    public function saveLink($link)
    {
        $this->em->persist($link);
        $this->em->flush();
    }

    /**
     * Finding link
     * 
     * @param integer $id
     * @return type
     */
    public function find($id)
    {
        return $this->getRepository()->find($id);
    }

    public function findByName($name)
    {
        return $this->getRepository()->findOneBy(array('name' => $name));
    }

}
