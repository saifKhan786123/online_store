<?php 

    $this->load->view('admin/inc/header');
    $this->load->view('admin/inc/sidebar');

?>


    <div class="card">
        <h5 class="card-header">Exchange Rate Converter</h5>
        <div class="card-body">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-4">
                <strong>From:</strong>
                <select class="browser-default custom-select" id="from" required>
                    <!-- <option selected>Select Currency</option> -->
                    <option value="EUR" selected>EURO</option>
                </select>
            </div>
            <div class="col-md-4">
                <strong>To:</strong>
                <select class="browser-default custom-select" id="to" required>
                    <option value="" selected>Select Currency</option>
                    <option value="USD">USD</option>
                    <option value="RON">RON</option>
                    
                </select>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-md-4">
                <strong>Amount:</strong>
                <input id="amount" type="number" name="amount" step="0.000000001" class="form-control" placeholder="Amount" required>
            </div>
            <div class="col-md-4">
               <div class="d-flex">
                <strong>Result:</strong>
                <span id="result" class="ml-2"></span>
               </div>
            </div>
        </div>
            <div class="col-lg-8">
                <br/>
                <button id="convert-price" type="submit" class="btn btn-success d-block w-25 mx-auto">Submit <i class="fas fa-spinner fa-spin text-white ml-2 d-none"></i></button>
            </div>
    </div>
</div>

<?php

    $this->load->view('admin/inc/footer');