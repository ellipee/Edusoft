<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License
 */


namespace ZfTable\Decorator\Cell;

use ZfTable\Decorator\Exception;

class Icon extends AbstractCellDecorator
{

    /**
     * Path to file
     * @var string
     */
    protected $path;

    /**
     * Alt attribute (optional)
     * @var string
     */
    protected $alt;

    /**
     * Place a decorator
     * @var null|string type
     */
    protected $place = null;

    /**
     *
     * @param array $options
     * @throws Exception\InvalidArgumentException
     */
    public function __construct(array $options = array())
    {
        if (!isset($options['path'])) {
            throw new Exception\InvalidArgumentException('path key in options argument required');
        }
        $this->path = $options['path'];
        $this->alt = (isset($options['alt'])) ? $options['alt'] : null;
        $this->place = (isset($options['place'])) ? $options['place'] : null;
    }

    /**
     * Rendering decorator
     * @param string $context
     * @return string
     */
    public function render($context)
    {
        if ($this->place || $this->place == self::RESET_CONTEXT) {
            return sprintf('<img src="%s" alt="%s" />', $this->path, $this->alt);
        } elseif ($this->place == self::PRE_CONTEXT) {
            return sprintf('<img src="%s" alt="%s" />', $this->path, $this->alt) . $context;
        } else {
            return $context . sprintf('<img src="%s" alt="%s" />', $this->path, $this->alt);
        }
    }
}
