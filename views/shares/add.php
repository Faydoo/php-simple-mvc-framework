<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Share Something!</h3>
    </div>
    <div class="panel-body">
        <form method="post" action="#">
            <div class="form-group">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" />
            </div>
            <div class="form-group">
                <label class="form-label">Body</label>
                <textarea name="body" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Link</label>
                <input type="text" name="link" class="form-control" />
            </div>
            <div class="form-group mt-3">
                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                <a class="btn btn-danger" href="<?php echo ROOT_PATH;  ?>shares">Cancel</a>
            </div>
        </form>
    </div>
</div>