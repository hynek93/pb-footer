<?php

namespace Praguebest\SyliusFooterPlugin\Form\Type\Translation;

use Praguebest\SyliusFooterPlugin\Form\Type\WysiwygType;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class FooterBlockTranslationType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'praguebest_sylius_footer_plugin.ui.name',
                'required' => true,
            ])
            ->add('content', WysiwygType::class)
        ;
    }
}