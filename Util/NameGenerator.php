<?php

namespace Toffiak\URLShortenerBundle\Util;

class NameGenerator
{

    private $em;

    public function __construct($em)
    {
        $this->em = $em;
    }

    public function generateLinkName()
    {
        return \substr(\md5(\time()), 0, 8);
    }

}
