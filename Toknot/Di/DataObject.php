<?php

/**
 * Toknot (http://toknot.com)
 *
 * @copyright  Copyright (c) 2011 - 2013 Toknot.com
 * @license    http://opensource.org/licenses/bsd-license.php New BSD License
 * @link       https://github.com/chopins/toknot
 */

namespace Toknot\Di;

class DataObject extends Object {

    private $value = '';
    private $propertieClassName = null;

    public function __construct($value = null, $propertieClass = null) {
        $this->propertieClassName = $propertieClass;
        if (is_array($value)) {
            $this->importPropertie($value);
        } else {
            $this->value = $value;
        }
    }
    public function importPropertie($array) {
        foreach($array as $key=>$value) {
            $this->$key = $value;
        }
    }
    
    /**
     * Object class baned declare __set method for child class and provide setPropertie method
     * instead，and set propertie is object instance of propertieClassName 
     * 
     * @param string $propertie
     * @param mixed $value
     */
    public function setPropertie($propertie, $value) {
        if (preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $propertie)) {
            if(is_null($this->propertieClassName)) {
                $this->propertie = new self;
            } else {
                $propertieClassName = $this->propertieClassName;
                $this->$propertie = new $propertieClassName($value);
            }
            $this->interatorArray[] = $propertie;
        } else {
            $this->interatorArray[$propertie] = $value;
        }
    }

    public function __get($propertie) {
        if (isset($this->interatorArray[$propertie])) {
            return $this->interatorArray[$propertie];
        } else {
            return null;
        }
    }

    public function __toString() {
        return $this->value;
    }

    public function rewind() {
        reset($this->interatorArray);
    }

    public function current() {
        $key = $this->key();
        if (count($this->$key) == 0) {
            return $this->$key->value;
        } else {
            return $this->$key;
        }
    }

    public function key() {
        return current($this->interatorArray);
    }

    public function valid() {
        $key = $this->key();
        return in_array($this->interatorArray, $key);
    }

}