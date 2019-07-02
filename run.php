<?php 

	include('simple_html_dom.php');

	 $i=0;

	 while($i < 100){


	 	$i++;

		$page = "page-".$i;

		echo "<h2>".$page."</h2><br>";
		$business = "Hotels/";
		$city = "Jaipur/";
	 	$url = "https://www.justdial.com/".$city.$business.$page;
		$opts = array(
		  'http'=>array(
		    'header'=>"User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:49.0) Gecko/20100101 Firefox/65.0\r\n"
		  )
		);
		 
		$context = stream_context_create($opts);
		$data = file_get_html($url, 0, $context);
		
		foreach ($data->find('.cntanr') as $frame) {
			
			foreach ( $frame->find('.lng_cont_name') as $packet ){
				echo "<b>Business Name : </b>".$packet->innertext . "<br>";
			}
			//rt_count
			
			foreach ( $frame->find('.lng_vote.rt_count') as $packet ){
				echo "<b>Votes : </b>".$packet->innertext . "<br>";
				break;
			}

			echo "<b>Prices : </b>";
			foreach ( $frame->find('.lng_commn') as $packet ){ //bkng_prcdgt
					
					echo $packet->innertext;
			}
			echo "<br>";

			foreach ($frame->find('.contact-info') as $bname) {
					echo "<b>Mobile No. : </b>";
					foreach($bname->find('.mobilesv') as $element){
	      				$mnum = $element->class;
	      				$frefine = str_replace("mobilesv ","",$mnum);
	      				
	      				switch ($frefine) {
							   case 'icon-acb':
							         	echo 0;
							         break;
							   case 'icon-yz':
							   		 	echo 1;
							   		 break;
							   case 'icon-wx':
							   		 	echo 2;
							   		 break;
							    case 'icon-vu':
							         	echo 3;
							         break;
							   case 'icon-ts':
							   		 	echo 4;
							   		 break;
							   case 'icon-rq':
							   		 	echo 5;
							   		 break;
							   case 'icon-po':
							         	echo 6;
							         break;
							   case 'icon-nm':
							   		 	echo 7;
							   		 break;
							   case 'icon-lk':
							   		 	echo 8;
							   		 break;
							   case 'icon-ji':
							   		 	echo 9;
							   		 break;
							   case 'icon-dc':
							   		 	echo "+";
							   		 break;
							   case 'icon-fe':
							   		 	echo "(";
							   		 break;
							   case 'icon-hg':
							   		 	echo ")";
							   		 break;

	      				 
							}
					}

					echo "<br>";
			}

			foreach($frame->find('.cont_fl_addr') as $add){
	      				$add = $add->innertext;
	      				echo "<b>Address : </b>".$add."<br>";


	      			}

			echo '<br>';
			echo '<br>';

		}
	
	 }

// ^[a-zA-Z]+(\/)+(\w[^\/]*)*
// rphvdisp1

 ?>

