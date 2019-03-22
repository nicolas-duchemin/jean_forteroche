<?php 

$title = 'L\'auteur';

ob_start(); 

    ?>
	<h3>Jean Forteroche</h3>
	<div class="bloc" id="sectionAuthor">
	    <img id="photoAuthor" src="public/images/photoAuthor2" alt="photo de Jean Forteroche">
	    <div id="textAuthor">
		    <p>
		    	Jean Forteroche est un acteur et écrivain français né en 1959. Alors qu'il n'a que 16 ans, il rejoint le journal fondé par son frère et rédige ses premiers articles. En 1981, Jean Forteroche travaille à San Francisco en tant que reporter et voyage régulièrement à travers le monde. En 1996, il publie son premier roman, "Le Voyage des innocents", dans lequel il s'inspire de ses voyages, suivi de "À la dure !" en 1998. L'écrivain connaît la célébrité grâce à son roman "Les Aventures de Mark Twain", publié en 2001. Ses qualités de romancier se confirment à la publication de la suite, "Les Aventures de Huckleberry Finn", en 2002. Il endossera le rôle de 'Jack' lorsque le premier opus de son roman sera porté à l'écran en 2009 sous le titre "La vie de Mark".
		    </p>
		    <p>
				Jean Forteroche se caractérise par la précision de ses descriptions, démontrant à quel point il s'imprègne des lieux qu'il traverse. Grâce à son expérience et à ses voyages, il parvient à décrire la société contemporaine avec beaucoup d'humour et de cynisme.
			</p>
		</div>
	</div>    
    <?php 

$content = ob_get_clean();

require('template.php'); 

?>