<?php

class PushON_CatalogUpload_Block_Catalog_Category_Helper_Form_Pdf extends Varien_Data_Form_Element_Abstract {


    public function __construct($data) {
        parent::__construct($data);
        $this->setType('file');
    }

    
    public function getElementHtml() {
        $html = '';

        if ((string) $this->getValue()) {
            $url = $this->_getUrl();

            if (!preg_match("/^http\:\/\/|https\:\/\//", $url)) {
                $url = Mage::getBaseUrl('media'). 'catalogues' . DS . $url;
            }

            $html = '<a href="' . $url . '" target="blank">'
                    . '<img src="' . Mage::getDesign()->getSkinUrl() . '/images/pdficon.png" id="' . $this->getHtmlId() . '_image" title="' . $this->getValue() . '"'
                    . ' alt="' . $this->getValue() . '" height="22" width="22" class="small-image-preview v-middle" />'
                    . '</a> ';
        }
        $this->setClass('input-file');
        $html .= parent::getElementHtml();
        $html .= $this->_getDeleteCheckbox();

        return $html;
    }

    
    protected function _getDeleteCheckbox() {
        $html = '';
        if ($this->getValue()) {
            $label = Mage::helper('core')->__('Delete Document');
            $html .= '<span class="delete-image">';
            $html .= '<input type="checkbox"'
                    . ' name="' . parent::getName() . '[delete]" value="1" class="checkbox"'
                    . ' id="' . $this->getHtmlId() . '_delete"' . ($this->getDisabled() ? ' disabled="disabled"' : '')
                    . '/>';
            $html .= '<label for="' . $this->getHtmlId() . '_delete"'
                    . ($this->getDisabled() ? ' class="disabled"' : '') . '> ' . $label . '</label>';
            $html .= $this->_getHiddenInput();
            $html .= '</span>';
        }

        return $html;
    }

    
    protected function _getHiddenInput() {
        return '<input type="hidden" name="' . parent::getName() . '[value]" value="' . $this->getValue() . '" />';
    }

    
    protected function _getUrl() {
        return $this->getValue();
    }

    
    public function getName() {
        return $this->getData('name');
    }

}
