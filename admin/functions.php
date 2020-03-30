<?php

function shortenString($string, $end) {
  $returnString = substr($string, 0, $end);
  return $returnString;
}