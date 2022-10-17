<?php
class Helper{

    public static function getArrayFromDatabaseField($field){
        $database = new Database();
        $array = array();
        $fields = $database->query('select '.$field.' from url')->fetchAll();
        $database->close();
        
        foreach ($fields as $f) {
            $array[] = $f[$field];
        }
        return $array;
    }

    public static function isValueExitsInArray($value, $field){
        $fields = self::getArrayFromDatabaseField($field);
        $result = false;

        if (in_array($value, $fields)){
            $result = true;
        }
        return $result;
    }
}
?>