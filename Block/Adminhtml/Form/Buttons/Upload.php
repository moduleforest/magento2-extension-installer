<?php
namespace ModuleForest\ExtensionInstaller\Block\Adminhtml\Form\Buttons;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class Upload implements ButtonProviderInterface
{
    public function getButtonData()
    {
        return [
            'label' => __('Upload'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'sort_order' => 90,
        ];
    }
}
