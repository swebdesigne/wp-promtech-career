<nav class="main-menu">
	<ul class="nav">
        <?php foreach($args as $arg) : ?>
        <li class="nav-item">
            <a class="main-menu-item <?= $arg->class; ?>" href="<?= $arg->link; ?>"><?= $arg->post_title; ?></a>
        </li>
        <?php endforeach; ?>
	</ul>
</nav>