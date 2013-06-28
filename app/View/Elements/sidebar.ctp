    <?php
        $uri = explode('/', substr($this->here, 1));
        $menu = array(
            array(
                'name' => 'Clients',
                'icon' => 'icon-user',
                'link' => '/clients',
            ),
            array(
                'name' => 'Projects',
                'icon' => 'icon-tasks',
                'link' => '/projects',
            ),
            array(
                'name' => 'Reports',
                'icon' => 'icon-signal',
                'link' => '/reports',
            ),
        );
    ?>

    <!-- sidebar -->
    <div id="sidebar-nav">
        <ul id="dashboard-menu">
            <?php foreach( $menu as $item ): 
                $active = ($uri[0] == '' && $item['link'] == '/dashboard') || (!is_array($item['link']) && $uri[0] == substr($item['link'], 1) || (is_array($item['link']) && $uri[0] == strtolower($item['name'])) ) ? TRUE : FALSE;
            ?>
                <li <?= ($active ? "class='active'" : ''); ?> >
                    <?php if( $active ): ?>
    
                        <div class="pointer">
                            <div class="arrow"></div>
                            <div class="arrow_border"></div>
                        </div>
    
                    <?php endif; ?>
                    <a <?= is_array($item['link']) ? 'class="dropdown-toggle" href="#"' : 'href="'.$item['link'].'"'; ?> >
                        <i class="<?= $item['icon']; ?>"></i> 
                        <span><?= $item['name']; ?></span>
                        <?php if( is_array($item['link']) ): ?>
                        <i class="icon-chevron-down"></i>
                        <?php endif; ?>
                    </a>
    
                    <?php if( is_array($item['link']) ): ?>
    
                        <ul class="submenu <?= $active ? 'active' : ''; ?>">
                            <?php foreach( $item['link'] as $href => $display ): ?>
                            <li><a href="<?= $href; ?>" <?= $href == $this->here ? 'class="active"' : ''; ?> ><?= $display; ?></a>
                            <?php endforeach; ?>
                        </ul>
    
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <!-- end sidebar -->