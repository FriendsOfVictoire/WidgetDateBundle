<?php

namespace Victoire\Widget\DateBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Victoire\Bundle\CoreBundle\Form\WidgetType;
use Victoire\Bundle\WidgetBundle\Model\Widget;

/**
 * WidgetDate form type.
 */
class WidgetDateType extends WidgetType
{
    protected $availableLocales;
    protected $currentLocale;

    /**
     * Constructor.
     */
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
        $localesChoices = [];
        foreach ($this->availableLocales as $localeVal) {
            $localesChoices[$localeVal] = 'victoire.i18n.viewType.locale.'.$localeVal;
        }
        if ($options['mode'] === Widget::MODE_STATIC) {
            $builder->add('date', 'datetime', [
                'label' => 'widget_date.form.date.label',
            ]);
        }
        $builder
            ->add('dateFormat', 'choice', [
                    'label'       => 'widget_date.form.dateFormat.label',
                    'empty_value' => 'widget_date.form.dateFormat.empty_value',
                    'choices'     => [
                        'none'   => 'widget_date.form.dateFormat.choices.none',
                        'short'  => 'widget_date.form.dateFormat.choices.short',
                        'medium' => 'widget_date.form.dateFormat.choices.medium',
                        'long'   => 'widget_date.form.dateFormat.choices.long',
                        'full'   => 'widget_date.form.dateFormat.choices.full',
                    ],
            ])
            ->add('timeFormat', 'choice', [
                    'label'       => 'widget_date.form.timeFormat.label',
                    'empty_value' => 'widget_date.form.timeFormat.empty_value',
                    'choices'     => [
                        'none'   => 'widget_date.form.dateFormat.choices.none',
                        'short'  => 'widget_date.form.dateFormat.choices.short',
                        'medium' => 'widget_date.form.dateFormat.choices.medium',
                        'long'   => 'widget_date.form.dateFormat.choices.long',
                        'full'   => 'widget_date.form.dateFormat.choices.full',
                    ],
            ])
            ->add('locale', null, [
                    'label'       => 'widget_date.form.locale.label',
                    'empty_value' => 'widget_date.form.locale.empty_value',
            ])
            ->add('timezone', 'timezone', [
                    'label'       => 'widget_date.form.timezone.label',
                    'empty_value' => 'widget_date.form.timezone.empty_value',
            ])
            ->add('format', null, [
                    'label' => 'widget_date.form.format.label',
            ]);

        if (!empty($localesChoices)) {
            $builder->add('locale', 'choice', [
                        'label'   => 'widget_date.form.locale.label',
                        'choices' => $localesChoices,
                    ]);
        }
        parent::buildForm($builder, $options);
    }

    /**
     * bind form to WidgetDate entity.
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setDefaults([
            'data_class'         => 'Victoire\Widget\DateBundle\Entity\WidgetDate',
            'widget'             => 'Date',
            'translation_domain' => 'victoire',
        ]);
    }

    /**
     * get form name.
     *
     * @return string The form name
     */
    public function getName()
    {
        return 'victoire_widget_form_date';
    }
}
