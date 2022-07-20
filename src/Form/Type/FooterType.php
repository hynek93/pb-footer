<?php

namespace Praguebest\SyliusFooterPlugin\Form\Type;

use Praguebest\SyliusFooterPlugin\Entity\FooterInterface;
use Praguebest\SyliusFooterPlugin\Form\Type\Translation\FooterTranslationType;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceTranslationsType;
use Sylius\Bundle\TaxonomyBundle\Form\Type\TaxonAutocompleteChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;

class FooterType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /** @var FooterInterface $block */
        $footer = $builder->getData();

        $builder
            ->add('translations', ResourceTranslationsType::class, [
                'entry_type' => FooterTranslationType::class,
            ])
            ->add('enabled', CheckboxType::class, [
                'label' => 'praguebest_sylius_footer_plugin.ui.enabled',
                'required' => false,
            ])
            ->add('is_default', CheckboxType::class, [
                'label' => 'praguebest_sylius_footer_plugin.ui.is_default',
                'required' => false,
            ])
            ->add('has_socials', CheckboxType::class, [
                'label' => 'praguebest_sylius_footer_plugin.ui.has_socials',
                'required' => false,
            ])
            ->add('has_newsletter', CheckboxType::class, [
                'label' => 'praguebest_sylius_footer_plugin.ui.has_newsletter',
                'required' => false,
            ])
            ->add('has_copyright', CheckboxType::class, [
                'label' => 'praguebest_sylius_footer_plugin.ui.has_copyright',
                'required' => false,
            ])
            ->add('taxons', TaxonAutocompleteChoiceType::class, [
                'label' => 'praguebest_sylius_footer_plugin.ui.taxons',
                'multiple' => true,
            ])
            ->add('footer_blocks', FooterBlockAutocompleteChoiceType::class, [
                'label' => 'praguebest_sylius_footer_plugin.ui.footer_blocks',
                'multiple' => true,
            ])
        ;
    }
}