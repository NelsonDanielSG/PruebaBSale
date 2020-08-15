<div class="row justify-content-center">
    <h1 class="title">Listado de Productos</h1>
</div>
<hr>
<div class="row justify-content-center">
    <div class="col-12 col-lg-5">
        <label for="">Buscador</label>
        <input type="text" class="form-control search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Ej: Pisco">
    </div>
    <div class="col-12 col-lg-3">
        <label for="">Marca</label>
        <select class="custom-select" name="" id="brands">
            <option value="">Todas las marcas</option>
            <?php foreach ($brands as $brand) : ?>
                <option value="<?= $brand->brand; ?>"><?= ucwords($brand->brand); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="col-12 col-lg-3">
        <label for="">Categoría</label>
        <select class="custom-select" name="" id="category">
            <option value="">Todas las categorías</option>
            <?php foreach ($categories as $category) : ?>
                <option value="<?= $category->category; ?>"><?= ucwords($category->category); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>
<div class="row justify-content-start" id="containerProducts">
    <?php foreach ($products as $product) : ?>
        <div class="col-12 col-lg-2">
            <div class="card" style="width: 18rem; margin-top: 10%">
                <img src="<?= $product->url_image ?>" class="card-img-top">
                <div class="card-body">
                    <h6><?= ucwords($product->brand) ?></h6>
                    <h5 class="card-title"><?= $product->name ?></h5>
                    <h6><?= ucwords($product->category) ?></h6>
                </div>
                <ul class="list-group list-group-flush">
                    <?php if (!empty($product->lastPrice)) : ?>
                        <li class="list-group-item last-price">Antes: $ <?= $product->lastPrice ?></li>
                        <li class="list-group-item price">Ahora: $ <?= $product->price ?></li>
                    <?php else : ?>
                        <li class="list-group-item price">$ <?= $product->price ?></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    /**
     * Buscador
     */
    $('.search').keyup(function(e) {
        e.preventDefault();
        var filter = $(this).val(),
            count = 0;
        $('#containerProducts > div').each(function() {
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                $(this).hide();
            } else {
                $(this).show();
                count++;
            }
        });
    })

    /**
     * Filtro por marcas
     */
    $('#brands').on('change', function(e) {
        e.preventDefault();
        var filter = $(this).val(),
            count = 0;
        $('#containerProducts > div').each(function() {
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                $(this).hide();
            } else {
                $(this).show();
                count++;
            }
        });
    })

    /**
     * Filtro por categorías
     */
    $('#category').on('change', function(e) {
        e.preventDefault();
        var filter = $(this).val(),
            count = 0;
        $('#containerProducts > div').each(function() {
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                $(this).hide();
            } else {
                $(this).show();
                count++;
            }
        });
    })
</script>