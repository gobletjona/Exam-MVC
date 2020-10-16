


<label for="category_id">Catégories</label>
<select id="category" name="category_id" class="form-control">
    <option disabled selected>Select your category</option>

    <?php foreach ($categories as $category): ?>
    <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
    <?php endforeach; ?>
  </select>
