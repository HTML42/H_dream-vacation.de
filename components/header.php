<header>
    <div class="center_wrap">
        <a class="logo" href="index.html">
            <span class="area"><?= ucfirst(AREA) ?></span>
            <span class="logo_main">Dream-Vacation</span>
        </a>
        <?= File::i('components/navigation.php')->get_content() ?>
    </div>
</header>