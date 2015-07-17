<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Utility\Inflector;

/**
 * Test Entity.
 */
class Test extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'slug' => true,
        'text' => true,
        'locale' => true,
        'date' => true,
        'calendar' => true,
        'hour' => true,
        'currency' => true,
        'numeral' => true,
        'status' => true,
    ];

    protected function _setSlug($slug)
    {
        return strtolower(Inflector::slug($slug));
    }

    protected function _setCalendar($calendar)
    {
        return is_object($calendar) ? $calendar->format('Y-m-d H:i') : $calendar;
    }

    protected function _getCalendar($calendar)
    {
        return is_object($calendar) ? $calendar->format('d/m/Y H:i') : $calendar;
    }

    protected function _getHour($hour)
    {
        return is_object($hour) ? $hour->format('H:i') : $hour;
    }
}
