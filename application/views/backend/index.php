<button type="button" class="btn btn-default" aria-label="Dropdown_accueil" data-toggle="collapse" data-target="#collapseAccueil" aria-expanded="false" aria-controls="collapseAccueil">
	Page d'accueil
	<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
</button>
<button type="button" class="btn btn-default" aria-label="Dropdown_contenus" data-toggle="collapse" data-target="#collapseContenus" aria-expanded="false" aria-controls="collapseContenus">
	Contenus
	<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
</button>
<button type="button" class="btn btn-default" aria-label="Dropdown_statiques" data-toggle="collapse" data-target="#collapseStatiques" aria-expanded="false" aria-controls="collapseStatiques">
	Pages statiques
	<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
</button>
<button type="button" class="btn btn-default" aria-label="Dropdown_salon" data-toggle="collapse" data-target="#collapseSalon" aria-expanded="false" aria-controls="collapseSalon">
	Salon
	<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
</button>
<button type="button" class="btn btn-default" aria-label="Dropdown_membres" data-toggle="collapse" data-target="#collapseMembres" aria-expanded="false" aria-controls="collapseMembres">
	Membres
	<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
</button>

<!-- Administration de l'accueil -->
<div class="collapse" id="collapseAccueil">
	<form>
		<h3>Le concept</h3>
		<textarea name="admin_concept"></textarea>
		<h3>A la une</h3>
		<button type="button" class="btn btn-default" aria-label="Add">
			<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
		</button>
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
		<input type="submit" name="save_accueil" value="Sauvegarder">
	</form>
</div>

<!-- Administration des contenus -->
<div class="collapse" id="collapseContenus">
	<button type="button">Ajouter</button>
	<button type="button">Modifier</button>
	<!-- Si l'on clique sur le bouton ajouter -->
	<div id="ajouter" hidden>
		<form>
			<input type="radio" name="action" value="Création automatique">
			<input type="radio" name="action" value="Création manuelle">
			<div id="select_categorie">
				<label>Catégorie</label>
				<select>
					<option>-- Sélectionner une catégorie --</option>
					<option>Livre</option>
				</select>
			</div>
			<div id="select_sous_categorie">
				<label>Sous-catégorie</label>
				<select>
					<option>-- Sélectionner une sous-catégorie --</option>
					<option>Policier</option>
					<option>Fantastique</option>
					<option>Science-fiction</option>
				</select>
			</div>
			<!-- Si l'on clique sur la création automatique -->
			<div id="automatique">
				<label>Url du produit</label>
				<input type="url" name="url_produit">
			</div>
			<!-- Si l'on clique sur création manuelle -->
			<div id="manuelle">
				<div id="titre">
					<label>Titre</label>
					<input type="text" name="titre_product">
				</div>
				<div id="image">
					<label>Image de couverture</label>
					<input type="file" name="image_couverture">
				</div>
				<div id="description">
					<label>Description</label>
					<textarea name="description_product"></textarea>
				</div>
			</div>
			<input type="submit" name="product" value="Valider">
		</form>
	</div>
	<!-- Si l'on clique sur le bouton modifier -->
	<div id="modifier" hidden>
		<div id="liste_contenus">
			<div id="filtres">
				<select>
					<option>-- Sélectionner une catégorie --</option>
					<option>Livre</option>
				</select>
				<select>
					<option>-- Sélectionner une sous-catégorie --</option>
					<option>Policier</option>
					<option>Science-fiction</option>
					<option>Fantastique</option>
				</select>
				<input type="text" name="search">
			</div>
			<div id="liste">
				<div class="livres_liste_admin">
					<!-- Image de couverture --><img src="">
					<h3>Titre</h3>
					<p>Auteur</p>
					<a href="">Modifier</a>
				</div>
				<div class="livres_liste_admin">
					<!-- Image de couverture --><img src="">
					<h3>Titre</h3>
					<p>Auteur</p>
					<a href="">Modifier</a>
				</div>
				<div class="livres_liste_admin">
					<!-- Image de couverture --><img src="">
					<h3>Titre</h3>
					<p>Auteur</p>
					<a href="">Modifier</a>
				</div>
				<div class="livres_liste_admin">
					<!-- Image de couverture --><img src="">
					<h3>Titre</h3>
					<p>Auteur</p>
					<a href="">Modifier</a>
				</div>
			</div>	
		</div>
	</div>
</div>

<div id="modification">
	<form>
			<input type="radio" name="action" value="Création automatique">
			<input type="radio" name="action" value="Création manuelle">
			<div id="select_categorie">
				<label>Catégorie</label>
				<select>
					<option>-- Sélectionner une catégorie --</option>
					<option>Livre</option>
				</select>
			</div>
			<div id="select_sous_categorie">
				<label>Sous-catégorie</label>
				<select>
					<option>-- Sélectionner une sous-catégorie --</option>
					<option>Policier</option>
					<option>Fantastique</option>
					<option>Science-fiction</option>
				</select>
			</div>
			<!-- Si l'on clique sur la création automatique -->
			<div id="automatique">
				<label>Url du produit</label>
				<input type="url" name="url_produit">
			</div>
			<!-- Si l'on clique sur création manuelle -->
			<div id="manuelle">
				<div id="titre">
					<label>Titre</label>
					<input type="text" name="titre_product">
				</div>
				<div id="image">
					<label>Image de couverture</label>
					<input type="file" name="image_couverture">
				</div>
				<div id="description">
					<label>Description</label>
					<textarea name="description_product"></textarea>
				</div>
			</div>
			<input type="submit" name="product" value="Valider">
		</form>
</div>

<!-- Administration des pages statiques -->
<div class="collapse" id="collapseStatiques">
	<input type="radio" name="type" value="Catégorie">
	<input type="radio" name="type" value="Page">
	<!-- Si catégorie sélectionné -->
	<form>
		<label>Nom</label>
		<input type="text" name="nom_categorie">
		<input type="submit" name="submit_categorie" value="Valider">
	</form>
	<!-- Si page sélectionné -->
	<form>
		<div id="categorie_select">
			<label>Catégorie :</label>
			<select>
				<option>-- Sélectionner une catégorie --</option>
				<option>Livre</option>
			</select>
		</div>
		<div id="titre">
			<label>Titre :</label>
			<input type="text" name="titre">
		</div>
		<div id="image">
			<label>Image :</label>
			<input type="file" name="image">
		</div>
		<div id="contenu">
			<label>Contenu :</label>
			<textarea name="contenu"></textarea>
		</div>
		<input type="submit" name="submit_page">
	</form>
</div>

<!-- Administration des salons -->
<div class="collapse" id="collapseSalon">
	
</div>