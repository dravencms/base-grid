<?php declare(strict_types = 1);

namespace Dravencms\Components\BaseGrid\Column;

use Nette\Utils\Html;
use Contributte\Datagrid\Column\Column;
use Contributte\Datagrid\Row;

class ColumnBoolean extends Column
{
    /**
     * @var string
     */
    protected ?string $align = 'center';

    /**
     * Format row item value
     * @param  Row   $row
     * @return mixed
     */
    public function getColumnValue(Row $row): mixed
    {
        $value = parent::getColumnValue($row);

        $icon = $value ? 'ok' : 'remove';
        return Html::el('i')->class("glyphicon glyphicon-$icon icon-$icon");
    }
}
