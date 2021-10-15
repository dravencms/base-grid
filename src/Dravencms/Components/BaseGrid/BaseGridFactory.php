<?php declare(strict_types = 1);

namespace Dravencms\Components\BaseGrid;

use Dravencms\Components\BaseControl\BaseControl;
use Nette\ComponentModel\IContainer;

/**
 * Copyright (C) 2016 Adam Schubert <adam.schubert@sg1-game.net>.
 */
class BaseGridFactory extends BaseControl
{

    /**
     * @param IContainer $container
     * @param $name
     * @return Grid
     */
    public function create(IContainer $container = null, $name = null): Grid
    {
        $grid = new Grid($container, $name);
        $grid->setRememberState(true);
        return $grid;
    }

}