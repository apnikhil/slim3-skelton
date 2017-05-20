<?php namespace App\Repository;

Class AppRepo
{
    /**
     * AppRepo constructor.
     */
    public function __construct()
    {

    }

    /**
     * @return string
     */
    public static function helloWorld()
    {
        try {
            return 'HELLO WORLD!';
        } catch (\Exception $e) {
            // Exception handler
        }
    }
}