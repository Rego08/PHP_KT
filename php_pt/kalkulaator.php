<?php include 'header.php'; ?>

<section class="py-5">
    <div class="container">
        <h1 class="h2 mb-4">Kalkulaator</h1>
        <?php
        $message = '';
        $selectedPackage = '';
        $hours = 1;
        $format = 'digitaal';
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
            fclose($handle);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $selectedPackage = (string) ($_POST['package'] ?? '');
            $hours = max(1, (int) ($_POST['hours'] ?? 1));
            $format = (string) ($_POST['format'] ?? 'digitaal');

            foreach ($packages as $package) {
                if ($package[0] === $selectedPackage) {
                    $total = (float) $package[1] * $hours;
                    if ($format === 'trukitud') {
                        $total += 15;
                    }
                    file_put_contents('orders.txt', date('Y-m-d H:i') . ';' . $selectedPackage . ';' . $hours . ';' . $format . ';' . number_format($total, 2, '.', '') . PHP_EOL, FILE_APPEND);
                    $message = 'Hinnanguline summa: ' . number_format($total, 2, ',', ' ') . ' €';
                    break;
                }
            }
        }
        ?>
        <?php if ($message !== ''): ?>
            <div class="alert alert-info"><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></div>
        <?php endif; ?>
        <form method="post" class="card p-4">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label" for="package">Pakett</label>
                    <select class="form-select" id="package" name="package">
                        <?php foreach ($packages as $package): ?>
                            <option value="<?php echo htmlspecialchars($package[0], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($package[0], ENT_QUOTES, 'UTF-8'); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="hours">Tunnid</label>
                    <input type="number" class="form-control" id="hours" name="hours" min="1" value="1">
                </div>
                <div class="col-md-3">
                    <label class="form-label d-block">Pildid</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="format" value="digitaal" id="digitaal" checked>
                        <label class="form-check-label" for="digitaal">Digitaal</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="format" value="trukitud" id="trukitud">
                        <label class="form-check-label" for="trukitud">Trükitud</label>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-dark" type="submit">Arvuta</button>
                </div>
            </div>
        </form>
    </div>
</section>

<?php include 'footer.php'; ?>