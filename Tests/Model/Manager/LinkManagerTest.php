<?php

namespace Toffiak\URLShortenerBundle\Tests\Model\Manager;

use Toffiak\URLShortenerBundle\Model\Manager\LinkManager;

class LinkManagerTest extends \PHPUnit_Framework_TestCase
{

    private $manager;
    private $link;
    private $em;

    public function setUp()
    {
        $entityManager = $this->getMock('\Doctrine\ORM\EntityManagerInterface');
        $this->em = $this->getMock('\Doctrine\ORM\EntityManagerInterface');
        $linkClassName = '\Toffiak\URLShortenerBundle\Model\Link';
        $this->manager = $this->getMock('\Toffiak\URLShortenerBundle\Model\Manager\LinkManager', array(), array($entityManager, $linkClassName));
        $this->getLink();
    }

    public function testCreateLink()
    {
        $this->manager->expects($this->once())
                ->method('createLink')
                ->will($this->returnValue($this->link));

        $this->assertInstanceOf('\Toffiak\URLShortenerBundle\Model\Link', $this->manager->createLink());
    }

    public function testFind()
    {
        $this->manager->expects($this->once())
                ->method('find')
                ->will($this->returnValue($this->em));

        $this->assertInstanceOf('\Doctrine\ORM\EntityManagerInterface', $this->manager->find(0));
    }

    public function getLink()
    {
        $this->link = $this->getMockForAbstractClass('\Toffiak\URLShortenerBundle\Model\Link');
    }

}
