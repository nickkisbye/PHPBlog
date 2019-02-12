<br>
    <div class="jumbotron">
        <h3 class="display-5"><?php echo $post['title']; ?></h3>
        <p class="lead">Tilføjet: <?php echo $post['created_at']; ?> | Skrevet af: <?php echo $post['author']; ?> <i class="em em-flag-dk" style="margin-top: -3px;"></i></p>
        <span class="badge badge-primary"><?php
            foreach ($data['categories'] = $this->post_model->get_categories() as $category) {
                if($post['category_id'] == $category['id']) {
                    echo $category['name'];
                }
            } ?></span>
        <hr class="my-4">
        <p><?php echo $post['body']; ?></p>
    </div>

<?php echo form_open('/posts/delete/'.$post['id']); ?>
<a class="btn btn-primary pull-left" style="margin-right: 2%;" href="/posts" role="button">Tilbage</a><?php if($this->session->userdata('logged_in')) : ?><input type="submit" value="Slet indlæg" class="btn btn-danger" style="margin-right: 2%;">
<a href="/posts/edit/<?php echo $post['slug']; ?>" class="btn btn-primary">Ret indlæg</a>
</form>
<?php endif; ?>
<hr>
<h3>Kommentarer (<?php echo count($comments) ?>)</h3>
<?php if($comments) : ?>

<?php foreach ($comments as $comment) : ?>
        <div class="card card-body bg-light">
        <h5><?php echo $comment['body'] ?> [af <strong><?php echo $comment['name'];?></strong>]</h5>
        </div>
        <br>
<?php endforeach; ?>

<?php else : ?>
<p>Der er ingen kommentarer på dette indlæg! <i class="em em-blush"></i></p>
<?php endif; ?>
<hr>
<h3>Tilføj kommentar</h3>
<?php echo validation_errors(); ?>
<?php echo form_open('comments/create/'.$post['id']); ?>
<div class="form-group">
    <label>Name</label>
    <input type="text" name="name" class="form-control">
</div>
<div class="form-group">
    <label>Email</label>
    <input type="text" name="email" class="form-control">
</div>
<div class="form-group">
    <label>Tekst</label>
    <textarea type="text" name="body" class="form-control"></textarea>
</div>
<input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
<button type="submit" class="btn btn-primary">Indsend kommentar</button>
</form>