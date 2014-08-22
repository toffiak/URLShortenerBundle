<?php

namespace Toffiak\URLShortenerBundle\Util;

/**
 * NameGenerator
 */
class NameGenerator
{
    /**
     * Generating link name.
     * 
     * @return string
     */
    public function generateLinkName()
    {
        return \substr(\md5(\time()), 0, 8);
    }

}
