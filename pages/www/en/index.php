<h1>Welcome</h1>

<h2>Our registered Resort</h2>
<ul class="resort_overview">
    <?php foreach (RESORTS as $resort_area => $resort_area_resorts) { ?>
        <li>
            <h3><?= ucfirst($resort_area_resorts) ?></h3>
            <ul>
                <?php foreach ($resort_area_resorts as $resort_name => $resort_data) { ?>
                    <li>
                        <?= $resort_name ?>
                    </li>
                <?php } ?>
            </ul>
        </li>
    <?php } ?>
</ul>