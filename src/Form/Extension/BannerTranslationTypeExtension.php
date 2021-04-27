<?php

declare(strict_types=1);

namespace DH\ArtisBannerPlugin\Form\Extension;

use Odiseo\SyliusBannerPlugin\Form\Type\BannerTranslationType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class BannerTranslationTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('backgroundImageFile', FileType::class, [
                'label' => 'artis_banner_plugin.form.banner.background_image',
            ])
            ->add('title', TextType::class, [
                'label' => 'artis_banner_plugin.form.banner.title',
                'required' => false
            ])
        ;
    }

    public static function getExtendedTypes(): iterable
    {
        return [BannerTranslationType::class];
    }
}
