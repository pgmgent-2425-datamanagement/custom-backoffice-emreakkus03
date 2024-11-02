<tr class="border-b">
    <td class="px-4 py-2"><?= $category->name ?></td>
    <td class="px-4 py-2 flex space-x-2">
        <a href="/category/edit/<?= $category->id ?>" class="edit bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit</a>
        <a href="/category/delete/<?= $category->id ?>" class="delete bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete</a>
    </td>
</tr>