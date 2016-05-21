<?php

namespace FDevs\Pagination\Exception;

class TargetNotSupportException extends Exception
{
    /**
     * TargetNotSupportException constructor.
     *
     * @param string          $target
     * @param int             $code
     * @param \Exception|null $previous
     */
    public function __construct($target, $code = 0, \Exception $previous = null)
    {
        $type = gettype($target);
        if ($type == 'object') {
            $type = get_class($target);
        }
        parent::__construct(sprintf(' target with type %s not supports', $type), $code, $previous);
    }
}
