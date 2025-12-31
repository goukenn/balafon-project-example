<?php
// @author: C.A.D. BONDJE DOUE
// @file: InitDbSchemaBuilder.php
// @date: 20251231 16:31:14
namespace com\igkdev\projects\BalafonProjectTutorial\Database;

use IGK\Database\SchemaBuilder\IDiagramBuilder;
use IGK\Database\SchemaBuilder\IDiagramSchemaBuilder;

/**
* 
* @package com\igkdev\projects\BalafonProjectTutorial\Database
* @author C.A.D. BONDJE DOUE
*/
class InitDbSchemaBuilder implements IDiagramBuilder{
	/**
	* update database 
	*/
	public function upgrade(IDiagramSchemaBuilder $builder){
	    // $builder->entity(...)
	}
	/** 
	* downgrade database -  
	*/
	function downgrade(IDiagramSchemaBuilder $builder){
	    // $builder->entity(...);
	}
}