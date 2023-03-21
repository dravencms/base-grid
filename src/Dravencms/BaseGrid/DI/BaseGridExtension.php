<?php declare(strict_types = 1);

namespace Dravencms\BaseGrid\DI;

use Contributte\Translation\DI\TranslationProviderInterface;
use Nette\DI\CompilerExtension;

/**
 * Class BaseGridExtension
 * @package Dravencms\BaseGrid\DI
 */
class BaseGridExtension extends CompilerExtension implements TranslationProviderInterface
{
    public function getTranslationResources(): array
    {
        return [__DIR__.'/../lang'];
    }

    public function loadConfiguration(): void
    {
        $this->loadModels();
    }


    protected function loadModels(): void
    {
        $builder = $this->getContainerBuilder();
        foreach ($this->loadFromFile(__DIR__ . '/models.neon') as $i => $command) {
            $cli = $builder->addDefinition($this->prefix('models.' . $i));
            if (is_string($command)) {
                $cli->setFactory($command);
            } else {
                throw new \InvalidArgumentException;
            }
        }
    }

}
