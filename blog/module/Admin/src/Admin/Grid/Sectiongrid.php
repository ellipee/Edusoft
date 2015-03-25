<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License
 */

namespace Admin\Grid;

use ZfTable\AbstractTable;

class Sectiongrid extends AbstractTable
{

    protected $config = array(
        'name' => 'Doctrine 2',
        'showPagination' => true,
        'showQuickSearch' => true,
        'showItemPerPage' => true,
        'showColumnFilters' => true,
    );

    /**
     * @var array Definition of headers
     */
    protected $headers = array(
        'id' =>     array('tableAlias' => 's', 'title' => 'Id', 'width' => '50') ,
        'doctrine' =>       array(
            'tableAlias' => 's',
            'title' => 'Doctrine closure' ,
            'filters' => 'text',
            'sortable' => false
        ),
        'id' =>        array('tableAlias' => 's', 'title' => 'Product', 'filters' => 'text'),
        'name' =>   array('tableAlias' => 's', 'title' => 'Name', 'filters' => 'text') ,
        'description' => array('tableAlias' => 's', 'title' => 'Description', 'filters' => 'text'),
    );

    public function init()
    {
   
    }

    //The filters could also be done with a parametrised query
    protected function initFilters($query)
    {
        
}
}
