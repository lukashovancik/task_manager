<section class="section">
    <h2 class="title">EDITOVAŤ ÚLOHU - <?= $task->name ?></h2>
    <form action="/edit-task?id=<?= $task->id ?>" method="post">
        <label class="label">Názov úlohy</label>
        <p class="control">
            <input class="input" name="name" value="<?= $task->name ?>" type="text" placeholder="Názov">
        </p>
        <label class="label">Opis úlohy</label>
        <p class="control">
            <textarea class="textarea" name="content" placeholder="Opis"><?= $task->content ?></textarea>
        </p>
        <label class="label">Dátum skončenia</label>
        <p class="control">
            <input class="input" name="end-date" value="<?= $task->end ?>" type="date">
        </p>
        <p class="control">
            <label class="label">Priorita</label>
            <span class="select">
        <select name="priority">
          <option value="1" <?= $task->priority == 1 ? 'selected' : '' ?> >Nízka</option>
          <option value="2" <?= $task->priority == 2 ? 'selected' : '' ?>>Stredná</option>
          <option value="3" <?= $task->priority == 3 ? 'selected' : '' ?>>Vysoká</option>
        </select>
      </span>
        </p>
        <div class="control is-grouped">
            <p class="control">
                <button class="button is-primary">Uložiť</button>
            </p>
            <p class="control">
                <button class="button is-link">Zrušiť</button>
            </p>
        </div>
    </form>

</section>