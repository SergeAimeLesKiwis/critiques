<div class="infos_profil">
	<h1>Profil utilisateur</h1>
	<!-- avatar --><img src="">
	<h2>NOM Prénom</h2>
	<h3>Email</h3>
	<div id="description">
		<h4>Description</h4>
		<p>Lorem ipsum</p>
	</div>
</div>


<!-- Menu flottant de modification d'informations --> 
<div class="flottant" id="modification_infos">
	<ul>
		<li><a href="">Modifier mes informations</a></li>
		<li><a href="">Modifier mon mot de passe</a></li>
		<li><a href="">Gérer ses contacts</a></li>
	</ul>
</div>

<!-- Menu flottant amenant en bas de page sur le formulaire de contact -->
<div class="flottant">
	<button type="button">Contacter</button>
</div>

<!-- Liste des livres à échanger -->
<div id="a_echanger">
	<h2>Pour échanger</h2>
	<button type="button" class="btn btn-default" aria-label="Add">
		<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
	</button>
	<div class="livres_possession">
		<!-- Image de couverture --><img src="">
		<h3>Titre</h3>
		<p>Auteur</p>
	</div>
	<div class="livres_possession">
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

<!-- Modification de ses informations -->
<div class="modal" id="modification_infos_persos">
	<div class="modal-content">
    	<span class="close">&times;</span>
    	<form>
    		<label>Nom :</label><input type="text" name="infos_nom">
    		<label>Prénom :</label><input type="text" name="infos_prenom">
    		<label>Email :</label><input type="text" name="infos_email">
    		<label>Description :</label><textarea name="infos_description"></textarea>
    		<label>Avatar :</label><input type="file" name="infos_avatar">
    		<input type="submit" name="infos_submit" value="Enregistrer">
    	</form>
	</div>
</div>

<!-- Modification de mot de passe -->
<div class="modal" id="modification_mdp">
	<div class="modal-content">
		<span class="close">&times;</span>
		<form>
			<label>Ancien mot de passe :</label><input type="password" name="mdp_old">
			<label>Nouveau mot de passe :</label><input type="password" name="mdp_new">
			<label>Confirmation :</label><input type="password" name="mdp_confirmation_new">
			<input type="submit" name="mdp_submit" value="Enregistrer">
		</form>
	</div>
</div>