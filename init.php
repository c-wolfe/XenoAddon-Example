<?php

    // This isn't needed. It's probably a good idea to have a package though, in case of conflicting addons and other shit
    namespace Rasmus\XenoPanel\Example;

    // Import our Addon package
    use Cameron\XenoPanel\Addons\Core\Addon;

    /**
     * Class ExampleAddon
     *
     * @package Rasmus\XenoPanel\Example
     */
    class ExampleAddon extends Addon {

        public function __construct() {
            // Instead of having a `$config` variable, we have a constructor to make things easier
            parent::__construct("example_addon", "Example Addon", "1.0.0-DEV", ["Rasmus Lerdorf"], Addon\AddonType::PAGE);
        }

        public function onLoad() {
            // Load the parent `Addon` object to make sure shit is gucci
            $success = parent::onLoad();

            // If our parent didn't load correctly, it might not be a good idea to load our self.
            if (!$success) return false;

            // Little bit of a debug message so show that we're loading :P
            $this->debug('We loaded our parent successfully. Time for me to load >:)');

            return $success;
        }

        public function onEnable() {
            // Enable the parent `Addon` object. Currently, there's no use doing this, but we need to make sure that we're future-proof
            $success = parent::onEnable();

            // If our parent didn't enable correctly, leettttssss not enable.
            if (!$success) return false;

            // Debug message saying that we loaded and now we're gonna enable :P
            $this->debug('Looks like we loaded gucci, time to enable!');

            return $success;
        }

    }

    // Since the way the addons work, we gotta do this sadly.
    $Rexample = new ExampleAddon();

    // Add a page so that you can see the addon's page :DDD
    $Rexample->getRouting()
        ->addRoute('example', 'addons/example_addon/view');

    // Initialize our addon so that XenoPanel will load it :)
    $Rexample->initialize();
