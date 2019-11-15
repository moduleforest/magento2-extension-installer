You may be aware of that Magento 2 has no native functionality to directly install extension package via admin like Magento 1 have Magento connect manager. So we have developed this Magento 2 extension to allow installation of Magento 2 zip extension package via admin. The installation process is consist of only 2 steps:

1. Upload Extension Package
2. Activate Extension

both can be done from a single page.

![Screenshot](https://raw.githubusercontent.com/moduleforest/magento2-extension-installer/master/screenshot.png)

## Installation Instructions

1. composer require moduleforest/extension-installer
2. php bin/magento setup:upgrade

## Extension path in admin

System > Extensions > Install Extension

## Contributions

The extension code needs to be optimised a lot. So, pull requests are really appreciated.

## Note

1. It is not recommended to use this extension in production environment.
2. This extension use another open source extension https://github.com/magefan/module-cli as a dependency to execute CLI commands 
