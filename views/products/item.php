<div class="item">
    <div class="name">
        <?= $product->name ?>
    </div>
    <div class="planet">
        <?= $product->description ?>
    </div>
    <div class="buttons">
        <a href="/products/edit/<?= $product->id ?>" class="edit">Edit</a>
        <a href="/products/delete/<?= $product->id ?>" class="delete">Delete</a>
    </div>
</div>