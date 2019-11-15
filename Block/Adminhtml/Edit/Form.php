<?php
namespace ModuleForest\ExtensionInstaller\Block\Adminhtml\Edit;

class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    protected function _prepareForm()
    {
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create(
            [
                'data' => [
                    'id' => 'edit_form',
                    'action' => $this->getUrl('*/*/install'),
                    'method' => 'post',
                    'enctype' => 'multipart/form-data',
                ],
            ]
        );

        $fieldsets['info'] = $form->addFieldset('info_fieldset', 
            [
                'legend' => '',
                'class' => 'fieldset-wide'
            ]
        );

        // base fieldset
        $fieldsets['base'] = $form->addFieldset('base_fieldset', ['legend' => '','class' => 'fieldset-wide']);
        $fieldsets['base']->addField(
            'package',
            'file',
            [
                'name' => 'package',
                'label' => __('Select Package'),
                'title' => __('Select Package'),
                'required' => true,
                'class' => 'input-file'
            ]
        );

        $fieldsets['base']->addType(
            'info',
            '\ModuleForest\ExtensionInstaller\Block\Adminhtml\Edit\Renderer\Info'
        );
        $fieldsets['base']->addField(
            'info div',
            'info',
            [
                'name'  => 'info',
                'label' => __('Info'),
                'title' => __('Info'),

            ]
        );

        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}