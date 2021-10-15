<?php declare(strict_types = 1);
/**
 * Copyright (C) 2016 Adam Schubert <adam.schubert@sg1-game.net>.
 */

namespace Dravencms\Components\BaseGrid;

use Dravencms\Components\BaseGrid\Column\ColumnBoolean;
use Dravencms\Components\BaseGrid\Column\ColumnPosition;
use Dravencms\Components\BaseGrid\Column\PresenterAction;
use Ublaboo\DataGrid\Column\Action;
use Ublaboo\DataGrid\Column\Column;
use Ublaboo\DataGrid\DataGrid;

class Grid extends DataGrid
{
    /**
     * @param string $key
     * @param string $name
     * @param string|null $column
     * @return Column
     * @throws \Ublaboo\DataGrid\Exception\DataGridException
     */
    public function addColumnBoolean(string $key, string $name, string $column = null): Column
    {
        $column = $column ?: $key;
        return $this->addColumn($key, new ColumnBoolean($this, $key, $column, $name));
    }

    /**
     * @param string $key
     * @param string $name
     * @param string $upHref
     * @param string $downHref
     * @param string|null $column
     * @return Column
     * @throws \Ublaboo\DataGrid\Exception\DataGridException
     */
    public function addColumnPosition(string $key, string $name, string $upHref = 'up!', string $downHref = 'down!', string $column = null): Column
    {
        $column = $column ?: $key;
        return $this->addColumn($key, new ColumnPosition($this, $key, $column, $name, $upHref, $downHref));
    }

    /**
     * @param string $key
     * @param string $name
     * @param string|null $href
     * @param array|null $params
     * @return Action
     * @throws \Ublaboo\DataGrid\Exception\DataGridException
     */
    public function addAction(string $key, string $name, string $href = null, array $params = null): Action
    {
        $this->addActionCheck($key);

        $href = $href ?: $key;

        if ($params === null) {
            $params = [$this->getPrimaryKey()];
        }

        return $this->actions[$key] = new PresenterAction($this, $key, $href, $name, $params);
    }
}
