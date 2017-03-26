<section class="section">
    <h2 class="title">PRIDAŤ ÚLOHU</h2>
    <form action="/add-task" method="post">
        <label class="label">Názov úlohy</label>
        <p class="control">
            <input class="input" name="name" type="text" placeholder="Názov">
        </p>
        <label class="label">Opis úlohy</label>
        <p class="control">
            <textarea class="textarea" name="content" placeholder="Opis"></textarea>
        </p>
        <label class="label">Dátum skončenia</label>
        <p class="control">
            <input class="input" name="end-date" type="date">
        </p>
        <p class="control">
            <label class="label">Priorita</label>
            <span class="select">
        <select name="priority">
          <option value="1">Nízka</option>
          <option value="2">Stredná</option>
          <option value="3">Vysoká</option>
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