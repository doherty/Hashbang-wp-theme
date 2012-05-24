    <form method="get" id="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div>
            <br />
            <label for="s">Search for:</label><br />
            <input type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" size="14" />
            <input type="hidden" id="searchsubmit" value="Search" />
        </div>
    </form>