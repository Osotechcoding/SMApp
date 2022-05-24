
<!-- STUDENTS STATS -->
      <div class="col-xl-12 col-sm-12 col-md-12 col-12 dashboard-users">
      <div class="row">
        <!-- Statistics Cards Starts -->
        <div class="col-md-12">
          <h3> <?php echo __OSO_APP_NAME__; ?> STUDENTS INFORMATION</h3>
          <div class="row">
          <div class="col-md-4 dashboard-users-white">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light mx-auto mb-50">
                    <i class="fa fa-child fa-2x font-medium-5"></i>
                  </div>
                  <div class="text-white line-ellipsis">Male Students</div>
                  <h3 class="mb-0 text-white"><?php echo $Student->count_students_by_gender("Male");?></h3>
                </div>
              </div>
            </div>
            <div class="col-md-4 dashboard-users-white">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light mx-auto mb-50">
                    <i class="fa fa-child fa-2x font-medium-5"></i>
                  </div>
                  <div class="text-white line-ellipsis">Female Students</div>
                  <h3 class="mb-0 text-white"><?php echo $Student->count_students_by_gender("Female");?></h3>
                </div>
              </div>
            </div>
           <div class="col-md-4 dashboard-users-white">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light mx-auto mb-50">
                   <i class="fa fa-graduation-cap fa-2x font-medium-5"></i>
                  </div>
                  <div class="text-white line-ellipsis">Total Students</div>
                  <h3 class="mb-0 text-white"><?php echo $Student->count_total_visap_students();?></h3>
                </div>
              </div>
            </div>
          </div>
        </div>
       
      </div>
    </div>
     <!-- STUDENTS STATS -->

     <!-- STAFF STATS -->
      <div class="col-xl-12 col-sm-12 col-md-12 col-12 dashboard-users">
      <div class="row">
        <!-- Statistics Cards Starts -->
        <div class="col-md-12">
         <h3> <?php echo __OSO_APP_NAME__; ?> STAFF INFORMATION</h3>
          <div class="row">
          <div class="col-md-4 dashboard-users-white">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light mx-auto mb-50">
                    <i class="fa fa-user-plus fa-2x font-medium-5"></i>
                  </div>
                  <div class="text-white line-ellipsis">Non-Teaching</div>
                  <h3 class="mb-0 text-white">21</h3>
                  
                </div>
              </div>
            </div>
           <div class="col-md-4 dashboard-users-white">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light mx-auto mb-50">
                   <i class="fa fa-user-plus fa-2x font-medium-5"></i>
                  </div>
                  <div class="text-white line-ellipsis">Teaching</div>
                  <h3 class="mb-0 text-white">21</h3>
                 
                </div>
              </div>
            </div>

             <div class="col-md-4 dashboard-users-white">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light mx-auto mb-50">
                   <i class="fa fa-user-plus fa-2x font-medium-5"></i>
                  </div>
                  <div class="text-white line-ellipsis">Total Staff</div>
                  <h3 class="mb-0 text-white">21</h3>
                 
                </div>
              </div>
            </div>
           
          </div>
        </div>
        <!-- Revenue Growth Chart Starts -->
      </div>
    </div>
     <!-- STAFF STATS -->