<?php
namespace ModuleForest\ExtensionInstaller\Block\Adminhtml;

class Install extends \Magento\Backend\Block\Widget\Form\Container
{
    /**
     * Internal constructor
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();

        $this->buttonList->remove('back');
        $this->buttonList->remove('reset');
        $this->buttonList->update('save', 'label', __('Install'));
        //$this->buttonList->update('save', 'id', 'upload_button');
        //$this->buttonList->update('save', 'onclick', 'varienImport.postToFrame();');
        //$this->buttonList->update('save', 'data_attribute', '');

        $this->_objectId = 'package';
        $this->_blockGroup = 'ModuleForest_ExtensionInstaller';
        $this->_controller = 'adminhtml';
    }

    /**
     * Get header text
     *
     * @return \Magento\Framework\Phrase
     */
    public function getHeaderText()
    {
        return __('Extension Installer');
    }
}