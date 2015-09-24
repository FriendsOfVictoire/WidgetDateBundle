<?php

namespace Victoire\Widget\DateBundle\Resolver;

use Victoire\Bundle\WidgetBundle\Model\Widget;
use Victoire\Bundle\WidgetBundle\Resolver\BaseWidgetContentResolver;

class WidgetDateContentResolver extends BaseWidgetContentResolver
{
    /**
     * Override the populateParametersWithWidgetFields
     *
     * @param Widget $widget
     * @param $entity
     * @param $parameters
     */
    protected function populateParametersWithWidgetFields(Widget $widget, $entity, &$parameters)
    {
        /** @var string[] $fields */
        $fields = $widget->getFields();
        //parse the field
        foreach ($fields as $widgetField => $field) {
            //get the value of the field
            if ($entity !== null) {
                $attributeValue = $entity->getEntityAttributeValue($field);
            } else {
                $attributeValue = $widget->getBusinessEntityId().' -> '.$field;
                if ('date' == $widgetField) {
                    $attributeValue = new \DateTime();
                }
            }

            $parameters[$widgetField] = $attributeValue;
        }
    }
}
