<div class="flex justify-between items-center mb-4">
    <h2 class="text-xl font-semibold">Categorieën</h2>
    <a href="/category/add" class="bg-green-500 text-white font-semibold px-4 py-2 rounded shadow hover:bg-green-600">Voeg categorie toe</a>
</div>

<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Categorie naam
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <?php foreach ($categories as $category) {
                include 'category/item.php';
            } ?>
        </tbody>
    </table>
</div>