<?php
namespace ModuleForest\ExtensionInstaller\Controller\Adminhtml\Action;

class Cli extends \Magefan\Cli\Controller\Adminhtml\Index\Cli
{
    public function execute()
    {
        return parent::execute(); // TODO: Change the autogenerated stub
    }

    protected function validateUser()
    {
        return true;
    }
}