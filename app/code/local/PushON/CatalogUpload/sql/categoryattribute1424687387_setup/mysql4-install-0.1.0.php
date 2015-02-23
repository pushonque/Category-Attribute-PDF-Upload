<?php
$installer = $this;
$installer->startSetup();


$installer->addAttribute("catalog_category", "category_brochure",  array(
    "type"     => "varchar",
    "backend"  => "catalogupload/category_attribute_backend_pdf",
    "input_renderer"    => "catalogupload/catalog_category_helper_form_pdf",
    "frontend" => "",
    "label"    => "Catalogue",
    "input"    => "pdf",
    "class"    => "PushON_CatalogUpload_CategoryBrochure",
    "source"   => "",
    "global"   => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
    "visible"  => true,
    "required" => false,
    "user_defined"  => false,
    "default" => "",
    "searchable" => false,
    "filterable" => false,
    "comparable" => false,
	
    "visible_on_front"  => false,
    "unique"     => false,
    "note"       => ""

	));
$installer->endSetup();
	 