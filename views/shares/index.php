<div>
    <?php if(isset($_SESSION['is_logged_in'])) : ?>
    <a class="btn btn-success btn-share" href="<?php echo ROOT_URL; ?>shares/add">Share Something</a>
    <?php endif; ?>
    <?php foreach ($viewmodel as $item): ?>
        <div class="card mt-5">
            <div class="card-body bg-light">
                <h3><?php echo $item['title']; ?></h3>
                <small><?php echo $item['create_date']; ?></small>
                <hr />
                <p><?php echo $item['body']; ?></p>
                <br />
            </div>
            <div class="card-footer d-flex justify-content-end">
                <a class="btn btn-light" href="<?php echo $item['link']; ?>" target="_blank">Go To Website</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>