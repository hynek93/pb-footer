<?php

namespace Praguebest\SyliusFooterPlugin\Form\Type;

use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class WysiwygType extends AbstractType
{
    /** @var UrlGeneratorInterface */
    private $urlGenerator;

    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'label' => 'praguebest_sylius_footer_plugin.ui.content',
            'config' => [
                'filebrowserUploadUrl' => $this->urlGenerator->generate('praguebest_sylius_footer_plugin_admin_upload_editor_image'),
                'bodyId' => 'praguebest-ckeditor',
            ],
        ]);
    }

    public function getParent(): string
    {
        return CKEditorType::class;
    }

    public function getBlockPrefix(): string
    {
        return 'praguebest_wysiwyg';
    }
}