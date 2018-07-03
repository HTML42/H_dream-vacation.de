<h1>Welcome</h1>

<h2>Our registered Resort</h2>
<ul class="resort_overview">
    <?php foreach (RESORTS as $resort_area => $resort_area_resorts) { ?>
        <li>
            <h3><?= ucfirst($resort_area) ?></h3>
            <ul>
                <?php foreach ($resort_area_resorts as $resort_name => $resort_data) { ?>
                    <li>
                        <h4><?= $resort_name ?></h4>
                        <div>
                            <a href="<?= _href($resort_name, 'nature') ?>">Details</a>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </li>
    <?php } ?>
</ul>