<?php include 'header.php'; ?>

<section class="hero text-white py-5">
    <div class="container py-4">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <h1 class="display-5 fw-bold">Fotostuudio</h1>
                <p class="lead mb-0">Haapsalu Kutsehariduskeskuse Fotostuudio.</p>
            </div>

        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                $bannerImages = glob('reklaam/*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);
                if (empty($bannerImages)) {
                    echo '<div class="carousel-item active"><div class="ratio ratio-21x9 bg-secondary text-white d-flex align-items-center justify-content-center">Reklaampilte ei leitud.</div></div>';
                } else {
                    shuffle($bannerImages);
                    foreach ($bannerImages as $index => $image) {
                        echo '<div class="carousel-item' . ($index === 0 ? ' active' : '') . '">';
                        echo '<img src="' . htmlspecialchars($image) . '" class="d-block w-100" alt="Reklaam ' . ($index + 1) . '" width="700" height="700">';
                        echo '</div>';
                    }
                }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Eelmine</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Järgmine</span>
            </button>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>