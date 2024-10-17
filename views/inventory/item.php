<div class="item p-4 bg-white shadow-md rounded-lg">
    <div class="name text-xl font-bold mb-2">
        <?= $product->name ?>
    </div>
    <div class="description text-gray-700 mb-4">
        <?= $product->description ?>
    </div>
    <div class="buttons flex space-x-4">
        <a href="/inventory/edit/<?= $product->id ?>" class="edit bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit</a>
        <a href="/inventory/delete/<?= $product->id ?>" class="delete bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete</a>
    </div>
</div>