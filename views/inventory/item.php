<tr class="border-b">
    <td class="px-4 py-2 w-16 h-16 object-cover " style="width: 20rem; height: 20rem;">
        <img src="/images/<?= $product->image; ?>" class=" " />
    </td>

    <td class="px-4 py-2"><?= $product->name ?></td>
    <td class="px-4 py-2"><?= $product->description ?></td>
    <td class="px-4 py-2 text-green-500">€<?= $product->price ?></td>
    <td class="px-4 py-2"><?= $product->quantity ?></td>
    <td class="px-4 py-2"><?= $product->category_name ?></td>
    <td class="px-4 py-2 flex space-x-2">
        <a href="/inventory/edit/<?= $product->id ?>" class="edit bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit</a>
        <a href="/inventory/delete/<?= $product->id ?>" class="delete bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete</a>
    </td>
</tr>