<!-- Breadcrumbs -->
<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="<?= base_url() ?>">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="#">Cart</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
			
	<!-- Shopping Cart -->
	<div class="shopping-cart section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Shopping Summery -->
                <?php echo form_open('belanja/update'); ?>
					<table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th>NAME</th>
								<th class="text-center">UNIT PRICE</th>
								<th class="text-center" >QTY</th>
								<th class="text-center"><i class="ti-trash remove-icon"></i></th>
							</tr>
						</thead>
                        <hr>
                        <?php $i = 1; ?>
                        <?php foreach ($this->cart->contents() as $items): ?>
						<tbody>
							<tr>
								<td class="product-des" data-title="Name">
									<p class="product-name"><a style="font-size: 25px;" href="#"><?php echo $items['name']; ?></a></p>
								</td>
								<td class="price" data-title="Price"><span>Rp. <?php echo $this->cart->format_number($items['price']); ?></span></td>
								<td class="qty" data-title="Qty" >
                                    <?php echo form_input(array('name' => $i.'[qty]',
                                     'value' => $items['qty'],
                                     'maxlength' => '3', 
                                     'size' => '5',
                                     'type' => 'number',
                                     'class' => 'form-control')); ?>
								</td>
								<td class="action" data-title="Remove"><a href="#"><i class="ti-trash remove-icon"></i></a></td>
							</tr>
                            <?php endforeach; ?>
							
						</tbody>
					</table>
					<!--/ End Shopping Summery -->
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<!-- Total Amount -->
					<div class="total-amount">
						<div class="row">
							<div class="col-lg-8 col-md-5 col-12">
								<div class="left">
                                <div class="coupon">
                                    <button type="submit" class="btn" style="border-radius: 8px;"><i class="fa fa-floppy-o" aria-hidden="true"></i> Update</button>
                                   </div>
								</div>
							</div>
							<div class="col-lg-4 col-md-7 col-12">
								<div class="right">
									<ul>
										<li>Cart Subtotal<span>Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></span></li>
										<li>Shipping<span>Free</span></li>
										<li>You Save<span>$20.00</span></li>
										<li class="last">You Pay<span>$310.00</span></li>
									</ul>
									<div class="button5">
                                    <a href="#" class="btn" style="border-radius: 8px;"><i class="fa fa-shopping-cart"></i> Checkout</a>
                                    <a href="#" class="btn" style="border-radius: 8px;">Continue shopping <i class="fa fa-arrow-right"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/ End Total Amount -->
				</div>
			</div>
            <?php echo form_close(); ?>
		</div>
	</div>
	<!--/ End Shopping Cart -->
