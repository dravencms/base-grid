<?php declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: sadam
 * Date: 1/6/18
 * Time: 3:30 AM
 */

namespace Dravencms\Components\BaseGrid\Column;


use Nette\Application\UI\InvalidLinkException;
use Contributte\Datagrid\Column\Action;
use Contributte\Datagrid\Datagrid as DataGrid;
use Contributte\Datagrid\Exception\DatagridHasToBeAttachedToPresenterComponentException;

class PresenterAction extends Action
{
    /**
     * @param DataGrid $grid
     * @param string $href
     * @param array $params
     * @return string
     * @throws InvalidLinkException
     */
    protected function createLink(DataGrid $grid, string $href, array $params): string
    {
        try {
            $parent = $grid->getParent();

            return $parent->link($href, $params);
        } catch (DatagridHasToBeAttachedToPresenterComponentException $e) {
            $parent = $grid->getPresenter();

        } catch (\InvalidArgumentException $e) {
            $parent = $grid->getPresenter();
        } catch (InvalidLinkException $e) {
            $parent = $grid->getPresenter();
        }

        return $parent->link($href, $params);
    }
}