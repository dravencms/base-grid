<?php declare(strict_types = 1);

namespace Dravencms\Components\BaseGrid\Column;

use Nette\Utils\Html;
use Contributte\Datagrid\Column\Column;
use Contributte\Datagrid\Datagrid as DataGrid;
use Contributte\Datagrid\Exception\DatagridColumnRendererException;
use Contributte\Datagrid\Row;

class ColumnPosition extends Column
{
    /**
     * @var string
     */
    protected ?string $align = 'center';

    protected $upHref;

    protected $downHref;

    protected string $column;

    public function __construct(DataGrid $grid, string $key, string $column, string $name, string $upHref, string $downHref)
    {
        $this->upHref = $upHref;
        $this->downHref = $downHref;
        $this->column = $column;

        parent::__construct($grid, $key, $column, $name);
    }

    /**
     * Render row item into template
     * @param  Row   $row
     * @return mixed
     */
    public function render(Row $row): mixed
    {
        /**
         * Renderer function may be used
         */
        try {
            return $this->useRenderer($row);
        } catch (DatagridColumnRendererException $e) {
            /**
             * Do not use renderer
             */
        }

        $container = Html::el('div', ['class' => 'btn-group']);

        $elDown = Html::el('a', ['class' => 'btn btn-xs']);
        $elDown->href($this->createLink($this->grid, $this->downHref, $this->getItemParams($row, ['id'])));
        $elDown->setHtml('<i class="fa fa-chevron-down" aria-hidden="true"></i>');
        $container->addHtml($elDown);

        $elUp = Html::el('a', ['class' => 'btn btn-xs']);
        $elUp->href($this->createLink($this->grid, $this->upHref, $this->getItemParams($row, ['id'])));
        $elUp->setHtml('<i class="fa fa-chevron-up" aria-hidden="true"></i>');

        $container->addHtml($elUp);

        return $container;
    }
}
