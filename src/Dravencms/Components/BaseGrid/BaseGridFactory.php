<?php declare(strict_types = 1);

namespace Dravencms\Components\BaseGrid;

use Dravencms\Components\BaseControl\BaseControl;
use Nette\Localization\Translator;
use Nette\ComponentModel\IContainer;

/**
 * Copyright (C) 2016 Adam Schubert <adam.schubert@sg1-game.net>.
 */
class BaseGridFactory extends BaseControl
{
    /** @var Translator */
    private $translator;

    /**
     * BaseForm constructor.
    * @param FormRenderer|null $renderer
    */
    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }

    /**
     * @param IContainer $container
     * @param $name
     * @return Grid
     */
    public function create(IContainer $container = null, $name = null): Grid
    {
        $grid = new Grid($container, $name);
        $grid->setTranslator($this->translator);
        $grid->setStrictSessionFilterValues(false);
        $grid->setRememberState(true);
        return $grid;
    }

}