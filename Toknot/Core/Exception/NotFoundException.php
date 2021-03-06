<?php

/**
 * Toknot (http://toknot.com)
 *
 * @copyright  Copyright (c) 2011 - 2013 Toknot.com
 * @license    http://toknot.com/LICENSE.txt New BSD License
 * @link       https://github.com/chopins/toknot
 */

namespace Toknot\Control\Exception;

use Toknot\Exception\CustomHttpStatusExecption;
class NotFoundException extends CustomHttpStatusExecption{
    protected $httpStatus = 'Status:404 Not Found';
}

?>
