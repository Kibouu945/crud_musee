<div class="bg-dark border-right text-light" id="sidebar-wrapper">
	<div class="sidebar-heading">CRUD Musee</div>
	<div class="list-group list-group-flush">
		<a href="pays.php"
		   class="list-group-item text-<?php if (isset($active) and $active == 'Pays') echo 'dark'; else echo 'light' ?> list-group-item-action bg-<?php if (isset($active) and
			   $active == 'Pays') echo 'warning'; else echo 'dark' ?>">Pays</a>
		<a href="musee.php"
		   class="list-group-item text-<?php if (isset($active) and $active == 'Musee') echo 'dark'; else echo 'light' ?> text-light list-group-item-action bg-<?php if (isset($active) and
			   $active == 'Musee') echo 'warning'; else echo 'dark' ?>">Musee</a>
		<a href="visiter.php"
		   class="list-group-item text-<?php if (isset($active) and $active == 'Visiter') echo 'dark'; else echo 'light' ?> list-group-item-action bg-<?php if (isset($active) and
			   $active == 'Visiter') echo 'warning'; else echo 'dark' ?>">Visiter</a>
		<a href="ouvrage.php"
		   class="list-group-item text-<?php if (isset($active) and $active == 'Ouvrage') echo 'dark'; else echo 'light' ?> list-group-item-action bg-<?php if (isset($active) and
			   $active == 'Ouvrage') echo 'warning'; else echo 'dark' ?>">Ouvrage</a>
		<a href="bibliotheque.php"
		   class="list-group-item text-<?php if (isset($active) and $active == 'Bibliothèque') echo 'dark'; else echo 'light' ?> list-group-item-action bg-<?php if (isset($active) and
			   $active == 'Bibliothèque') echo 'warning'; else echo 'dark' ?>">Bibliothèque</a>
		<a href="site.php"
		   class="list-group-item text-<?php if (isset($active) and $active == 'Site') echo 'dark'; else echo 'light' ?> list-group-item-action bg-<?php if (isset($active) and
			   $active == 'Site') echo 'warning'; else echo 'dark' ?>">Site</a>
		<a href="referencer.php"
		   class="list-group-item text-<?php if (isset($active) and $active == 'Referencer') echo 'dark'; else echo 'light' ?> list-group-item-action bg-<?php if (isset($active) and
			   $active == 'Referencer') echo 'warning'; else echo 'dark' ?>">Referencer</a>
	</div>
</div>
