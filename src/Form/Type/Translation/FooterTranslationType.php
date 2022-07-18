<?php

namespace Praguebest\SyliusFooterPlugin\Form\Type\Translation;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class FooterTranslationType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'praguebest_footer_plugin.ui.name',
                'required' => false,
            ])
            ->add('copyright', TextType::class, [
                'label' => 'praguebest_footer_plugin.ui.copyright',
                'required' => false,
            ])
        ;
    }
}