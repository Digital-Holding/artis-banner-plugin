<?php

declare(strict_types=1);

namespace DH\ArtisBannerPlugin\Form\Extension;

use Odiseo\SyliusBannerPlugin\Form\Type\BannerType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;

class BannerTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('startsAt', DateTimeType::class, [
                'label' => 'artis_banner_plugin.form.banner.starts_at',
                'date_widget' => 'single_text',
                'time_widget' => 'single_text',
                'required' => false,
            ])
            ->add('endsAt', DateTimeType::class, [
                'label' => 'artis_banner_plugin.form.banner.ends_at',
                'date_widget' => 'single_text',
                'time_widget' => 'single_text',
                'required' => false,
            ])
        ;
    }

    public static function getExtendedTypes(): iterable
    {
        return [BannerType::class];
    }
}
