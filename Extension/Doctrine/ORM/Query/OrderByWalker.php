<?php

namespace FDevs\Pagination\Extension\Doctrine\ORM\Query;

use Doctrine\ORM\Query\AST\OrderByClause;
use Doctrine\ORM\Query\AST\SelectStatement;
use Doctrine\ORM\Query\AST\PathExpression;
use Doctrine\ORM\Query\AST\OrderByItem;
use Doctrine\ORM\Query\TreeWalkerAdapter;
use FDevs\Pagination\Utils\SortInterface;

class OrderByWalker extends TreeWalkerAdapter
{
    const HINT_PAGINATOR_SORT_FIELDS = 'f_devs_pagination.sort.fields';

    /**
     * {@inheritdoc}
     */
    public function walkSelectStatement(SelectStatement $AST)
    {
        $query = $this->_getQuery();
        if ($query->hasHint(self::HINT_PAGINATOR_SORT_FIELDS)) {
            $fields = $query->getHint(self::HINT_PAGINATOR_SORT_FIELDS)->getList();
            $components = $this->_getQueryComponents();
            /** @var SortInterface $field */
            foreach ($fields as $field) {
                $name = explode('.', $field->getField(), 2);
                if (!isset($components[$name[0]]) || (isset($name[1]) && !$components[$name[0]]['metadata']->hasField($name[1]))) {
                    throw new \UnexpectedValueException(sprintf('There is no component field [%s] in the given Query', $field->getField()));
                }

                if (isset($name[1])) {
                    $pathExpression = new PathExpression(PathExpression::TYPE_STATE_FIELD, $name[0], $name[1]);
                    $pathExpression->type = PathExpression::TYPE_STATE_FIELD;
                } else {
                    $pathExpression = $name[0];
                }
                $orderByItem = new OrderByItem($pathExpression);
                $orderByItem->type = $field->isAsc() ? 'ASC' : 'DESC';

                if ($AST->orderByClause) {
                    $AST->orderByClause->orderByItems[] = $orderByItem;
                } else {
                    $AST->orderByClause = new OrderByClause(array($orderByItem));
                }
            }
        }
    }
}
