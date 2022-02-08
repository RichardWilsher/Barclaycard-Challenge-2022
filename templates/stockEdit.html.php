
<h2>Edit or Add Stock</h2>

<form action="/store/add" method="POST">

    <input type="hidden" name="store[id]" value="<?= $stock->id ?? '' ?>" />
    <label>Name</label>
    <input type="text" name="quantity" value="<?= $stock->permission ?? '' ?>" />
    <input type="submit" name="submit" value="SubmitRe" />
</form>

