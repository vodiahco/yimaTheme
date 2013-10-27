<?php
namespace cThemes;

use Zend\ModuleManager\ModuleManagerInterface;
use cThemes\Manager;

class Module
{
    /**
     * @var ModuleManagerInterface
     */
    protected $manager;

    public function init(ModuleManagerInterface $moduleManager)
    {
        //Theme Manager run before all on application bootstrap
        $events = $moduleManager->getEventManager()->getSharedManager();
        //$sm     = $moduleManager->getEvent()->getParam('ServiceManager');

        //$sm->get('cThemes\ThemeManager');
        $this->manager = new Manager($events);
    }

    /**
     * Register service on LOAD_MODULES_POST,
     * in service tavasote Manager dar event e BOOTSTRAP baraaie amaliaat dar dastres ast
     *
     * @return array
     */
    public function getServiceConfig()
    {
        return array (
            'invokables' => array (
                'cThemes\ThemeLocator' => 'cThemes\Theme\Locator'
            ),
        );
    }

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
