<section class="section">

    <?php if($notifications) foreach ($notifications as $notification) : ?>

        <div class="notification is-primary">
            <?= $notification->content ?>
        </div>

    <?php endforeach; ?>



    <h2 class="title">ZOZNAM AKTUÁLNYCH ÚLOH</h2>
    <ul>
        <?php foreach ($tasks as $task) : ?>
            <div class="box">
                <article class="media">
                    <div class="media-left">
                        <figure class="image is-64x64">
                            <img src="./public/img/task.png" alt="Image">
                        </figure>
                    </div>
                    <div class="media-content">
                        <div class="content">
                            <p>
                                <strong><?= $task->name ?></strong>
                                <small>
                                    <?= priority($task->priority) ?> priorita</small>
                                <small>
                                    <time><?= $task->end ?></time>
                                </small>
                                <br>
                                <span class="title"><?= $task->content ?></span>
                            </p>
                        </div>
                        <nav class="level">
                            <div class="level-left">
                                <a class="level-item">
                                    <span class="is-small"><a href="/done-task?id=<?= $task->id ?>">UKONČIŤ</a><i class="fa fa-retweet"></i></span>
                                </a>
                                <a class="level-item">
                                    <span class="is-small"><a href="/edit-task?id=<?= $task->id ?>">EDITOVAŤ</a><i class="fa fa-heart"></i></span>
                                </a>
                                <a class="level-item">
                                    <span class="is-small"><a href="/delete?id=<?= $task->id ?>">VYMAZAŤ</a><i class="fa fa-reply"></i></span>
                                </a>
                            </div>
                        </nav>
                    </div>
                </article>
            </div>
        <?php endforeach; ?>
    </ul>
</section>
