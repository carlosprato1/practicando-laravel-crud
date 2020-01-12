<?php

function setActive($routeName){
	return request()->routeIs($routeName) ? 'active':'';
}

function setCheked($allItemList, $allItemToChecked){
  if ($allItemToChecked == null) {
  	return '';
  }
	$aux = false;
	foreach ($allItemToChecked as $itemToChecked) {
			if (strcmp($itemToChecked->id, $allItemList->id) == 0 ) {  $aux = true;  }
	}
	return $aux ? 'Checked' : '';
}

function setChekedRadio($special,$valorRadio){
			if (isset($special)) {
			   if ( strcmp($special,$valorRadio) == 0  ) {
			   	   return "checked";
			   }
		  }
	return "";
 }
