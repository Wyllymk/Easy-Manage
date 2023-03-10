<?php
/**
 * @package EasyManage
 */

namespace Inc;

final class Init{

    public static function getClasses(){
        return[
            Base\Controller::class,
            Base\Enqueue::class,
            Pages\ExternalApi::class,
            Pages\Contact::class,
            Pages\CustomFunctions::class,
            Pages\Roles::class,
            Pages\CPT::class,
        ];
    }

    public static function register_services(){
        foreach(self::getClasses() as $classes){
            $service = self::instantiate($classes);
            if(method_exists($service, 'register')){
                $service->register();
            }
        }
    }

    public static function instantiate($classes){
        $service = new $classes();
        return $service;
    }
}