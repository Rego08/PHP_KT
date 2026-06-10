<?php include 'header.php'; ?>

<section class="py-5 bg-light">
    <div class="container">
        <h1 class="h2 mb-4">Tooted / Teenused</h1>
        <div class="row g-4">
            <?php
            $packages = [];
            $handle = fopen('packages.csv', 'r');
            if ($handle !== false) {
                fgetcsv($handle, 1000, ';');
                while (($row = fgetcsv($handle, 1000, ';')) !== false) {
                    if (count($row) < 3) {
                        continue;
                    }
                    $packages[] = $row;
                }
            }
            $productImages = glob('pildid/*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);
            $hasImages = is_array($productImages) && count($productImages) > 0;
            $i = 0;
            foreach ($packages as $package):
                $img = $hasImages ? $productImages[$i % count($productImages)] : 'pildid/teenus.svg';
            ?>
                <div class="col-12 col-md-4">
                    <div class="card h-100">
                        <img src="<?php echo htmlspecialchars($img); ?>" class="card-img-top service-image" alt="<?php echo htmlspecialchars($package[0]); ?>" width="640" height="426">
                        <div class="card-body d-flex flex-column">
                            <h2 class="h5 card-title"><?php echo htmlspecialchars($package[0]); ?></h2>
                            <p class="mb-2"><?php echo htmlspecialchars($package[1]); ?> €</p>
                            <p class="text-muted"><?php echo htmlspecialchars($package[2]); ?></p>
                            <a href="" class="btn btn-dark mt-auto">Lisa ostukorvi</a>
                        </div>
                    </div>
                </div>
            <?php
                $i++;
            endforeach;
            ?>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>