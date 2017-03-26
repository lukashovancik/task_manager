<section class="section">
    <h2 class="title">HISTÓRIA ÚLOH</h2>
    <ul>
        <?php foreach ($tasks as $task) : ?>
            <div class="box">
                <article class="media">
                    <div class="media-left">
                        <figure class="image is-64x64">
                            <img src="./public/img/task-done.png" alt="Image">
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
                                <?= $task->content ?>
                            </p>
                        </div>
                    </div>
                </article>
            </div>
        <?php endforeach; ?>
    </ul>
</section>
