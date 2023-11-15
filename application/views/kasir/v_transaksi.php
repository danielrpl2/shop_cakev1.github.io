
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <section class="content">
                    <div class="row">
                     <div class="col-lg-4 col-md-6">
                            <div class="box box-widget">
                                <div class="box-body">
                                    <table width="100%">
                                        <tr>
                                            <td style="vertical-align: top;">
                                                <label for="date">Data</label>
                                            </td>
                                            <div>
                                            <td class="form-group">
                                                <input type="date" name="" id="date" value="<?= date('Y-m-d') ?>"
                                                    class="form-control">
                                            </td>
                                            </div>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align: top; width: 30%;">
                                            <div class="mt-4">
                                                <label for="user">Kasir</label>
                                            </td>
                                            </div>
                                            <td>
                                            <div class="mb-3 mt-3">
                                                <input type="text" class="form-control" placeholder="State" readonly="readonly">
                                            </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align: top;">
                                            <div class="mt-3">
                                                <label for="customer">Customer</label>
                                            </td></div>
                                            <td> <div>
                                                <select id="inputState" class="form-control">
                                                    <option selected="selected">Choose...</option>
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                </select>
                                            </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="box box-widget">
                                <div class="box-body">
                                    <table width="100%">
                                        <tr>
                                            <td style="vertical-align: top; width: 30%;">
                                                <label for="id_produk">Id Produk</label>
                                            </td>
                                            <td>
                                                <div class="form-group input-group">
                                                    <input type="hidden" id="item_id">
                                                    <input type="hidden" id="price">
                                                    <input type="hidden" id="stock">
                                                    <input type="text" id="id_produk" class="form-control" autofocus>
                                                    <span class="input-group-btn">
                                                        <div class="mt-1 ml-1">
                                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-item">
                                                            <i class="fa fa-search"></i>
                                                        </button></div>
                                                    </span>
                                                </div>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td style="vertical-align: top;">
                                                <label for="qty">Qty</label>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" id="qty" value="1" min="1" class="form-control">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                          <td></td>
                                          <td>
                                            <div>
                                                <button type="button" id="add_cart" class="btn btn-primary">
                                                    <i class="fa fa-cart-plus"></i> Add
                                                </button>
                                            </div>
                                          </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="box box-widget">
                                <div class="box-body">
                                    <div align="right">
                                        <h4>Invoice <b></b></h4>
                                        <h1><b><span id="grand_total2" style="font-size: 50pt;">0</span></b></h1>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="box box-widget">
                                    <div class="box-body table-responsive">
                                      <table class="table table-bordered table-striped">
                                         <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Id Produk</th>
                                                <th>Nama Produk</th>
                                                <th>Price</th>
                                                <th>Qty</th>
                                                <th width="10%">Discon Item</th>
                                                <th width="15%">Total</th>
                                                <th>Action</th>
                                            </tr>
                                         </thead>
                                         <tbody id="cart_table">
                                            <tr>
                                                <!-- <td colspan="9" class="text-center">Tidak Ada Item</td> -->
                                                <td>1</td>
                                                <td>111</td>
                                                <td>111</td>
                                                <td>111</td>
                                                <td>111</td>
                                                <td>111</td>
                                                <td>111</td>
                                                <td>111</td>
                                            </tr>
                                         </tbody>
                                      </table>
                                    </div>
                                </div>
                            </div>
                        </div>
</div>

                    <div class="container-fluid">
                        <div class="row">
                         <div class="col-lg-3 col-md-6">
                                <div class="box box-widget">
                                    <div class="box-body">
                                        <table width="100%">
                                            <tr>
                                                <td style="vertical-align: top; width: 30%;">
                                                    <label for="sub_total">Sub Total</label>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="number" id="sub_total" value="" class="form-control" readonly>
                                                    </div> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: top;">
                                                    <label for="discount">Discount</label>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="number" id="discount" value="0" min="0" class="form-control">
                                                    </div> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: top;">
                                                    <label for="grand_total">Grand Total</label>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="number" id="grand_total" value="0" min="0" class="form-control" readonly>
                                                    </div> 
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="box box-widget">
                                    <div class="box-body">
                                        <table width="100%">
                                            <tr>
                                                <td style="vertical-align: top; width: 30%;">
                                                    <label for="cash">Cash</label>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="number" id="cash" value="0" min="0" class="form-control">
                                                    </div> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: top;">
                                                    <label for="change">Change</label>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="number" id="change" class="form-control" readonly>
                                                    </div> 
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-12">
                                <div class="box box-widget">
                                    <div class="box-body">
                                        <table width="100%">
                                            <tr>
                                                <td style="vertical-align: top;">
                                                    <label for="note">Note</label>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                       <textarea name="" id="note" rows="3" class="form-control"></textarea>
                                                    </div> 
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-12">
                                <div>
                                    <button id="cancel_payment" class="btn btn-flat btn-warning">
                                        <i class="fa fa-refresh"></i> Cancel
                                    </button><br><br>
                                    <button id="process_payment" class="btn btn-flat btn-lg btn-success">
                                        <i class="fa fa-paper-plane"></i> Cancel
                                    </button>
                                </div>
                            </div>

                        </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
</div>