<?php

namespace Praguebest\SyliusFooterPlugin\Menu;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class AdminMenuBuilder
{
    public function addAdminMenuItems(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        $newSubmenu = $menu
            ->addChild('footer')
            ->setLabel('Footer')
        ;

        $newSubmenu
            ->addChild('footer', ['route' => 'praguebest_sylius_footer_plugin_admin_footer_index'])
            ->setLabel('Patička')
            ->setLabelAttribute('icon', 'block layout')
        ;
    }
}