<div class="name">
    <form method="post">
        <input type="text" id="name" name="name" value="<?= $product->name ?>">
        <input type="hidden" name="product_id" value="<?= $product->id ?>">
        <button type="submit">Save</button>
    </form>
</div>