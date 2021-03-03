<div class="row" style="justify-content: space-evenly">
	<div class="col-7">
		<div class="card">
            <?php if (isset($_SESSION['basket'])){ foreach ($_SESSION['basket'] as $product){ ?>
			<div class="card-body basket-item">
				<div class="basket-item-list-img">
					<img src="<?=$product['img_url']?>">
				</div>
				<div href="#" class="basket-item-list-name">
					<p><?=$product['name']?></p>
				</div>
				<div class="basket-item-list-action">
					<div class="basket-counter">
						<button class="button-counter down" id="<?=$product['id']?>">-</button>
						<input class="input-counter" min="1" value="<?=$product['count']?>" type="number" readonly>
						<button class="button-counter up" id="<?=$product['id']?>">+</button>
					</div>
					<div class="basket-item-list-price">
                        <p>
                            <span class="price">
                                ₺<?=number_format($product['price']*$product['count'], 2, ',', '.') ?>
                            </span>
                        </p>
                    </div>
					<a class="delete-to-basket" id="<?=$product['id']?>" href="#">
						<span class="icon-delete"></span>
					</a>
				</div>
			</div>
			<?php }} ?>
		</div>
	</div>	

	<div class="col-3">
		<div class="basket-sum">
			<h2>Sipariş Özeti</h2>
			<div class="basket-sum-detail">
				<span>Ürün Toplamı</span>
				<span class="basket-sum-price">284,99 TL</span>
			</div>
			<hr>
			<p class="basket-total-price">284,99 TL</p>
		</div>
	</div>

</div>
