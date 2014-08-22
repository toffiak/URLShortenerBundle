<?php

namespace Toffiak\URLShortenerBundle\Model;

use Toffiak\URLShortenerBundle\Model\LinkInterface;

/**
 * Link
 */
abstract class Link implements LinkInterface
{

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $original_url;

    /**
     * @var string
     */
    protected $name;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set original_url
     *
     * @param string $originalUrl
     * @return Link
     */
    public function setOriginalUrl($originalUrl)
    {
        $this->original_url = $originalUrl;

        return $this;
    }

    /**
     * Get original_url
     *
     * @return string 
     */
    public function getOriginalUrl()
    {
        return $this->original_url;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Link
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

}
