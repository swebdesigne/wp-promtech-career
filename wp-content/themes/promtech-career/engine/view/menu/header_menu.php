<nav class="main-menu">
	<ul class="nav">
        <?php foreach($args as $arg) : ?>
		<li class="nav-item <?= $arg->class_submenu; ?>">
			<a class="main-menu-item nav-link <?= $arg->class; ?> <?= $arg->class_dropdown_toggle; ?>" 
                <?php if(!empty($arg->children)) : ?>data-toggle="dropdown"<?php endif; ?>
                href="<?= $arg->link; ?>" role="button" aria-expanded="false"><?= $arg->post_title; ?>
            </a>
            <?php if(!empty($arg->children)) : ?>
                <div class="dropdown-menu">
                    <?php foreach($arg->children as $subMenu) : ?>
                    <a href="<?= $subMenu->link; ?>" class="dropdown-item submenu-item <?= $subMenu->class; ?>"><?= $subMenu->post_title; ?></a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
		</li>
        <?php endforeach; ?>
	</ul>
</nav>