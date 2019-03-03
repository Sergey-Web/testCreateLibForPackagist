<?php
namespace Parenthesis;

class InvalidArgumentException extends \Exception
{
    protected $message = 'error, parenthesis not closed';
}