<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controller
 *
 * @author mac
 */
class Controller extends CController{
/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='/layouts/column2';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	public function resolveViewFile1($viewName, $viewPath, $basePath, 
            $moduleViewPath = null) {
        
        // First try to find the view file from this module
        $file = parent::resolveViewFile($viewName, $viewPath, $basePath, 
                $moduleViewPath);
        
        if ($file !== false) {
            // We have found the view file.
            // Set the _currentResolveViewFileModule to null in order for 
            // subsequent calls to this method to start recursion.
            $this->_currentResolveViewFileModule = null;
            return $file;
        }
        
        // We have not found a view file. We now recurse into the parent 
        // modules if possible.
        
        // Try to get the parent module.
        if (!isset($this->_currentResolveViewFileModule)) {
            $parentModule = $this->getModule()->getParentModule();
        } else {
            $parentModule = $this->_currentResolveViewFileModule->getParentModule();
        }
        
        if (!isset($this->_currentResolveViewFileModule) && 
                !isset($parentModule)) {
            // If neither the current module nor the parent module is set,
            // we are at the top of the module chain and still have not found
            // the file. We just return false.
            $file = false;
        } else {
            if (isset($parentModule)) {
                // The parent module is set. We will try to find the
                // file in the parent module using the
                // view path of the parent module.
                $moduleViewPath = $parentModule->getViewPath();
                $this->_currentResolveViewFileModule = $parentModule;
            } else {
                // The parent module is not set. We will try to find the
                // view in the basePath.
                $moduleViewPath = null;
            }
            $file = $this->resolveViewFile($viewName, $viewPath, $basePath, 
                    $moduleViewPath);
        }
        return $file;
    }
    
    private $_currentResolveViewFileModule = null;

}


