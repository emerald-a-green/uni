<a href="zapytanie_zdjecie_usun.php?
ID_zdjecia=<?php echo $zdjecie['ID']; ?>
&ID_produktu=<?php echo $ID; ?>">usun</a>
			
			
			<a href="zapytanie_zdjecie_dom.php?
			ID_zdjecia=<?php echo $zdjecie['ID']; ?>
			&ID_produktu=<?php echo $ID; ?>">
			<img class="zdjecie<?php if ( $zdjecie['dom'] == 1 ) echo 'dom'; ?>" 
			src="<?php echo $zdjecie['url'];?>"/></a>