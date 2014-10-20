<?php 
#   Copyright by FeTTsack
#   Support: Graphics-For-All


defined ('main') or die ( 'no direct access' );

  $allyAnzahl = $allgAr['Aanz'];
  if ( $allgAr['Aart'] == 1 ) {
	  $sqlORDER = 'pos';
	} else {
	  $sqlORDER = 'RAND()';
	}
	
	
	$allyNameAr = array();
	$allyLinkAr = array();
	$allyBanaAr = array();
  $allyAktAnz = 0;
  $x = 0;
  
  
	
	$allyAbf = 'SELECT * FROM `prefix_partners` ORDER BY '.$sqlORDER.' ASC';
	$allyErg = db_query($allyAbf);
	
	  $shuffle = substr(str_shuffle('123'), 0, 1);
$sc = substr(str_shuffle('1234567890'), 0, 3);
$sc = $sc % 2;

if($sc == 1){
	$sc = 'ASC';
}else{
	$sc = 'DESC';
}

switch($shuffle){
	case 1:
		$orderby = 'pos';
	break;
	
	case 2:
		$orderby = 'link';
	break;
	
	case 3:
		$orderby = 'id';
	break;
}
	
	$allyErg2 = db_query("SELECT * FROM prefix_partners ORDER BY $orderby $sc");
	echo '<table width="200"><tr><td><marquee align="buttom" direction="up" width="90" height="120" scrollAmount="1" scrolldelay="1" onMouseover="this.scrollAmount=0" onMouseout="this.scrollAmount=1" style="border:none; margin-top:30px;">';  
	echo '<div align="center"><table>';
		while($allyRow = db_fetch_object($allyErg)) {
		    echo '<tr><td><a class="box" href="'.$allyRow->link.'" target="_blank">';
		    if ( empty ($allyRow->banner) ) {
		      echo $allyRow->name;
		    } else {
		      echo '<img src="'.$allyRow->banner.'" alt="'.$allyRow->name.'" border="0">';
		    }
		    echo '</a></td></tr>';
	  }
	  echo '</table></div></marquee></td><td><marquee align="top" direction="down" width="90" height="120" scrollAmount="1" scrolldelay="1" onMouseover="this.scrollAmount=0" onMouseout="this.scrollAmount=1" style="border:none; margin-top:30px;">';
	echo '<div align="center"><table>';
		while($allyRow = db_fetch_object($allyErg2)) {
		    echo '<tr><td><a class="box" href="'.$allyRow->link.'" target="_blank">';
		    if ( empty ($allyRow->banner) ) {
		      echo $allyRow->name;
		    } else {
		      echo '<img src="'.$allyRow->banner.'" alt="'.$allyRow->name.'" border="0">';
		    }
		    echo '</a></td></tr>';
	  }
	 echo '</table></div></marquee></td></tr></table>';
?>
