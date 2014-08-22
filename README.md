ToffiakURLShortenerBundle
=============

Symfony 2 bundle for shortening urls.

Instalation
-------------

### Step 1: Download ToffiakURLShortenerBundle using composer

Add ToffiakURLShortenerBundle in your composer.json:

```js
{
    "require": {
        "toffiak/urlshortener-bundle": "1.0.*@dev"
    },
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/toffiak/URLShortenerBundle"
        }
    ],
}
```

Download the bundle by running the command:

``` bash
$ php composer.phar update toffiak/urlshortener-bundle
```

### Step 2: Enable the bundle

Enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Toffiak\URLShortenerBundle\ToffiakURLShortenerBundle(),
    );
}
```

### Step 3: Create Link class

``` php
<?php
// src/Acme/URLShortenerBundle/Entity/Link.php

namespace Acme\URLShortenerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Toffiak\URLShortenerBundle\Entity\Link as BaseLink;

/**
 * @ORM\Entity
 * @ORM\Table(name="toffiak_urlshortener_link")
 */
class Link extends BaseLink
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

}
```

### Step 4: Create Link manager class

``` php
<?php
// src/Acme/URLShortenerBundle/Model/Manager/LinkManager.php

namespace Acme\URLShortenerBundle\Model\Manager;

use Toffiak\URLShortenerBundle\Model\Manager\LinkManager as BaseLinkManager;

class LinkManager extends BaseLinkManager
{
    
}
```

### Step 5: Configure the ToffiakURLShortenerBundle

``` yaml
# app/config/config.yml
toffiak_url_shortener:
    link: 
        class: Acme\URLShortenerBundle\Entity\Link
        manager_class: Acme\URLShortenerBundle\Model\Manager\LinkManager
```

### Step 6: Import ToffiakURLShortenerBundle routing files

In YAML:

``` yaml
# app/config/routing.yml
toffiak_urlshortener:
    resource: "@ToffiakURLShortenerBundle/Resources/config/routing.yml"
    prefix:   /
```

### Step 7: Update your database schema

``` bash
$ php app/console doctrine:schema:update --force
```