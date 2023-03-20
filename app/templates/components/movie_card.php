<div class="col-md-4 mb-2 p-2 d-flex align-items-stretch">
    <div class="card">
        <img class="card-img-top" src="https://image.tmdb.org/t/p/w500<?= $poster_path ?>" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title"><?= $original_title ?></h5>
          <p class="card-text"><?= $overview ?></p>
        </div>
        <div class="card-footer">
            <a href="/blabla-cine/detail/?id=<?= $id ?>" class="w-100 btn btn-primary">En savoir plus</a>
        </div>
    </div>
</div>