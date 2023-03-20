<h2 class="text-center my-2">
    <?= $title ?>
</h2>
<h3 class="text-center my-2">
    <?= strtoupper($original_language) ?> : <?= $original_title ?>
</h3>
<hr>
<div class="row">
    <div class="col-md-6">
        <img class="w-75" src="https://image.tmdb.org/t/p/original<?= $poster_path ?>" alt="" srcset="">
    </div>
    <div class="col-md-6">
        <p class="text-justify">
            <?= $overview ?>
        </p>
        <ul>
            <li>
                <b>
                    Genre<?= count($genres) > 1 ? 's' : 's' ?>: 
                </b>
                <?= implode(", ", array_column($genres, 'name')) ?>
            </li>
            <li>
                <b>
                    Date de sortie: 
                </b>
                <?= date('d/m/Y', strtotime($release_date)) ?>
            </li>
            <li>
                <b>
                    Nombre de vote:
                </b>
                <?= $vote_count ?>
            </li>
            <li>
                <b>
                   Note:
                </b>
                <?= $vote_average ?> / 10
            </li>
        </ul>
    </div>
</div>