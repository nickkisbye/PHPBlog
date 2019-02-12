<div class="card bg-light col-12 float-left mt-5">
    <div class="card-body" style="height: auto;">
        <h4 class="card-title">Hej og velkommen til min blog.</h4>
        <p class="card-text">Mit navn er Nick Kisbye Hansen og til daglig går jeg på KEA hvor jeg læser til Datamatiker <i class="em em-smile" style="width: 20px; height: 20px;"></i>.
        <br><br>Jeg elsker at kode og har derfor lavet denne blog, hvor jeg skriver om alt jeg lærer undervejs - og forhåbentligt også kan give noget viden videre hvis nu der er nogen af jer derude
        der er interesserede. Udover det, så vil dette også være samlingspunktet for alle mine fritidsprojekter - og der vil også blive lagt source kode ud til de forskellige projekter, så folk
            der finder det interessant kan kigge med.<i class="em em-ok_hand" style="width: 20px; height: 20px;"></i><i class="em em-wink" style="width: 20px; height: 20px;"></i>
            <br><br>
            Denne blog er mit første rigtige projekt, og jeg har kodet den helt fra bunden selv med PHP frameworket CodeIgniter, samt et framework der hedder Bootstrap, som jeg har brugt til
            design delen.
            <br><br>
        Hvis du har spørgsmål, er du altid velkommen til at kontakte mig på: nick@kisbyes.dk</p>
    </div>
</div>
<?php
$i = 1;
$numberPosts = count($posts);
$width = ($numberPosts==1)?12:(($numberPosts==2)?6:4);

foreach ($posts as $post) { ?>

    <div class="card text-white bg-primary col-md-<?php echo $width ?> col-md-offset-2 float-left mt-3">
        <div class="card-header"><?php echo $post['created_at']; ?> <i class="em em-memo" style="float:right;"></i>
        </div>
        <div class="card-body">
            <h5 class="card-title"><?php echo $post['title']; ?></h5>
            <p class="card-text"><?php

                if (strlen($post['body']) <= 50) {
                    echo $post['body'];
                } else {
                    $y = substr($post['body'], 0, 50) . '...';
                    echo $y;
                }

                ?></p>
            <a class="btn btn-outline-success btn-lg" href="<?php echo site_url('/posts/' . $post['slug']); ?>" role="button">Læs
                mere</a>
        </div>
    </div>
<?php if ($i++ ==3) break; ?>
<?php } ?>







