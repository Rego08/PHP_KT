<?php include 'header.php'; ?>

<section class="py-5 bg-light">
    <div class="container">
        <h1 class="h2 mb-4">Kontakt</h1>
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="ratio ratio-4x3">
                    <iframe src="https://www.google.com/maps?q=Haapsalu%20Kutsehariduskeskus&output=embed" loading="lazy" title="Google Maps"></iframe>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card p-4 h-100">
                    <p class="mb-2">Haapsalu Kutsehariduskeskus</p>
                    <p class="mb-3">Fotostuudio</p>
                    <p class="mb-0"><a href="mailto:regomark866@gmail.com">regomark866@gmail.com</a></p>
                    <hr>
                    <form>
                        <div class="mb-3">
                            <label class="form-label" for="name">Nimi</label>
                            <input class="form-control" id="name" type="text">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="email">E-post</label>
                            <input class="form-control" id="email" type="email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="message">Sõnum</label>
                            <textarea class="form-control" id="message" rows="4"></textarea>
                        </div>
                        <button class="btn btn-dark" type="button">Saada</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>