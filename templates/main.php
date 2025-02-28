<main class="bg-dark text-white p-4">
    <div class="container">
        <div class="row align-items-center justify-content-center justify-content-md-start">
            <div class="col-md-auto text-center px-md-3">
                <img src="<?= $poster_url; ?>" class="img-fluid rounded" style="max-width: 200px;" alt="Poster de <?= $title ?>">
            </div>
            <div class="col-md">
                <h3 class="text-md-start"><?= $title ?> - <?= $until_message; ?></h3>
                <p class="text-md-start">Fecha de estreno: <?= $release_date; ?></p>
                <p class="text-md-start">La siguiente es: <?= $following_production; ?></p>
            </div>
        </div>

        <?php if ($next_poster) : ?>
            <div class="row align-items-center mt-4 justify-content-center justify-content-md-start">
                <div class="col-md-auto text-center px-md-3">
                    <img src="<?= $next_poster; ?>" class="img-fluid rounded" style="max-width: 200px;" alt="Poster de <?= $following_production ?>">
                </div>
                <div class="col-md">
                    <h3 class="text-md-start"><?= $following_production ?></h3>
                    <p class="text-md-start">Fecha de estreno: <?= $next_release; ?></p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>