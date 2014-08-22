<?php

namespace Toffiak\URLShortenerBundle\Model;

interface LinkInterface
{

    public function setOriginalUrl($originalUrl);

    public function getOriginalUrl();

    public function setName($name);

    public function getName();
}
