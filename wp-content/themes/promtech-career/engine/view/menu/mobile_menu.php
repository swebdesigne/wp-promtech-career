<nav class="small-menu">
    <div class="nav">
        <div class="menu-close"><span class="icon-close"></span></div>
        <div class="menu-items">
            <ul>
            <?php foreach($args as $arg) : ?>
                <li class=" <?= $arg->class_submenu; ?>">
                    <a class="main-menu-item  <?= $arg->class; ?>" href="<?= $arg->link; ?>"><?= $arg->post_title; ?></a>
                    <?php if(!empty($arg->children)) : ?>
                    <div class="small-dropdown-menu">
                        <?php foreach($arg->children as $subMenu) : ?>
                        <a href="<?= $subMenu->link; ?>" class="dropdown-item submenu-item <?= $subMenu->class; ?>"><?= $subMenu->post_title; ?></a>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</nav>