<?php


namespace App\Helpers;


use Closure;
use Illuminate\Support\Collection;
use stdClass;

class ObjectHelper
{
    /**
     * @param object $object
     * @param array $convertMap
     * @return stdClass
     */
    public static function convertObject($object, $convertMap)
    {
        $newObject = new $object;
        foreach ($convertMap as $newKey => $oldKey) {
            if (is_numeric($newKey)) {
                if ($oldKey instanceof Closure) {
                    continue;
                }
                $newKey = $oldKey;
            }
            if (!($oldKey instanceof Closure) && empty($object->$oldKey)) {
                continue;
            }

            $newObject->$newKey = $oldKey instanceof Closure ? $oldKey($object) : $object->$oldKey;
        }
        return $newObject;
    }

    public static function convertObjectsArray($objectsArray, $convertMap)
    {
        $convertObjectsArray = [];
        if (!is_array($objectsArray) && !($objectsArray instanceof Collection)) {
            return null;
        }
        foreach ($objectsArray as $key => $object) {
            if (!is_object($object)) {
                return null;
            }
            $convertObjectsArray[$key] = ObjectHelper::convertObject($object, $convertMap);
        }
        return $convertObjectsArray;
    }
}
