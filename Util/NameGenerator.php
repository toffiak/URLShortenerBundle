<?php

namespace Toffiak\URLShortenerBundle\Util;

class NameGenerator
{

    public function generateLinkName()
    {
        return \substr(\md5(\time()), 0, 8);
    }

}
