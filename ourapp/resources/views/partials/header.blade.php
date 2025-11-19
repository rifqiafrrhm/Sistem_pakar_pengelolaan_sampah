<nav class="navbar" id="home">
    <div class="nav-container">
        <div class="logo">
            <span>♻️</span>
            <span><?php echo $app_name; ?></span>
        </div>
        <ul class="nav-menu">
            <?php foreach ($menu_items as $item): ?>
                <li><a href="<?php echo $item['link']; ?>"><?php echo $item['name']; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</nav>
