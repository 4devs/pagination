<?php

namespace FDevs\Pagination;

use FDevs\Pagination\Exception\TargetNotSupportException;
use FDevs\Pagination\Extension\ExtensionInterface;
use FDevs\Pagination\Model\Pagination;
use FDevs\Pagination\Model\PaginationInterface;
use FDevs\Pagination\Type\PaginateInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Paginator implements PaginatorInterface
{
    /**
     * @var array|PaginateInterface[]
     */
    private $typeList = [];

    /**
     * @var ExtensionRegistry
     */
    private $extensionRegistry;

    /**
     * @var array|string[]
     */
    private $typeExtension = [];

    /**
     * @var string
     */
    private $paginationClass;

    /**
     * Paginator constructor.
     *
     * @param array|PaginateInterface[] $typeList
     * @param ExtensionRegistry|null    $extensionRegistry
     * @param $paginationClass
     */
    public function __construct(array $typeList = [], ExtensionRegistry $extensionRegistry = null, $paginationClass = Pagination::class)
    {
        $this->extensionRegistry = $extensionRegistry ?: new ExtensionRegistry();
        $this->paginationClass = $paginationClass;
        foreach ($typeList as $type) {
            $this->addType($type);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function paginate($target, array $options = [], PaginationInterface $pagination = null)
    {
        $pagination = $pagination ?: new $this->paginationClass();
        $paginator = $this->getType($target);

        $resolver = new OptionsResolver();

        $paginator->configureOptions($resolver);

        $extList = $this->getExtensionList(get_class($paginator), $pagination);
        foreach ($extList as $ext) {
            $ext->configureOptions($resolver);
        }
        $options = $resolver->resolve($options);

        $target = $paginator->prepareTarget($target, $options);

        foreach ($extList as $ext) {
            $target = $ext->prepareTarget($target, $options, $pagination);
        }

        return $paginator->paginate($target, $pagination, $options);
    }

    /**
     * @param PaginateInterface $type
     * @param array             $extensions
     *
     * @return $this
     */
    public function addType(PaginateInterface $type, array $extensions = [])
    {
        $this->typeList[get_class($type)] = $type;
        foreach ($extensions as $extension) {
            $this->addTypeExtension($type, $extension);
        }

        return $this;
    }

    /**
     * @param string|ExtensionInterface $extension
     * @param int                       $priority
     *
     * @return $this
     */
    public function addTypeExtension($type, $extension, $priority = 0)
    {
        if ($extension instanceof ExtensionInterface) {
            $this->extensionRegistry->addExtension($extension);
            $this->typeExtension[$type][$priority][get_class($extension)] = true;
        } elseif (is_string($extension)) {
            $this->typeExtension[$type][$priority][$extension] = true;
        }

        return $this;
    }

    /**
     * @param string              $type
     * @param PaginationInterface $pagination
     *
     * @return ExtensionInterface[]
     */
    private function getExtensionList($type, PaginationInterface $pagination)
    {
        $extList = [];
        if (isset($this->typeExtension[$type])) {
            ksort($this->typeExtension[$type]);
            $typeExt = call_user_func_array('array_merge', $this->typeExtension[$type]);
            foreach ($typeExt as $name => $item) {
                $extList = $this->getExtList($name, $pagination, $extList);
            }
        }

        return $extList;
    }

    /**
     * @param string              $name
     * @param PaginationInterface $pagination
     * @param array               $extList
     *
     * @return array
     */
    private function getExtList($name, PaginationInterface $pagination, array $extList = [])
    {
        $ext = $this->extensionRegistry->getExtension($name);
        $deps = $ext->getDependency();
        foreach ($deps as $dep) {
            $extList = $this->getExtList($dep, $pagination, $extList);
        }
        if ($ext->supportPagination($pagination)) {
            $extList[$name] = $ext;
        }

        return $extList;
    }

    /**
     * @param mixed $target
     *
     * @return PaginateInterface
     *
     * @throws TargetNotSupportException
     */
    private function getType($target)
    {
        foreach ($this->typeList as $type) {
            if ($type->support($target)) {
                return $type;
            }
        }
        throw new TargetNotSupportException($target);
    }
}
