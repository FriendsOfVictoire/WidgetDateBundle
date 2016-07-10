<?php

namespace Victoire\Widget\DateBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Victoire\Bundle\CoreBundle\Annotations as VIC;
use Victoire\Bundle\WidgetBundle\Entity\Widget;

/**
 * WidgetDate.
 *
 * @ORM\Table("vic_widget_date")
 * @ORM\Entity
 */
class WidgetDate extends Widget
{
    /**
     * @var string
     *
     * @ORM\Column(name="date", type="datetime", length=70, nullable=true)
     * @VIC\ReceiverProperty("dateable")
     */
    protected $date;

    /**
     * @var string
     *
     * @ORM\Column(name="dateFormat", type="string", length=70, nullable=true)
     */
    protected $dateFormat;

    /**
     * @var string
     *
     * @ORM\Column(name="timeFormat", type="string", length=70, nullable=true)
     */
    protected $timeFormat;

    /**
     * @var string
     *
     * @ORM\Column(name="dateLocale", type="string", length=70, nullable=true)
     */
    protected $dateLocale;

    /**
     * @var string
     *
     * @ORM\Column(name="timezone", type="string", length=70, nullable=true)
     */
    protected $timezone;

    /**
     * @var string
     *
     * @ORM\Column(name="format", type="string", length=70, nullable=true)
     */
    protected $format;

    /**
     * To String function
     * Used in render choices type (Especially in VictoireWidgetRenderBundle).
     *
     * @return string
     */
    public function __toString()
    {
        return 'Date #'.$this->id;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getDateFormat()
    {
        return $this->dateFormat;
    }

    /**
     * @param string $dateFormat
     */
    public function setDateFormat($dateFormat)
    {
        $this->dateFormat = $dateFormat;
    }

    /**
     * @return string
     */
    public function getTimeFormat()
    {
        return $this->timeFormat;
    }

    /**
     * @param string $timeFormat
     */
    public function setTimeFormat($timeFormat)
    {
        $this->timeFormat = $timeFormat;
    }

    /**
     * @return string
     */
    public function getDateLocale()
    {
        return $this->dateLocale;
    }

    /**
     * @param string $dateLocale
     */
    public function setDateLocale($dateLocale)
    {
        $this->dateLocale = $dateLocale;
    }

    /**
     * @return string
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * @param string $timezone
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;
    }

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param string $format
     */
    public function setFormat($format)
    {
        $this->format = $format;
    }
}
