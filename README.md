Pagination
==========

This is a PHP paginator with a totally different core concept.

If you use Symfony 2, you could use our [pagination bridge](https://github.com/4devs/pagination-bridge)!

## Installation
Pagination uses Composer, please checkout the [composer website](http://getcomposer.org) for more information.

The simple following command will install `pagination` into your project. It also add a new
entry in your `composer.json` and update the `composer.lock` as well.


```bash
composer require fdevs/pagination
```

## Usage examples:

### Controller

```php
use FDevs\Pagination\Type\ArrayType;
use FDevs\Pagination\Model\CountPagination;
use FDevs\Pagination\Extension\ArrayType\PageExtension;
use FDevs\Pagination\Extension\ArrayType\LimitExtension;
use FDevs\Pagination\Extension\ArrayType\OffsetExtension;
use FDevs\Pagination\Extension\ArrayType\CountExtension;
use FDevs\Pagination\Paginator;
use FDevs\Pagination\Renderer\ClosureRenderer;

$paginator = new Paginator();

$paginator
    ->addType(new ArrayType(),[PageExtension::class,CountExtension::class])
;

$closureRenderer = new ClosureRenderer(function($data) use ($template) {return $twig->render($template, $data);});


$pagination = $paginator->paginate(['a', 'b', 'c'], ['limit' => 1, 'page' => 2], new CountPagination());

$closureRenderer->render($pagination);

```

### create you Type pagination

```php
<?php

namespace App\Pagination\Type;

use FDevs\Pagination\Model\PaginationInterface;

class PDOType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function paginate($target, PaginationInterface $pagination, array $options)
    {
        //your logic
        //$pagination->setItems($target->fetchAll());
        
        return $pagination;
    }

    /**
     * {@inheritdoc}
     */
    public function support($target)
    {
        return $target instanceof \PDOStatement;
    }
}

```

### create you Type Extension

```php
<?php

namespace App\Pagination\Extension\PDO;

use FDevs\Pagination\Extension\AbstractExtension;
use FDevs\Pagination\Model\CountPaginationInterface;
use FDevs\Pagination\Model\PaginationInterface;

class CountExtension extends AbstractExtension
{
    /**
     * {@inheritdoc}
     */
    public function supportPagination(PaginationInterface $pagination)
    {
        return $pagination instanceof CountPaginationInterface;
    }

    /**
     * {@inheritdoc}
     */
    public function prepareTarget($target, array $options, PaginationInterface $pagination)
    {
        /* @var $pagination CountPaginationInterface */
        $pagination->setCount($target->rowCount());

        return $target;
    }
}
```

### add you type

```php
//init pagination

$paginator
    ->addType(new App\Pagination\Type\PDOType(),[App\Pagination\Extension\PDO\CountExtension::classs])
;

```

---
Created by [4devs](http://4devs.pro/) - Check out our [blog](http://4devs.io/) for more insight into this and other open-source projects we release.
