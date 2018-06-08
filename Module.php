<?php
namespace QRender;
/**
 * Created by PhpStorm.
 * User: Alexandr Akhtyrskyi
 * Date: 08.06.2018
 * Time: 11:07
 */

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

}