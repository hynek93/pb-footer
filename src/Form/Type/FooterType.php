<?php

namespace Praguebest\SyliusFooterPlugin\Form\Type;

use Praguebest\SyliusFooterPlugin\Entity\FooterInterface;
use Praguebest\SyliusFooterPlugin\Form\Type\Translation\FooterTranslationType;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceTranslationsType;
use Sylius\Bundle\TaxonomyBundle\Form\Type\TaxonAutocompleteChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Valid;

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
                'label' => 'praguebest_footer_plugin.ui.enabled',
            ])
            ->add('has_newsletter', CheckboxType::class, [
                'label' => 'praguebest_footer_plugin.ui.has_newsletter',
            ])
            ->add('has_copyright', CheckboxType::class, [
                'label' => 'praguebest_footer_plugin.ui.has_copyright',
            ])
//            ->add('taxons', TaxonAutocompleteChoiceType::class, [
//                'label' => 'praguebest_footer_plugin.ui.taxons',
//                'multiple' => true,
//            ])
        ;
    }
}