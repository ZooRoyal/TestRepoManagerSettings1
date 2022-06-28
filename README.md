# RDSS Example Plugin

**Obey the rules described in [Confluence](https://confluence.rdss.it/display/DEV/Shopware+Plugin+Development)**

This plugin is used to do awesome stuff. Once installed, it will tell you just how awesome you are.
It can currently only be used in shops that are not yet awesome.

## Frequently Asked Questions

- [I can't run composer install](#add-packagistcom)
- [I see that zooroyal/YOUR-FIRST-PRIVATE-PACKAGE can't be found](#add-packagistcom)

## Add packagist.com 
When you see e.g. ``The requested package zooroyal/YOUR-FIRST-PRIVATE-PACKAGE could not be found in any version, there may be a typo in the package name.``

    composer config --global --auth http-basic.repo.packagist.com rdss-YOURNAME YOUR_TOKEN
    composer config repositories.private-packagist composer https://repo.packagist.com/zooroyal
    composer config repositories.packagist.org false

## Deployment notice

- sw:plugin:refresh
- sw:plugin:install --activate RdssExample
- Update the values in the plugin config.
> shopIsawesome - Is your shop awesome? (edited) 

## Available commands

- rdss:example:command - an example command

## Required Plugins

- [RdssExample](https://github.com/ZooRoyal/RdssExample)

## Tests
Run PHPUnit test in plugin directory

```
composer phpunit
```
