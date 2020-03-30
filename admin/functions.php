<?php

function shortenString($string) {
  $returnString = substr($string, 0, 9);
  return $returnString;
}