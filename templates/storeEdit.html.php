
<h2>Edit or Add Venue</h2>

			<form action="/store/add" method="POST">

				<input type="hidden" name="store[id]" value="<?= $store->id ?? '' ?>" />
				<label>Name</label>
				<input type="text" name="quantity" value="<?= $store->permission ?? '' ?>" />
                <input type="submit" name="submit" value="SubmitRe" />
            </form>

