<footer>
    <nav id="footer_navigation">
        <?=
        Html::ul(array(
            Html::link('impressum.html', 'Imprint'),
            '<a style="cursor:pointer" onclick="window.gx.startup(true)">Datenschutzeinstellungen</a>',
        ))
        ?>
    </nav>
    <div class="copy">
        <sup>&copy;</sup> 2018 - XtremeWebframework2
    </div>
</footer>