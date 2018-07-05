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

    public static function setDomainFromWrapper(Object $object, Object $object2)
    {
        $vars_clase = get_class_vars(get_class($object2));
        foreach ($vars_clase as $key => $value) {
            if (is_object($object->{$key})) {

                self::setDomainFromWrapper(get_class($object->{$key}), str_replace("Persistence", "", get_class($object->{$key})));
            } else {
                $object2->{$key} = $object->{$key};
            }
        }
    }
}