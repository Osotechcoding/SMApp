<div class="text-center mt-0 mb-2">
<!-- Statistics Cards Starts -->
        <div class="row">
       
        <div class="col-xl-12 col-md-12">
          <div class="row">
            <div class="col-md-6 dashboard-users-success">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                     <i class="fa fa-credit-card fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">REGISTRATION PINS</h3></div>
                  <h2 class="text-white mb-0"><?php echo number_format($Pin_serial->count_scratch_pins("tbl_reg_pins"))?></h2>
                   <button type="button" class="btn btn-outline-success view_reg_pins_btn" style="background: #fff; color: black;"> VIEW</button>
                </div>
              </div>
            </div>

            <div class="col-md-6 dashboard-users-success">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-credit-card fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> RESULT PINS</h3></div>
                  <h2 class="text-white mb-0"> <?php echo number_format($Pin_serial->count_scratch_pins("tbl_result_pins"))?></h2>
                  <button type="button" class="btn btn-outline-success view_res_pins_btn" style="background: #fff; color: black;"> VIEW</button>
                </div>
              </div>
            </div>

            
           
          </div>
        </div>
       
      </div>
       <!-- Revenue Growth Chart Starts -->
       </div>
      