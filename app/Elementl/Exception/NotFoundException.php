<?php
namespace Elementl\Exception;

use Exception;

class NotFoundException extends Exception
{
    protected $code = 404;
}