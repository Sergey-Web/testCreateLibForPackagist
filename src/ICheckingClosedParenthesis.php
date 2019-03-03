<?php
namespace Parenthesis;

interface ICheckingClosedParenthesis {

    function __construct(string $str);

    function result();
}