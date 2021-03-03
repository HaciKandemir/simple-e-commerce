<div class="row">
    <?php foreach ($products as $product){?>
    <div class="col-sm-3 product-item">
        <div class="card product-item-block">
            <img class="card-img-top" src="<?=$product->getImageUrl()?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">
                    <span class="prdct-name"><?=$product->getName()?></span>
                </h5>
                <p class="card-text">
                    <span class="prdct-price">
                        ₺<?=number_format($product->getPrice(), 2, ',', '.')?>
                    </span>
                </p>
                <a id="<?=$product->getId()?>" class="btn add-to-basket">Sepete Ekle</a>
            </div>
        </div>
    </div>
    <?php } ?>
</div>