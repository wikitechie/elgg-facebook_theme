<?php
// ----------------------------------------------------------------------
// Copyright (C) 2007 by Khaled Al-Shamaa.
// http://www.al-shamaa.com/php/arabic
// ----------------------------------------------------------------------
// LICENSE

// This program is open source product; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.

// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.

// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------
// Class Name: Identify Arabic Text Segments
// Filename:   ArIdentifier.class.php
// Original    Author(s): Khaled Al-Sham'aa <khaled.alshamaa@gmail.com>
// Purpose:    This class will identify Arabic text in a given UTF-8 multi 
//             language document, it will return array of start and end 
//             positions for Arabic text segments.
// ----------------------------------------------------------------------

class ArIdentifier {
      function identify($str){
          $minAr  = 55436;
          $maxAr  = 55698;
          $probAr = false;
          $ArFlag = false;
          $ArRef  = array();
          $max    = strlen($str);

          for($i=0; $i<$max; $i++){

              $cDec = ord($str[$i]);
              $cHex = base_convert($cDec, 10, 16);

              if (!$probAr && ($cHex == 'd8' || $cHex == 'd9')){
                   $probAr = true;
                   continue;
              }

              $pDec = ord($str[$i-1]);
              $pHex = base_convert($pDec, 10, 16);

              if ($probAr){
                  $utfHexCode = $pHex . $cHex;
                  $utfDecCode = base_convert($utfHexCode, 16, 10);

                  if ($utfDecCode >= $minAr && $utfDecCode <= $maxAr){
                      if(!$ArFlag){
                          $ArFlag  = true;
                          $ArRef[] = $i - 1;
                      }
                  }else{
                      if ($ArFlag){
                          $ArFlag  = false;
                          $ArRef[] = $i - 1;
                      }
                  }

                  $probAr = false;
                  continue;
              }

              if ($ArFlag && !preg_match("/^\s$/", $str[$i])){
                  $ArFlag  = false;
                  $ArRef[] = $i;
                  break; // i've just broke it for our special needs
              }
          }
      
          return $ArRef;
      }

}
?>
