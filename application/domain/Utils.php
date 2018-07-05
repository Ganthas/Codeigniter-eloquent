<?php 

class Utils
{
    public static function debugArray($array)
    {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
        die();
    }

    public static function setDomainFromWrapper($object, $object2)
    {
        $vars_clase = get_class_vars(get_class($object2));
        foreach ($vars_clase as $key => $value) {
            if (is_object($object->{$key})) {
                $objectPersistence = $object->{$key};
                $class = str_replace("Persistence", "", get_class($objectPersistence));
                $newClass = new $class;
                $object2->{$key} = $newClass;
                self::setDomainFromWrapper($objectPersistence, $newClass);
            } else {
                $object2->{$key} = $object->{$key};
            }
        }
    }
}
