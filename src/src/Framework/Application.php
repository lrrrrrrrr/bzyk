<?php

namespace Application\Framework;

class Application
{
    private $configutationsPath = 'config';
    public function run()
    {
        try {
            $routing = new Routing($this->getRoutingConfig());
            $routing->route();
        } catch (\Exception $e) {
            render500($e->getMessage());
        }
    }


    private function getRoutingConfig()
    {
        $configFile = $this->configutationsPath . '/routing.json';
        if (!file_exists($configFile)) {
            throw new \Exception('Routing configuration file not found');
        }

        $routingConfig = json_decode(file_get_contents($configFile), 1);
        return $routingConfig;
    }
}