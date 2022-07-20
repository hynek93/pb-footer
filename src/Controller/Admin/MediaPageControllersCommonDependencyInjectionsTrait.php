<?php

declare(strict_types=1);

namespace Praguebest\SyliusFooterPlugin\Controller\Admin;

use Liip\ImagineBundle\Imagine\Cache\CacheManager;
use Liip\ImagineBundle\Imagine\Data\DataManager;

trait MediaPageControllersCommonDependencyInjectionsTrait
{
    /** @var CacheManager */
    private $cacheManager;

    /** @var DataManager */
    private $dataManager;

    public function setCacheManager(CacheManager $cacheManager): void
    {
        $this->cacheManager = $cacheManager;
    }

    public function setDataManager(DataManager $dataManager): void
    {
        $this->dataManager = $dataManager;
    }
}
