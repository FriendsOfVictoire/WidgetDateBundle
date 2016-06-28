<?php

namespace Victoire\Widget\DateBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TimezoneType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Victoire\Bundle\CoreBundle\Form\WidgetType;
use Victoire\Bundle\WidgetBundle\Model\Widget;

class WidgetDateType extends WidgetType
{
    protected $availableLocales;
    protected $currentLocale;

    public function __construct($availableLocales)
    {
        $this->availableLocales = $availableLocales;
    }

    /**
     * define form fields.
     *
     * @param FormBuilderInterface $builder
     *
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if ($options['mode'] === Widget::MODE_STATIC) {
            $builder->add('date', DateTimeType::class, [
                'label' => 'widget_date.form.date.label',
            ]);
        }
        $datetimeFormatChoices = [
            'widget_date.form.dateFormat.choices.none'   => 'none',
            'widget_date.form.dateFormat.choices.short'  => 'short',
            'widget_date.form.dateFormat.choices.medium' => 'medium',
            'widget_date.form.dateFormat.choices.long'   => 'long',
            'widget_date.form.dateFormat.choices.full'   => 'full',
        ];

        $builder
            ->add('dateFormat', ChoiceType::class, [
                'label'       => 'widget_date.form.dateFormat.label',
                'empty_value' => 'widget_date.form.dateFormat.empty_value',
                'choices'     => $datetimeFormatChoices,
                'choices_as_values' => true,
            ])
            ->add('timeFormat', ChoiceType::class, [
                'label'       => 'widget_date.form.timeFormat.label',
                'empty_value' => 'widget_date.form.timeFormat.empty_value',
                'choices'     => $datetimeFormatChoices,
                'choices_as_values' => true,
            ])
            ->add('locale', null, [
                    'label'       => 'widget_date.form.locale.label',
                    'empty_value' => 'widget_date.form.locale.empty_value',
            ])
            ->add('timezone', TimezoneType::class, [
                    'label'       => 'widget_date.form.timezone.label',
                    'empty_value' => 'widget_date.form.timezone.empty_value',
            ])
            ->add('format', null, [
                    'label' => 'widget_date.form.format.label',
            ]);

        $localesChoices = [];
        foreach ($this->availableLocales as $localeVal) {
            $localesChoices['victoire.i18n.viewType.locale.'.$localeVal] = $localeVal;
        }
        if (!empty($localesChoices)) {
            $builder->add('locale', ChoiceType::class, [
                'label'   => 'widget_date.form.locale.label',
                'choices' => $localesChoices,
                'choices_as_values' => true,
            ]);
        }
        parent::buildForm($builder, $options);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'data_class'         => 'Victoire\Widget\DateBundle\Entity\WidgetDate',
            'widget'             => 'Date',
            'translation_domain' => 'victoire',
        ]);
    }
}
