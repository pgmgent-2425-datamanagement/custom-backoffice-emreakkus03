

<div class="inventory-page max-w-7x</form>l mx-auto p-6">
    
    <div class="intro mb-6">
        <h1 class="text-3xl font-semibold text-gray-800 mb-2">Productinventaris</h1>
        <p class="text-gray-600">Beheer hier je producten. Je kunt nieuwe producten toevoegen, bestaande producten bewerken, of verwijderen. Zorg ervoor dat je altijd de juiste voorraadniveaus hebt om efficiënt te blijven werken.</p>
    </div>


    <div class="mb-4">
        <a href="/inventory/add" class="bg-green-500 text-white font-semibold px-4 py-2 rounded shadow hover:bg-green-600">Voeg product toe</a>
    </div>
    <div class="mb-4">
        <a href="/category" class="bg-blue-500 text-white font-semibold px-4 py-2 rounded shadow hover:bg-blue-600">Categorieën</a>
    </div>
    
    <table class="min-w-full table-auto bg-white shadow-md rounded-lg">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left text-gray-600">Naam</th>
                <th class="px-4 py-2 text-left text-gray-600">Beschrijving</th>
                <th class="px-4 py-2 text-left text-gray-600">Prijs</th>
                <th class="px-4 py-2 text-left text-gray-600">Aantal</th>
                <th class="px-4 py-2 text-left text-gray-600">Acties</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) {
                include 'inventory/item.php';
            } ?>
        </tbody>
    </table>
</div>
