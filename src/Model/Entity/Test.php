<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Utility\Inflector;

/**
 * Test Entity.
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $text
 * @property string $locale
 * @property \Cake\I18n\Time $date
 * @property \Cake\I18n\Time $calendar
 * @property \Cake\I18n\Time $hour
 * @property float $currency
 * @property int $numeral
 * @property bool $status
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Test extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    protected $_virtual = ['virtual_field'];

    protected function _getVirtualField() {
        return $this->_properties['id'].' - ' .$this->_properties['slug'];
    }

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