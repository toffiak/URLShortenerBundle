<?php

namespace Toffiak\URLShortenerBundle\Tests\Util;

use Toffiak\URLShortenerBundle\Util\NameGenerator;

class NameGeneratorTest extends \PHPUnit_Framework_TestCase
{

    public function testGenerateLinkName()
    {
        $nameGenerator = new NameGenerator();
        $linkName = $nameGenerator->generateLinkName();
        $this->assertNotEmpty($linkName);
    }

}
