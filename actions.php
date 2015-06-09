<?php 
require_once('config2.php'); 
?>


<main class="main" id="actions">


<?php

if(isset($_GET['cause'])){
	$tri_class = "close";
}
else{
	$tri_class = "none";
}

echo '<div id="tri" class="'.$tri_class.'">';




	

	if(isset($_GET['province'])){

		$class = "decale";
		$h2 = "change";
		$province_name = "retrait";
		
	}
	else{
		$class = "none";
		$h2 = "none";
		$province_name = "none";
		
	}


	
		if(!isset($_GET['province'])){

			echo '<h2 class="'.$h2.'">Dans quelle province voulez-vous agir?</h2>';
		}

		else{
		

			$pdo = $bdd->prepare('SELECT * FROM province');
					$pdo->execute();
					$data = $pdo->fetchAll();




					foreach($data as $row_h3) {

						if(isset($_GET['province']) && $_GET['province'] == $row_h3['province']){

							echo '<h2 class="choix">Votre action se déroulera dans la province de '.$row_h3['nom'].'</h2>';
							
						}

					}
		
		}

		
		
echo '<div id="map" class="'.$class.'">';

		if(isset($_GET['province']) && $_GET['province'] == 'flandre_orientale'){
			$class_activeFor = "active";
		}
		else{
			$class_activeFor = "none";
		}

		if(isset($_GET['province']) && $_GET['province'] == 'flandre_occidentale'){
			$class_activeFoc = "active";
		}
		else{
			$class_activeFoc = "none";
		}

		if(isset($_GET['province']) && $_GET['province'] == 'hainaut'){
			$class_activeHai = "active";
		}	
		else{
			$class_activeHai = "none";
		}

		if(isset($_GET['province']) && $_GET['province'] == 'namur'){
			$class_activeNam = "active";
		}
		else{
			$class_activeNam = "none";
		}	

		if(isset($_GET['province']) && $_GET['province'] == 'luxembourg'){
			$class_activeLux = "active";
		}
		else{
			$class_activeLux = "none";
		}

		if(isset($_GET['province']) && $_GET['province'] == 'liege'){
			$class_activeLie = "active";
		}
		else{
			$class_activeLie = "none";
		}	

		if(isset($_GET['province']) && $_GET['province'] == 'limbourg'){
			$class_activeLim = "active";
		}
		else{
			$class_activeLim = "none";
		}	


		if(isset($_GET['province']) && $_GET['province'] == 'brabant_flamand'){
			$class_activeBf = "active";
		}
		else{
			$class_activeBf = "none";
		}


		if(isset($_GET['province']) && $_GET['province'] == 'brabant_wallon'){
			$class_activeBw = "active";
		}
		else{
			$class_activeBw = "none";
		}



		if(isset($_GET['province']) && $_GET['province'] == 'bruxelles'){
			$class_activeBxl = "active";
		}
		else{
			$class_activeBxl = "none";
		}


		if(isset($_GET['province']) && $_GET['province'] == 'anvers'){
			$class_activeAnv = "active";
		}
		else{
			$class_activeAnv = "none";	
		}





		echo '<svg version="1.1"
			 id="carte" inkscape:version="0.47 r22583" sodipodi:docname="Belgia_regioner_og_provinser.svg" sodipodi:version="0.32" 
			 inkscape:output_extension="org.inkscape.output.svg.inkscape" xmlns:dc="http://purl.org/dc/elements/1.1/" 
			 xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" 
			 xmlns:svg="http://www.w3.org/2000/svg" xmlns:cc="http://creativecommons.org/ns#" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
			 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="71 123.6 737 595.3"
			 enable-background="new 71 123.6 737 595.3" xml:space="preserve">';
		echo '<g id="province">
			<polygon id="flandre_occidentale" class="'.$class_activeFoc.' disable" stroke="#FFFFFF" points="239.4,195.2 233,183.2 239.4,178.9 236,166 184.9,182.7 
				153.5,203.4 126,223.1 84.7,245.1 88.1,271.7 98.4,285.9 89.9,295.4 94.1,311.7 90.7,315.1 98,327.6 112.2,326.3 126,353.8 
				136.3,355.1 138.9,343.1 147.9,345.7 156.5,339.2 154.3,331.5 166.4,328.5 170.7,338.8 187.9,334 197.7,346.1 207.2,343.5 
				224.4,347.4 224,356 232.1,359.4 248.9,343.1 260.5,334.5 259.6,319 250.2,315.1 253.6,301.4 242.9,305.7 248.9,289.8 242.9,288.9 
				248.9,272.1 243.7,265.7 248,260.5 228.3,244.2 238.6,238.2 241.2,224.4 235.6,218 235.6,207.7 241.2,208.1 	"/>
		
				<polygon id="hainaut2" class="'.$class_activeHai.' disable" stroke="#FFFFFF" points="147,362.4 136.3,355.1 138.9,343.1 147.9,345.7 156.5,339.2 154.3,331.5 
				166.4,328.5 170.7,338.8 154.8,347.4 152.6,359 	"/>
				<polygon id="hainaut" class="'.$class_activeHai.' disable" stroke="#FFFFFF" points="248.9,343.1 232.1,359.4 224,356 224.4,347.4 207.2,343.5 197.7,346.1 201.6,357.7 
				211.5,358.1 211.1,368.4 206.8,371.9 216.2,385.6 215.4,408 233,421.7 248.9,418.7 250.2,410.6 261.4,413.6 254.9,422.6 
				277.3,423.5 285,433.8 288.5,454 287.2,465.2 293.6,477.2 299.2,478.5 301.3,466.9 314.2,463.9 322.4,466 328.4,471.2 342.6,467.7 
				355.5,467.3 372.3,480.6 375.3,492.7 382.6,488.4 392.1,487.9 391.6,494.4 379.6,503.4 379.6,519.3 372.3,529.2 386,529.2 
				385.2,539.5 393.3,546.4 386.5,551.6 376.1,555 374.4,563.6 378.3,569.6 375.3,575.2 389,580.4 410.1,576.9 416.6,584.2 
				434.2,584.2 424.7,555.4 422.6,551.1 423,525.3 417.4,520.2 423.9,516.3 423.9,498.3 417.4,496.1 413.1,501.3 403.7,495.2 
				405.8,490.5 429.4,478.1 435.5,477.2 439.3,471.6 446.6,476.8 460.8,474.2 459.5,460 464.3,443.7 457.8,441.5 461.7,423.5 
				453.1,422.2 457,411.8 444.5,413.6 437.6,411 437.6,406.3 411,406.7 407.5,399.4 396.8,393.8 398.1,386.1 387.3,385.2 387.8,375.3 
				381.7,376.2 375.7,385.2 368,379.2 368.4,359.8 360.7,360.3 355.5,366.3 348.6,367.1 333.2,363.7 327.1,357.7 331.9,350.8 
				317.7,350 308.7,348.7 306.9,340.1 292.3,338.3 284.2,356.4 276.4,351.2 267,354.2 265.7,344.4 	"/>
			<a xlink:href="index.php?rub=actions&province=namur">
				<polygon id="namur" class="'.$class_activeNam.'"  stroke="#FFFFFF" points="533.5,381.8 528.7,378.3 518.9,384.8 509.4,386.9 488.8,396.4 485.8,389.5 
				478.5,393.8 470.2,392.6 473.7,403.7 457.4,401.1 457,411.8 453.1,422.2 461.7,423.5 457.8,441.5 464.3,443.7 459.5,460 
				460.8,474.2 446.6,476.8 439.3,471.7 435.5,477.2 429.4,478.1 405.8,490.5 403.7,495.2 413.1,501.3 417.4,496.1 423.9,498.3 
				423.9,516.3 417.4,520.2 423,525.3 422.6,551.1 434.2,584.2 448.8,581.7 460.4,571.3 477.2,570.5 480.2,550.7 475,547.3 
				491.3,533.9 492.6,526.6 502.1,519.8 515.4,523.2 513.7,538.2 506.4,537.8 506.4,556.7 496.1,577.8 509.4,583.8 515.4,593.3 
				508.5,612.2 510.7,627.2 522.7,628.9 531.8,625.5 534.8,610 548.1,603.1 549.8,593.3 558.4,588.5 556.7,579.9 547.7,570.5 
				537.3,575.6 537.8,564 533,558.4 543.8,552 546.4,540 588.9,537.4 582.9,528.3 589.8,523.6 579,501.7 588.1,495.2 597.1,495.7 
				610.4,481.5 607.4,471.2 609.6,455.7 601.8,453.5 594.5,459.6 588.9,457 586.3,449.2 577.3,450.5 576.9,434.2 573,428.2 
				566.1,429.9 552.4,412.7 545.5,411.8 540.4,395.9 534.3,393.4 	"/></a>
			
				<polygon id="luxembourg" class="'.$class_activeLux.' disable" stroke="#FFFFFF" points="727.8,511.2 717.9,514.2 717.9,526.6 705.9,531.4 703.3,543.4 696,546.4 
				699,556.3 691.7,562.7 695.5,572.6 683.5,576.9 676.2,595.8 685.2,599.3 676.6,613.9 679.2,622.9 686.9,625.5 696.8,639.3 
				693,645.7 705.4,645.3 702,659.9 709.7,662.9 708.9,671.9 697.7,683.1 706.3,688.3 693.4,698.1 683.9,694.7 682.2,700.7 660.7,696 
				654.7,707.6 646.1,704.6 628.1,714.9 624.6,703.7 620.3,685.7 603.5,674.5 600.5,680.1 594.1,675.8 599.2,667.6 588.1,655.6 
				571.7,656.9 557.5,651.3 557.1,639.3 541.2,634.5 531.8,625.5 534.8,610 548.1,603.1 549.8,593.3 558.4,588.5 556.7,579.9 
				547.7,570.5 537.3,575.6 537.8,564 533,558.4 543.8,552 546.4,540 588.9,537.4 582.9,528.3 589.8,523.6 579,501.7 588.1,495.2 
				597.1,495.7 610.4,481.5 607.4,471.2 609.6,455.7 616.9,449.7 612.1,442.8 616.4,440.2 625,448.4 632.4,445.4 639.2,453.1 
				647,449.2 660.3,462.1 670.2,461.3 667.2,475.5 676.2,478.9 671.5,490.1 697.7,487.5 695.1,464.3 726.1,471.2 724.8,495.2 
				729.9,503 	"/>
			<a xlink:href="index.php?rub=actions&province=liege">
				<polygon id="liege" class="'.$class_activeLie.'" stroke="#FFFFFF" points="753.1,524 745,525.3 745.4,516.3 733.4,520.6 727.8,511.2 729.9,503 724.8,495.2 
				726.1,471.2 695.1,464.3 697.7,487.5 671.5,490.1 676.2,478.9 667.2,475.5 670.2,461.3 660.3,462.1 647,449.2 639.2,453.1 
				632.4,445.4 625,448.4 616.4,440.2 612.1,442.8 616.9,449.7 609.6,455.7 601.8,453.5 594.5,459.6 588.9,457 586.3,449.2 
				577.3,450.5 576.9,434.2 573,428.2 566.1,429.9 552.4,412.7 545.5,411.8 540.4,395.9 534.3,393.4 533.5,381.8 534.3,354.7 
				542.1,349.5 545.9,360.7 557.5,360.7 564.9,365.4 570.4,356.4 585.1,360.3 587.2,354.7 593.2,357.7 603.1,348.2 613.4,357.3 
				620.7,351.2 625,355.5 633.6,343.5 644,343.5 660.3,330.2 664.2,341.8 662.9,346.9 680.5,347.8 685.2,356.4 698.1,356.8 
				702.8,352.5 699.4,344.8 725.6,343.1 728.6,352.5 744.5,351.7 754.9,377.9 772.5,379.6 769,386.5 752.3,402.4 763.5,416.1 
				781.1,416.6 786.7,421.3 785.8,429.5 792.7,429.5 795.7,437.2 786.7,451.8 799.1,466 794,470.3 780.2,469.5 776.8,486.7 
				761.7,487.5 755.7,500 761.3,503.8 759.6,511.6 753.6,511.2"/></a>

			
				<polygon id="limbourg" class="'.$class_activeLim.' disable" stroke="#FFFFFF" points="660.3,330.2 651.6,318.2 657.6,306.7 677,284.4 666.8,282.3 677.3,265 
				672.6,262.3 680.2,254.7 682.3,244.2 686.7,243.2 683.1,237.7 691.2,232.4 686.5,223.7 677.8,225.6 672.6,215.3 653.7,219.5 
				636.3,208 635.5,195.1 624.5,184.6 606.9,197.2 576,197.2 571,214 582.5,219.8 582,233.7 577.8,236.1 571.5,233.7 569.4,239.2 
				556,241.3 550,252.4 535.8,254.7 532.4,263.4 544.5,270.7 552.9,260.5 562.8,266 549.7,277.8 551.3,286.5 541.3,292.5 551,301.2 
				568.1,298.8 568.9,307.2 560.7,316.4 559.2,326.9 561.8,333.2 553.9,339.2 553.4,350.8 556.8,352.4 557.5,360.7 564.9,365.4 
				570.4,356.4 585.1,360.3 587.7,354.9 593.2,357.7 603.1,348.2 613.4,357.3 620.7,351.2 625,355.5 633.6,343.5 644,343.5 	"/>
			<polygon id="brabant_flamand" class="'.$class_activeBf.' disable" stroke="#FFFFFF" points="394,264.4 403.5,262.1 423.4,274.9 433.9,273.4 438.9,278.3 
				447.9,273.4 459.4,279.4 467.8,269.2 499.3,264.2 499.6,273.6 532.4,263.4 544.5,270.7 552.9,260.5 562.8,266 549.7,277.8 
				551.3,286.5 541.3,292.5 551,301.2 568.1,298.8 568.9,307.2 560.7,316.4 559.2,326.9 561.8,333.2 553.9,339.2 553.4,350.8 
				556.8,352.4 557.5,360.7 545.9,360.7 542.1,349.5 531.1,341.9 521.4,350 514.5,343.4 502.5,342.1 487.8,328.7 479.9,335.8 
				467.3,335.6 468.9,348.7 460.7,352.4 456.3,344.5 444.4,355.5 440.8,346.9 417.7,357.6 410.6,353.4 405.3,363.4 393.3,364.4 
				378,353.2 368.4,359.8 360.7,360.3 355.5,366.3 348.6,367.1 333.2,363.7 327.1,357.7 331.9,350.8 340.2,356 338.7,340 348.1,343.7 
				362.8,333.2 363.3,322.2 360.2,319 367.8,296.2 378.3,299.3 379.1,290.7 376.7,279.9 391.4,279.9 	"/>
			<a xlink:href="index.php?rub=actions&province=bruxelles">
				<polygon id="bruxelles" class="'.$class_activeBxl.'" stroke="#FFFFFF" points="429.5,303.3 421.9,301.4 418.5,305.6 410.3,302.8 402.2,311.4 404.5,319.8 
				395.4,323.8 397.7,331.6 407.2,332.9 409.3,342.1 427.1,344.5 437.4,336.4 433.2,331.6 437.6,327.7 437.1,319.3 430,314.8 	"/></a>
			
				<polygon id="flandre_orientale" class="'.$class_activeFor.' disable" stroke="#FFFFFF" points="239.4,195.2 241.2,208.1 235.6,207.7 235.6,218 241.2,224.4 
				238.6,238.2 228.3,244.2 248,260.5 243.7,265.7 248.9,272.1 242.9,288.9 248.9,289.8 242.9,305.7 253.6,301.4 250.2,315.1 
				259.6,319 260.5,334.5 248.9,343.1 265.7,344.4 267,354.2 276.4,351.2 284.2,356.4 292.3,338.3 306.9,340.1 308.7,348.7 
				331.9,350.8 340.2,356 338.7,340 348.1,343.7 362.8,333.2 363.3,322.2 360.2,319 367.8,296.2 378.3,299.3 379.1,290.7 376.7,279.9 
				391.4,279.9 394,264.4 385.8,263.4 386.1,253.3 381.2,248.1 389.7,239.3 412.2,238.6 410.5,219.4 402.1,200.5 410.9,191.1 
				399.8,188.2 400.8,172.5 394.3,170.9 382.5,189.5 359.8,206.1 350.6,202.5 344.5,211.3 331.8,215.2 331.4,208.7 312.6,212.6 
				312.2,197.9 293.4,194.4 277.4,184.3 262.8,189.8 263.1,202.2 246.2,203.1 	"/>
			
				<polygon id="anvers" class="'.$class_activeAnv.' disable" stroke="#FFFFFF" points="575.5,198.7 573.9,194.7 577.8,184.6 569.4,180.7 559.9,182.3 559.6,173.5 
				548.2,162.1 552.4,145.2 546.3,137.1 540.7,136.4 537.8,132.8 531,147.5 520.5,158.2 511.8,152.4 496.5,156.3 490.6,151.1 
				503.3,148.5 504.3,133.8 486.7,127.6 472.7,143.9 473,152 448.6,150.4 452.2,134.8 436.9,134.8 418.7,144.6 422.3,157.6 
				429.1,165.4 424.9,172.9 412.2,170.9 412.5,163.1 394.3,164.1 394.3,170.9 400.8,172.5 399.8,188.2 410.9,191.1 402.1,200.5 
				410.7,221.8 412.2,238.6 389.7,239.3 381.2,248.1 386.1,253.3 385.8,263.4 394,264.7 403.5,262.1 423.4,274.9 433.9,273.4 
				438.9,278.3 447.9,273.4 459.4,279.4 467.8,269.2 499.3,264.2 499.6,273.6 532.4,263.4 535.8,254.7 550,252.4 556,241.3 
				569.4,239.2 571.5,233.7 577.8,236.1 582,233.7 582.5,219.8 571,214 	"/>
			
				<polygon id="brabant_wallon" class="'.$class_activeBw.' disable" stroke="#FFFFFF" points="378,353.2 368.4,359.8 368,379.2 375.7,385.2 381.7,376.2 387.8,375.3 
				387.3,385.2 398.1,386.1 396.8,393.8 407.5,399.4 411,406.7 437.6,406.3 437.6,411 444.5,413.6 457,411.8 457.4,401.1 473.7,403.7 
				470.2,392.6 478.5,393.8 485.8,389.5 488.8,396.4 509.4,386.9 518.9,384.8 528.7,378.3 533.5,381.8 534.3,354.7 542.1,349.5 
				531.1,341.9 521.4,350 514.5,343.4 502.5,342.1 487.8,328.7 479.9,335.8 467.3,335.6 468.9,348.7 460.7,352.4 456.3,344.5 
				444.4,355.5 440.8,346.9 417.7,357.6 410.6,353.4 405.3,363.4 393.3,364.4 	"/>
			<path stroke="#FFFFFF" d=""/>
			<path id="path3101" stroke="#FFFFFF" d="M417.1,325.1"/>
		</g>';
		echo '</svg>';
	echo '</div>';





	echo '<div id="provinces" class="'.$province_name.'">';

		$pdo = $bdd->prepare('SELECT * FROM province');
			$pdo->execute();
			$data = $pdo->fetchAll();

			
		 

			foreach($data as $row) {


				echo '<p id="'.$row['p'].'">'.$row['nom'].'</p>';

			}


echo '</div>';



	if (isset($_GET['province'])){
			

		echo '<div id="cause">';
			echo '<h2>Quelle cause voulez-vous soutenir?</h2>';

			echo '<ul class="cause">';

				$pdo = $bdd->prepare('SELECT cause FROM actions WHERE province = :province');

				$province = $_GET['province'];  
				$pdo->bindParam(':province', $province);


				$pdo->execute();
				$data_cause = $pdo->fetchAll();
				$causes = array();

				foreach($data_cause as $row_cause ) {
					$causes[] = $row_cause['cause'];

				}
				


				$pdo = $bdd->prepare('SELECT * FROM causes');
				$pdo->execute();
				$data = $pdo->fetchAll();

				

				foreach($data as $row2){

					if(in_array($row2['cause'], $causes)){

						echo '<li><a href="index.php?rub=actions&province='.$_GET['province'].'&cause='.$row2['cause'].'"><img src="img/icon/'.$row2['picto'].'">'.$row2['nom'].'</li></a>';

					}
					else{
						echo '<li class="disable"><img src="img/icon/'.$row2['picto'].'">'.$row2['nom'].'</li>';
					
					}
				}


					

			
			    
			  
			echo '</ul>';
		echo '</div>';


	}

echo '</div>';

	if(isset($_GET['cause'])){


		echo '<div id="selected_actions">';
		echo '<h2>Les actions sélectionnées pour vous</h2>';

	$pdo = $bdd->prepare('SELECT * FROM province WHERE province = :province_choix');
		
		$province_choix = $_GET['province'];  
		$pdo->bindParam(':province_choix', $province_choix);
		$pdo->execute();
		$data = $pdo->fetchAll();


		foreach($data as $row_h3) {

				$choix_province = $row_h3['nom'];
				

		}
	

	$pdo = $bdd->prepare('SELECT * FROM causes WHERE cause = :cause_choix');

		$cause_choix = $_GET['cause'];  
		$pdo->bindParam(':cause_choix', $cause_choix);
		$pdo->execute();
		$data = $pdo->fetchAll();


		foreach($data as $row_h3_choix) {

				$choix_cause = $row_h3_choix['nom'];
				

		}


	echo '<h3 id="modif" class="choix_2"><strong>Province:</strong> '.$choix_province.' | <strong>Cause:</strong> '.$choix_cause.' <span class="modif">Modifier</span></h3>';
	



	
	$pdo = $bdd->prepare('SELECT * FROM actions LEFT JOIN informations ON actions.rub = informations.rub
        					WHERE actions.cause = :cause AND actions.province = :province');

	$province = $_GET['province'];
	$cause = $_GET['cause'];


	$pdo->bindParam(':province', $province);
	$pdo->bindParam(':cause', $cause);


	$pdo->execute();
	$data = $pdo->fetchAll();
	foreach($data as $row4) {

			echo '<section>';
			echo '<img src="img/actions/'.$row4['photo_small'].'" alt="'.$row4['association'].'">';
			echo '<div class="info">';
			echo '<h3>'.$row4['association'].'</h3>';
			echo $row4['but'];
			echo '<ul>';
			echo '<li class="date">'.date("d-m-y", strtotime($row4['date'])).'</li>';
			echo '<li class="lieu">'.$row4['lieu'].'</li>';
			echo '<li class="event">'.$row4['evenement'].'</li>';
			echo '</ul>';
			echo '<a href="index.php?rub=inscription&evenement='.$row4['rub'].'">'.$row4['bouton'].'</a>';
			echo '</div>';
			echo '</section>';
		}


	echo '</div>';


	}




	
?>

</main>
