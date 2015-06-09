<?php

//--------------------------------vérification d'une adresse mail-----------------------

function VerifierAdresseMail($mail) 
{ 
   $Syntaxe='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#'; 
   if(preg_match($Syntaxe,$mail)) 
      return true; 
   else 
     return false; 
}








// 	---------------------------------------------------------------
// fonction nettoyage d'une chaine pour l'url
// 	---------------------------------------------------------------

function clean_url($chaine){
	$replace = array("¥" => "Y", "µ" => "u", "À" => "A", "Á" => "A","Â" => "A", "Ã" => "A", "Ä" => "A", "Å" => "A","Æ" => "A", "Ç" => "C", "È" => "E", "É" => "E","Ê" => "E", "Ë" => "E", "Ì" => "I", "Í" => "I","Î" => "I", "Ï" => "I", "Ð" => "D", "Ñ" => "N","Ò" => "O", "Ó" => "O", "Ô" => "O", "Õ" => "O","Ö" => "O", "Ø" => "O", "Ù" => "U", "Ú" => "U","Û" => "U", "Ü" => "U", "Ý" => "Y", "ß" => "s","à" => "a", "á" => "a", "â" => "a", "ã" => "a","ä" => "a", "å" => "a", "æ" => "a", "ç" => "c","è" => "e", "é" => "e", "ê" => "e", "ë" => "e","ì" => "i", "í" => "i", "î" => "i", "ï" => "i","ð" => "o", "ñ" => "n", "ò" => "o", "ó" => "o","ô" => "o", "õ" => "o", "ö" => "o", "ø" => "o","ù" => "u", "ú" => "u", "û" => "u", "ü" => "u","ý" => "y", "ÿ" => "y");
	
	$chaine  = strtr($chaine, $replace); // remplace un caractère accentué par son équivalence sans accent
	$chaine = strtolower($chaine);  // met en minuscule
	$chaine  = preg_replace('/([^.a-z0-9]+)/i','-', $chaine); // remplace tout autre caractère différent de a à z , 0 à 9 par un tiret (exemple ' en -)	
	$chaine  = trim($chaine,''); // supprimer les espace avant et après
	$chaine  = trim($chaine,'-'); // supprimer les tiret avant et après
	
	return $chaine;
}





//---------------------mot de passe aléatoir

function cryptme($nbr) {
	$str = "";
	$chaine = "0123456789abcdefghijklmnopqrstuvwxyz";
	for($i=0; $i<$nbr; $i++) {
		$str .= $chaine[rand()%strlen($chaine)];
	}
	return $str;
}




// 	---------------------------------------------------------------
// fonction de REDIMENSIONNEMENT physique "PROPORTIONNEL" et Enregistrement
// 	---------------------------------------------------------------

function fctredimimage($W_max, $H_max, $rep_Dst, $img_Dst, $rep_Src, $img_Src) {
 // ------------------------------------------------------------------
 $condition = 0;
 // Si certains parametres ont pour valeur '' :
   if ($rep_Dst == '') { $rep_Dst = $rep_Src; } // (meme repertoire)
   if ($img_Dst == '') { $img_Dst = $img_Src; } // (meme nom)
 // ------------------------------------------------------------------
 // si le fichier existe dans le répertoire, on continue...
 if (file_exists($rep_Src.$img_Src) && ($W_max!=0 || $H_max!=0)) { 
   // ----------------------------------------------------------------
   // extensions acceptees : 
   $ExtfichierOK = '" jpg jpeg png"'; // (l espace avant jpg est important)
   // extension fichier Source
   $tabimage = explode('.',$img_Src);
   $extension = $tabimage[sizeof($tabimage)-1]; // dernier element
   $extension = strtolower($extension); // on met en minuscule
   // ----------------------------------------------------------------
   // extension OK ? on continue ...
   if (strpos($ExtfichierOK,$extension) != '') {
      // -------------------------------------------------------------
      // recuperation des dimensions de l image Src
      $img_size = getimagesize($rep_Src.$img_Src);
      $W_Src = $img_size[0]; // largeur
      $H_Src = $img_size[1]; // hauteur
      // -------------------------------------------------------------
      // condition de redimensionnement et dimensions de l image finale
      // -------------------------------------------------------------
      
      // C- LARGEUR maxi fixe
      if ($W_max != 0 && $H_max == 0) {
         $W = $W_max;
         $H = $W * ($H_Src / $W_Src);         
         $condition = $W_Src > $W_max; // 1 si vrai (true)
      }
      // -------------------------------------------------------------
      // on REDIMENSIONNE si la condition est vraie
      // -------------------------------------------------------------
      // Par defaut : 
	  // Si l'image Source est plus petite que les dimensions indiquees :
	  // PAS de redimensionnement.
	  // Mais on peut "forcer" le redimensionnement en ajoutant ici :
	  // $condition = 1;
      if ($condition == 1) {
         // ----------------------------------------------------------
         // creation de la ressource-image "Src" en fonction de l extension
         switch($extension) {
         case 'jpg':
         case 'jpeg':
           $Ress_Src = imagecreatefromjpeg($rep_Src.$img_Src);
           break;
         case 'png':
           $Ress_Src = imagecreatefrompng($rep_Src.$img_Src);
           break;
         }
         // ----------------------------------------------------------
         // creation d une ressource-image "Dst" aux dimensions finales
         // fond noir (par defaut)
         switch($extension) {
         case 'jpg':
         case 'jpeg':
           $Ress_Dst = imagecreatetruecolor($W,$H);
           break;
         case 'png':
           $Ress_Dst = imagecreatetruecolor($W,$H);
           // fond transparent (pour les png avec transparence)
           imagesavealpha($Ress_Dst, true);
           $trans_color = imagecolorallocatealpha($Ress_Dst, 0, 0, 0, 127);
           imagefill($Ress_Dst, 0, 0, $trans_color);
           break;
         }
         // ----------------------------------------------------------
         // REDIMENSIONNEMENT (copie, redimensionne, re-echantillonne)
         imagecopyresampled($Ress_Dst, $Ress_Src, 0, 0, 0, 0, $W, $H, $W_Src, $H_Src); 
         // ----------------------------------------------------------
         // ENREGISTREMENT dans le repertoire (avec la fonction appropriee)
         switch ($extension) { 
         case 'jpg':
         case 'jpeg':
           imagejpeg ($Ress_Dst, $rep_Dst.$img_Dst);
           break;
         case 'png':
           imagepng ($Ress_Dst, $rep_Dst.$img_Dst);
           break;
         }
         // ----------------------------------------------------------
         // liberation des ressources-image
         imagedestroy ($Ress_Src);
         imagedestroy ($Ress_Dst);
      }
      // -------------------------------------------------------------
   }
 }
// 	---------------------------------------------------------------
 // si le fichier a bien ete cree
 if ($condition == 1 && file_exists($rep_Dst.$img_Dst)) { return true; }
 else { return false; }
}
// retourne : 1 (vrai) si le redimensionnement et l enregistrement ont bien eu lieu, sinon rien (false)
// 





// 	---------------------------------------------------------------
// fonction de REDIMENSIONNEMENT physique "CROP CENTRE" et Enregistrement

function fctcropimage($W_fin, $H_fin, $rep_Dst, $img_Dst, $rep_Src, $img_Src) {
 // ------------------------------------------------------------------
 $condition = 0;
 // Si certains parametres ont pour valeur '' :
   if ($rep_Dst == '') { $rep_Dst = $rep_Src; } // (meme repertoire)
   if ($img_Dst == '') { $img_Dst = $img_Src; } // (meme nom)
 // ------------------------------------------------------------------
 // si le fichier existe dans le répertoire, on continue...
 if (file_exists($rep_Src.$img_Src)) { 
   // ----------------------------------------------------------------
   // extensions acceptees : 
   $ExtfichierOK = '" jpg jpeg png"'; // (l espace avant jpg est important)
   // extension fichier Source
   $tabimage = explode('.',$img_Src);
   $extension = $tabimage[sizeof($tabimage)-1]; // dernier element
   $extension = strtolower($extension); // on met en minuscule
   // ----------------------------------------------------------------
   // extension OK ? on continue ...
   if (strpos($ExtfichierOK,$extension) != '') {
      // -------------------------------------------------------------
      $condition = 1;
      // -------------------------------------------------------------
      // recuperation des dimensions de l image Source
      $img_size = getimagesize($rep_Src.$img_Src);
      $W_Src = $img_size[0]; // largeur
      $H_Src = $img_size[1]; // hauteur
      // -------------------------------------------------------------
      // condition de crop et dimensions de l image finale
      // -------------------------------------------------------------
      // A- crop aux dimensions indiquees
      if ($W_fin != 0 && $H_fin != 0) {
         $W = $W_fin;
         $H = $H_fin;
      }      // -------------------------------------------------------------
      // B- crop en HAUTEUR (meme largeur que la source)
      if ($W_fin == 0 && $H_fin != 0) {
         $H = $H_fin;
         $W = $W_Src;
      }
      // -------------------------------------------------------------
      // C- crop en LARGEUR (meme hauteur que la source)
      if ($W_fin != 0 && $H_fin == 0) {
         $W = $W_fin;
         $H = $H_Src;         
      }
      // D- crop "carre" a la plus petite dimension de l image source
      if ($W_fin == 0 && $H_fin == 0) {
         if ($W_Src >= $H_Src) {
         $W = $H_Src;
         $H = $H_Src;
         } else {
         $W = $W_Src;
         $H = $W_Src;
         }   
      }
      // -------------------------------------------------------------
      // creation de la ressource-image "Src" en fonction de l extension
      switch($extension) {
      case 'jpg':
      case 'jpeg':
         $Ress_Src = imagecreatefromjpeg($rep_Src.$img_Src);
         break;
      case 'png':
         $Ress_Src = imagecreatefrompng($rep_Src.$img_Src);
         break;
      }
      // ----------------------------------------------------------
      // creation d une ressource-image "Dst" aux dimensions finales
      // fond noir (par defaut)
      switch($extension) {
      case 'jpg':
      case 'jpeg':
         $Ress_Dst = imagecreatetruecolor($W,$H);
         // fond blanc
         $blanc = imagecolorallocate ($Ress_Dst, 255, 255, 255);
         imagefill ($Ress_Dst, 0, 0, $blanc);
         break;
      case 'png':
         $Ress_Dst = imagecreatetruecolor($W,$H);
         // fond transparent (pour les png avec transparence)
         imagesavealpha($Ress_Dst, true);
         $trans_color = imagecolorallocatealpha($Ress_Dst, 0, 0, 0, 127);
         imagefill($Ress_Dst, 0, 0, $trans_color);
         break;
      }
      // -------------------------------------------------------------
      // CENTRAGE du crop
      // coordonnees du point d origine Scr : $X_Src, $Y_Src
      // coordonnees du point d origine Dst : $X_Dst, $Y_Dst
      // dimensions de la portion copiee : $W_copy, $H_copy
      // -------------------------------------------------------------
      // CENTRAGE en largeur
      if ($W_fin == 0) {
         if ($H_fin == 0 && $W_Src < $H_Src) {
            $X_Src = 0;
            $X_Dst = 0;
            $W_copy = $W_Src;
         } else {
            $X_Src = 0;
            $X_Dst = ($W - $W_Src) /2;
            $W_copy = $W_Src;
         }
      } else {
         if ($W_Src > $W) {
            $X_Src = ($W_Src - $W) /2;
            $X_Dst = 0;
            $W_copy = $W;
         } else {
            $X_Src = 0;
            $X_Dst = ($W - $W_Src) /2;
            $W_copy = $W_Src;
         }
      }
      // -------------------------------------------------------------
      // CENTRAGE en hauteur
      if ($H_fin == 0) {
         if ($W_fin == 0 && $H_Src < $W_Src) {
            $Y_Src = 0;
            $Y_Dst = 0;
            $H_copy = $H_Src;
         } else {
            $Y_Src = 0;
            $Y_Dst = ($H - $H_Src) /2;
            $H_copy = $H_Src;
         }
      } else {
         if ($H_Src > $H) {
            $Y_Src = ($H_Src - $H) /2;
            $Y_Dst = 0;
            $H_copy = $H;
         } else {
            $Y_Src = 0;
            $Y_Dst = ($H - $H_Src) /2;
            $H_copy = $H_Src;
         }
      }
      // -------------------------------------------------------------
      // CROP par copie de la portion d image selectionnee
      imagecopyresampled ($Ress_Dst, $Ress_Src, $X_Dst, $Y_Dst, $X_Src, $Y_Src, $W_copy, $H_copy, $W_copy, $H_copy);
      // ----------------------------------------------------------
      // ENREGISTREMENT dans le repertoire (avec la fonction appropriee)
      switch ($extension) { 
      case 'jpg':
      case 'jpeg':
         imagejpeg ($Ress_Dst, $rep_Dst.$img_Dst);
         break;
      case 'png':
         imagepng ($Ress_Dst, $rep_Dst.$img_Dst);
         break;
      }
      // ----------------------------------------------------------
      // liberation des ressources-image
      imagedestroy ($Ress_Src);
      imagedestroy ($Ress_Dst);
   }
   // -------------------------------------------------------------
 }
// 	---------------------------------------------------------------
 // si le fichier a bien ete cree
 if ($condition == 1 && file_exists($rep_Dst.$img_Dst)) { return true; }
 else { return false; }
}
// retourne : 1 (vrai) si le redimensionnement et l enregistrement ont bien eu lieu, sinon rien (false)
// 







//Image functions
//You do not need to alter these functions
function resizeImage($image,$width,$height,$scale) {
	
	// extensions acceptees : 
   $ExtfichierOK = '" jpg jpeg png"'; // (l espace avant jpg est important)
   // extension fichier Source
   $tabimage = explode('.',$image);
   $extension = $tabimage[sizeof($tabimage)-1]; // dernier element
   $extension = strtolower($extension); // on met en minuscule
	
	$newImageWidth = ceil($width * $scale);
	$newImageHeight = ceil($height * $scale);
	$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
	
	switch($extension) {
		
		case 'jpeg':
		case 'jpg':
			$source=imagecreatefromjpeg($image); 
			break;
	    case 'png':
			$source=imagecreatefrompng($image); 
			break;
  	}
	
	imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
	 switch ($extension) { 
      case 'jpg':
      case 'jpeg':
         imagejpeg($newImage,$image,90);
         break;
      case 'png':
         imagepng($newImage,$image);
         break;
      }
	
	chmod($image, 0777);
	return $image;
}
//You do not need to alter these functions
function resizeThumbnailImage($thumb_image_name, $image, $width, $height, $start_width, $start_height, $scale){
	
	
// extensions acceptees : 
   $ExtfichierOK = '" jpg jpeg png"'; // (l espace avant jpg est important)
   // extension fichier Source
   $tabimage = explode('.',$image);
   $extension = $tabimage[sizeof($tabimage)-1]; // dernier element
   $extension = strtolower($extension); // on met en minuscule
	
	
	$newImageWidth = ceil($width * $scale);
	$newImageHeight = ceil($height * $scale);
	$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
	switch($extension) {		
	    case 'pjpeg':
		case 'jpeg':
		case 'jpg':
			$source=imagecreatefromjpeg($image); 
			break;
	    case 'png':
			$source=imagecreatefrompng($image); 
			break;
  	}	
	
	imagecopyresampled($newImage,$source,0,0,$start_width,$start_height,$newImageWidth,$newImageHeight,$width,$height);
		
	switch($extension) {
		case 'jpeg':
		case 'jpg':
	  		imagejpeg($newImage,$thumb_image_name,90); 
			break;
		case 'png':
			imagepng($newImage,$thumb_image_name);  
			break;
    }
	chmod($thumb_image_name, 0777);
	return $thumb_image_name;
}
//You do not need to alter these functions
function getHeight($image) {
	$sizes = getimagesize($image);
	$height = $sizes[1];
	return $height;
}
//You do not need to alter these functions
function getWidth($image) {
	$sizes = getimagesize($image);
	$width = $sizes[0];
	return $width;
}


?>