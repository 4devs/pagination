```php
use FDevs\Pagination\Type\ArrayType;
use FDevs\Pagination\Model\CountPagination;
use FDevs\Pagination\Extension\ArrayType\PageExtension;
use FDevs\Pagination\Extension\ArrayType\LimitExtension;
use FDevs\Pagination\Extension\ArrayType\OffsetExtension;
use FDevs\Pagination\Extension\ArrayType\CountExtension;

$paginator = new \FDevs\Pagination\Paginator();

$paginator
    ->addType(new ArrayType(),[PageExtension::class,CountExtension::class])
    ->addTypeExtension(ArrayType::class, PageExtension::class, 2)
    ->addTypeExtension(ArrayType::class, LimitExtension::class, 1)
    ->addTypeExtension(ArrayType::class, CountExtension::class, 0)
    ->addTypeExtension(ArrayType::class, OffsetExtension::class, 0)
;


$pagination = $paginator->paginate(['a', 'b', 'c'], ['limit' => 1, 'page' => 2], new CountPagination());

var_dump($pagination);
exit;

```