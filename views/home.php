<?php
/**
 * @var Post $post
 */
$post = $data->post ?? null;

use Intetics\MvcTask\Model\Post;

include('layouts/header.php');
?>
    <div class="container">
        <form action="/" method="post">
            <div class="form-group">
                <label for="exampleTextarea">Enter your text here</label>
                <textarea class="form-control" id="exampleTextarea" rows="3" name="textarea"></textarea>
                <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?? '' ?>">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <?php if($post) :?>
            <div class="jumbotron mt-2">
                <h3>You  have just inserted</h3>
                <p class="lead"><?= $post->getText(); ?></p>
                <hr class="my-4">
            </div>
        <?php endif;?>
    </div>
<?php
    include('layouts/footer.php');
?>