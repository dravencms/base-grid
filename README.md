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

The `contributte_datagrid` catalogs provide Datagrid 7 labels in Czech and English. Legacy `ublaboo_datagrid` catalogs remain available for application templates that still reference those keys. Frontend assets are supplied by the Bootstrap 5 / Tabler version of `dravencms/admin`. Default row and position actions use Bootstrap 5 button styles.

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

## Protected grid writes

Grid forms include Nette CSRF protection. Inherited inline-edit, status-change and action-callback signals require POST, a valid admin action token, and the permission set by `setWritePermission(resource, operation)`. Unknown write permissions fail closed. A component's delete callback must also check its delete permission because bulk callbacks call handlers directly.
