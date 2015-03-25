<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License
 */

namespace ZfTable\Decorator\Condition;

use Zend\ServiceManager\AbstractPluginManager;

class ConditionPluginManager extends AbstractPluginManager
{

    /**
     * Default set of helpers
     *
     * @var array
     */
    protected $invokableClasses = array(
        'equal' => '\ZfTable\Decorator\Condition\Plugin\Equal',
        'notequal' => '\ZfTable\Decorator\Condition\Plugin\NotEqual',
        'between' => '\ZfTable\Decorator\Condition\Plugin\Between',
        'greaterthan' => '\ZfTable\Decorator\Condition\Plugin\GreaterThan',
        'lesserthan' => '\ZfTable\Decorator\Condition\Plugin\LesserThan',


    );

    /**
     * Don't share plugin by default
     *
     * @var bool
     */
    protected $shareByDefault = false;


    /**
     * See AbstractPluginManager
     *
     * @throws \DomainException
     * @param mixed $plugin
     */
    public function validatePlugin($plugin)
    {
        if ($plugin instanceof AbstractCondition) {
            return;
        }
        throw new \DomainException('Invalid Condition Implementation');
    }
}
