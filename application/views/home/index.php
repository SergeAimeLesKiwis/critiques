<?php
	echo 'Concept : '.$concept;
	echo '<br />Highlights :<br />';

	foreach ($highlights as $item) {
		echo '- '.$item;
		echo '<br />';
	}
?>
<div id="concept">
	<h1>Le concept</h1>
	<p>Lorem ipsum</p>
</div>

<!-- Menu flottant inscription -->
<div class="flottant" id="inscription">
	<h3>Insrivez-vous</h3>
	<form>
		<label>Email :</label><input type="email" name="inscription_mail">
		<input type="submit" name="inscription_submit" value="S'inscrire">
	</form>
</div>

<!-- Menu flottant prochain salon -->
<div class="flottant" id="prochain_salon">
	<h3>Prochain salon</h3>
	<p>Date</p>-<p>Heure</p>
	<p>Adresse</p>
</div>

<!-- Livres à la une -->
<div id="une">
	<div class="livres_une">
		<!-- Image de couverture --><img src="">
		<h3>Titre</h3>
		<p>Auteur</p>
	</div>
	<div class="livres_une">
		<!-- Image de couverture --><img src="">
		<h3>Titre</h3>
		<p>Auteur</p>
	</div>
	<div class="livres_une">
		<!-- Image de couverture --><img src="">
		<h3>Titre</h3>
		<p>Auteur</p>
	</div>
	<div class="livres_une">
		<!-- Image de couverture --><img src="">
		<h3>Titre</h3>
		<p>Auteur</p>
	</div>
</div>

<!-- Formulaire de contact -->
<h2>Contactez nous</h2>
<form>
	<label>Nom :</label><input type="text" name="contact_nom">
	<label>Email :</label><input type="text" name="contact_email">
	<label>Sujet :</label><input type="text" name="contact_sujet">
	<label>Message :</label><textarea name="contact_message">Votre message</textarea>
	<input type="submit" name="contact_submit" value="Envoyer">
</form>