
<br>
<?php

foreach ($posts as $post) : ?>

    <div class="jumbotron float-left col-md-12">
        <h3 class="display-5"><?php echo $post['title']; ?></h3>
        <p class="lead">Tilføjet: <?php echo $post['created_at']; ?> | Skrevet af: <?php echo $post['author']; ?> <i class="em em-flag-dk" style="margin-top: -3px;"></i></p>
        <span class="badge badge-primary"><?php
            foreach ($data['categories'] = $this->post_model->get_categories() as $category) {
                if($post['category_id'] == $category['id']) {
                    echo $category['name'];
                }
            } ?></span>
        <hr class="my-4">
        <p><?php if(strlen($post['body'])<=500)
            {
                echo $post['body'];
            }
            else
            {
                $y=substr($post['body'],0,500) . '...';
                echo $y;
            }
            ?></p>
        <br>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="<?php echo site_url('/posts/'.$post['slug']); ?>" role="button">Læs mere</a>
        </p>
    </div>



<?php endforeach; ?>