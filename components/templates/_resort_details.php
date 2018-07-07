<div class="resort_details">
    <h1><?= $resort['name'] ?></h1>
    <div class="resort_details_stats">
        Contintent: <?= $resort['continent'] ?><br/>
        Country: <?= $resort['country'] ?>
    </div>
    <div class="resort_details_description">
        <?= $resort['description'][LANG] ?>
    </div>
    <div class="resort_details_link">
        <a href="<?= $resort['url'] ?>" target="_blank">To the Resort</a>
    </div>
</div>