        <footer>
            <nav>
                <?php
                    $args = array(
                        'theme_location' => 'secondary'
                    );
                    wp_nav_menu($args);
                ?>
            </nav>
        </footer>

        <?php wp_footer();?>
    </body>
</html>