<h2 class="text-center my-5">Bienvenue sur Blabla ciné</h3>
<div class="row gx-5">
    <?= $cards ?>
</div>
<div class="d-flex justify-content-center">
    <nav aria-label="Pagination">
      <ul class="pagination pagination-lg">
        <?php if($currentPage != 1) :?>
            <li class="page-item">
                <a class="page-link" href="/blabla-cine/?page=<?= $currentPage - 1 ?>">Précédent</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="/blabla-cine/?page=<?= $currentPage - 1 ?>"><?= $currentPage - 1 ?></a>
            </li>
        <?php endif; ?>
            <li class="page-item">
                <a class="page-link bg-primary text-light" href="/blabla-cine/?page=<?= $currentPage ?>"><?= $currentPage ?></a>
            </li>

        <?php if($currentPage < min($maxPage, 500)) :?>
            <li class="page-item">
                <a class="page-link" href="/blabla-cine/?page=<?= $currentPage + 1 ?>"><?= $currentPage + 1 ?></a>
            </li>
            <?php if(!is_null($maxPage)) :?>
                <li class="page-item">
                    <a class="page-link bg-secondary text-light" href="/blabla-cine/?page=<?= $maxPage <= 500 ? $maxPage : 500 ?>"><?=  $maxPage <= 500 ? $maxPage : 500 ?></a>
                </li>
            <?php endif; ?>
            <li class="page-item">
                <a class="page-link" href="/blabla-cine/?page=<?= $currentPage + 1 ?>">Suivant</a>
            </li>
        <?php endif; ?>
      </ul>
    </nav>
</div>