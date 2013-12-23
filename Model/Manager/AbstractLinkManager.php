<?php

namespace Toffiak\URLShortenerBundle\Model\Manager;

abstract class AbstractLinkManager {

    protected $linkClass;
    protected $em;

    /**
     * Constructor
     * 
     * @param \Doctrine\ORM\EntityManager $em Entity manager
     * @param string $linkClass Link class
     */
    public function __construct($em, $linkClass) {
        $this->em = $em;
        $this->linkClass = $linkClass;
    }

    protected function getLinkClass() {
        return $this->linkClass;
    }

    /**
     * Getting repository for link
     * 
     * @return \Doctrine\ORM\EntityRepository
     */
    protected function getRepository() {
        return $this->em->getRepository($this->linkClass);
    }

}
