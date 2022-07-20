<?php

namespace Praguebest\SyliusFooterPlugin\Form\Type;

use Praguebest\SyliusFooterPlugin\Entity\FooterInterface;
use Praguebest\SyliusFooterPlugin\Form\Type\Translation\FooterBlockTranslationType;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceTranslationsType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;

class FooterBlockType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /** @var FooterInterface $block */
        $footerBlock = $builder->getData();

        $builder
            ->add('translations', ResourceTranslationsType::class, [
                'entry_type' => FooterBlockTranslationType::class,
            ])
            ->add('enabled', CheckboxType::class, [
                'label' => 'praguebest_sylius_footer_plugin.ui.enabled',
                'required' => false,
            ])
        ;
    }
}