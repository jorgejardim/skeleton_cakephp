<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Cache\Cache;

class CommonComponent extends Component
{
    public function getEntityErrors($entity_base)
    {
        if (is_array($entity_base)) {
            $entitys = $entity_base;
        } else {
            $entitys[] = $entity_base;
        }

        $error = '';
        foreach ($entitys as $entity) {

            if($entity->errors()) {
                $error .= implode('<br />', array_map(function ($entry) {
                    if(isset($entry['valid'])) {
                        return '- '.$entry['valid'];
                    } elseif(isset($entry['_required'])) {
                        return '- '.$entry['_required'];
                    } elseif(isset($entry['_isUnique'])) {
                        return '- '.$entry['_isUnique'];
                    } elseif(isset($entry['_existsIn'])) {
                        return '- '.$entry['_existsIn'];
                    } elseif(isset($entry['_empty'])) {
                        return '- '.$entry['_empty'];
                    } elseif(isset($entry['inList'])) {
                        return '- '.$entry['inList'];
                    } elseif(isset($entry['notEmpty'])) {
                        return '- '.$entry['notEmpty'];
                    } elseif(isset($entry['notBlank'])) {
                        return '- '.$entry['notBlank'];
                    } elseif(isset($entry['alphaNumeric'])) {
                        return '- '.$entry['alphaNumeric'];
                    } elseif(isset($entry['comparison'])) {
                        return '- '.$entry['comparison'];
                    } elseif(isset($entry['compareWith'])) {
                        return '- '.$entry['compareWith'];
                    } elseif(isset($entry['custom'])) {
                        return '- '.$entry['custom'];
                    } elseif(isset($entry['date'])) {
                        return '- '.$entry['date'];
                    } elseif(isset($entry['datetime'])) {
                        return '- '.$entry['datetime'];
                    } elseif(isset($entry['time'])) {
                        return '- '.$entry['time'];
                    } elseif(isset($entry['boolean'])) {
                        return '- '.$entry['boolean'];
                    } elseif(isset($entry['decimal'])) {
                        return '- '.$entry['decimal'];
                    } elseif(isset($entry['email'])) {
                        return '- '.$entry['email'];
                    } elseif(isset($entry['minLength'])) {
                        return '- '.$entry['minLength'];
                    } elseif(isset($entry['numeric'])) {
                        return '- '.$entry['numeric'];
                    } elseif(isset($entry['url'])) {
                        return '- '.$entry['url'];
                    } elseif(isset($entry['unique'])) {
                        return '- '.$entry['unique'];
                    }
                    return '';
                }, $entity->errors()));
            }
        }
        return "<br />".$error;
    }

    public function clear_cache($key = null, $config = 'default')
    {
        if($key) {
            Cache::delete($key, $config);
        } else {
            Cache::clear(false, 'hour');
            Cache::clear(false, 'day');
            Cache::clear(false, 'week');
            Cache::clear(false, 'month');
            Cache::clear(false, 'year');
            Cache::clear(false, 'default');
        }
    }
}