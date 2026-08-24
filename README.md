# DravenCMS Base Grid

Shared data-grid factory and column extensions for DravenCMS administration. It builds on Contributte Datagrid 7 and supplies the project defaults used by feature packages.

## Features

- `BaseGridFactory` for creating configured grids.
- DravenCMS `Grid` subclass.
- Boolean and position columns.
- Presenter-aware row actions.
- Czech and English Datagrid translations.

## Installation

```bash
composer require dravencms/base-grid
```

The package configuration registers `Dravencms\BaseGrid\DI\BaseGridExtension` and its translation resources.

## Usage

```php
use Dravencms\Components\BaseGrid\BaseGridFactory;
use Dravencms\Components\BaseGrid\Grid;

protected function createComponentGrid(string $name): Grid
{
    $grid = $this->baseGridFactory->create($this, $name);
    $grid->setDataSource($this->repository->getQueryBuilder());
    $grid->addColumnText('name', 'Name')->setSortable();
    return $grid;
}
```

Datagrid 7 classes use the `Contributte\Datagrid` namespace. For delete confirmations use `Contributte\Datagrid\Column\Action\Confirmation\StringConfirmation`; FontAwesome delete actions should use the `trash` icon name.

## License

This package is licensed under the LGPL-3.0 license.
