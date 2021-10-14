<?php declare(strict_types = 1);
/**
 * Copyright (C) 2016 Adam Schubert <adam.schubert@sg1-game.net>.
 */

namespace Dravencms\Components\BaseGrid;


interface BaseGridFactory
{
    /**
     * @return BaseGrid
     */
    public function create();
}