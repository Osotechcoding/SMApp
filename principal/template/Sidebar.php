 <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mr-auto"><a class="navbar-brand" href="./">
          <h2 class="brand-text mb-0"><?php echo $lang['owner'] ?></h2></a></li>
          <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="bx bx-x d-block d-xl-none font-medium-4 primary"></i><i class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block primary" data-ticon="bx-disc"></i></a></li>
        </ul>
      </div>
      <div class="shadow-bottom"></div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">
          <li class="active"><a class="d-flex align-items-center" href="./"><i class="fa fa-desktop fa-1x"></i><span class="menu-item text-truncate" data-i18n="Dashboard"><?php echo $lang['Dashboard'] ?></span></a>
              </li>
          <li class="navigation-header text-truncate"><span data-i18n="MANAGEMENT">MANAGEMENT</span>
          </li>
          <!-- <li class="nav-item"><a href="javaScript:void(0)"><i class="fa fa-edit fa-1x" data-icon="notebook"></i><span class="menu-title text-truncate" data-i18n="ADMINISTRATION">ADMINISTRATION</span></a>
            <ul class="menu-content">
              <li class="nav-item"><a href="acaSession"><i class="fa fa-calendar fa-1x"></i><span class="menu-title text-truncate" data-i18n="academic year">Academic Year</span></a>
          </li>
           <li><a class="d-flex align-items-center" href="create_subject"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Manage Subject">Manage Subject</span></a>
              </li>
               <li><a class="d-flex align-items-center" href="upload_lecture"><i class="bx bx-video-plus"></i><span class="menu-item text-truncate" data-i18n="Virtual Lecture">Virtual Lecture</span></a>
              </li>
               <li><a class="d-flex align-items-center" href="create_classroom"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Manage Classroom">Manage Classroom</span></a>
              </li>
          <li class=" nav-item"><a href="dutyAssignment"><i class="fa fa-briefcase fa-1x"></i><span class="menu-title text-truncate" data-i18n="Assign Duty">Assign Duty</span></a>
          </li>
            </ul>
          </li> -->
          <!-- ADMISSION -->
          <li class="nav-item"><a href="javaScript:void(0)"><i class="fa fa-edit fa-1x" data-icon="notebook"></i><span class="menu-title text-truncate" data-i18n="ADMISSION PORTAL">ADMISSION PORTAL</span></a>
            <ul class="menu-content">
               <li class=" nav-item"><a href="callAdmission"><i class="fa fa-cogs fa-1x"></i><span class="menu-title text-truncate" data-i18n="Portal Status">Admission Portal</span></a>
          </li>
            </ul>
          </li>
          <!-- ADMISION ENDS -->
          <!-- RESULT -->
          <li class="nav-item"><a href="javaScript:void(0)"><i class="fa fa-bar-chart fa-1x" data-icon="notebook"></i><span class="menu-title text-truncate" data-i18n="MANAGE RESULTS">MANAGE RESULTS</span></a>
            <ul class="menu-content">
              <li class="nav-item"><a href="rgrading"><i class="fa fa-line-chart fa-1x"></i><span class="menu-title text-truncate" data-i18n="rgrading">Result Grading</span></a>
          </li>
          <li class="nav-item"><a href="registerStudentSubject"><i class="fa fa-book fa-1x"></i><span class="menu-title text-truncate" data-i18n="Subject Registration"> Subject Registration</span></a>
          <!--  <li class=" nav-item"><a href="upload_single_result"><i class="fa fa-eye fa-1x"></i><span class="menu-title text-truncate" data-i18n="Upload Result">Upload Results</span></a>
          </li> -->
          <li class=" nav-item"><a href="result_uploading"><i class="fa fa-eye fa-1x"></i><span class="menu-title text-truncate" data-i18n="Upload Result">Upload Results</span></a>
          </li>
           <li class=" nav-item"><a href="student_results"><i class="fa fa-eye fa-1x"></i><span class="menu-title text-truncate" data-i18n="View Result">View Results</span></a>
          </li>
          <li class="nav-item"><a href="principal_comment"><i class="fa fa-upload fa-1x"></i><span class="menu-title text-truncate" data-i18n="Result Comments"> Result Comments</span></a>
          </li>
         <!--   <li class=" nav-item"><a href="publish_student_result"><i class="fa fa-paper-plane fa-1x"></i><span class="menu-title text-truncate" data-i18n="Publish Result">Publish Results</span></a>
          </li> -->
            </ul>
          </li>
          <!-- RESULT ENDS -->
          <!-- STUDENT -->
          <li class="nav-item"><a href="javaScript:void(0)"><i class="fa fa-graduation-cap fa-1x" data-icon="notebook"></i><span class="menu-title text-truncate" data-i18n="STUDENT"> STUDENT</span></a>
            <ul class="menu-content">
          <li class="nav-item"><a href="ab_students"><i class="fa fa-user-plus fa-1x"></i><span class="menu-title text-truncate" data-i18n="Manage Students">Manage Students</span></a>
          </li>
          <!-- student_attendance -->
           <li class="nav-item"><a href="student_attendance"><i class="fa fa-child fa-1x"></i><span class="menu-title text-truncate" data-i18n="Manage Prefects">Mark Attendant</span></a>
          </li>
          <!--  <li class="nav-item"><a href="prefects"><i class="fa fa-user-secret fa-1x"></i><span class="menu-title text-truncate" data-i18n="Manage Prefects">Manage Prefects</span></a>
          </li> -->
            </ul>
          </li>
          <!-- STUDENT ENDS -->
           <!-- STUDENT -->
          <li class="nav-item"><a href="javascript:void(0)"><i class="fa fa-users fa-1x" data-icon="notebook"></i><span class="menu-title text-truncate" data-i18n="STAFF"> STAFF</span></a>
            <ul class="menu-content">
          <li class="nav-item"><a href="staffs"><i class="fa fa-user-plus fa-1x"></i><span class="menu-title text-truncate" data-i18n="Manage Staff">Manage Staff</span></a>
             <li class="nav-item"><a href="HODs"><i class="fa fa-briefcase fa-1x"></i><span class="menu-title text-truncate" data-i18n="Manage Office">Manage Office</span></a>
          </li>
            </ul>
          </li>
          <!-- STUDENT ENDS -->
         
          <li class=" navigation-header text-truncate"><span data-i18n="FINANCIAL">FINANCIAL</span>
          </li>
          <li class=" nav-item"><a href="javaScript:void(0)"><i class="fa fa-money fa-1x" data-icon="retweet"></i><span class="menu-title text-truncate" data-i18n="Accounting">ACCOUNTING</span></a>
            <ul class="menu-content">
               <li><a class="d-flex align-items-center" href="make_payment"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Payment"> Payment</span></a> </li>
                <li><a class="d-flex align-items-center" href="filter-payments"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Payment"> Search Payment</span></a> </li>
               <li><a class="d-flex align-items-center" href="fee_component"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Fee Component">Fee Component</span></a> </li>
                 <li><a class="d-flex align-items-center" href="fee_allocate"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Fee Allocation">Fee Structure</span></a> </li>
                  <li><a class="d-flex align-items-center" href="account_reports"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Payment Records">Payment Records</span></a>
              </li>
              <li><a class="d-flex align-items-center" href="visap_payroll"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Fee Allocation"> Payroll</span></a>
              </li>
                <li><a class="d-flex align-items-center" href="school_expense"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Fee Allocation"> Expenses</span></a>
              </li>
               <li><a class="d-flex align-items-center" href="add_loan"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Manage Loan">Staff Loan</span></a> </li>
            </ul>
          </li>
          <li class=" navigation-header text-truncate"><span data-i18n="SCHOOL ACTIVITY">SCHOOL ACTIVITY</span>
          </li>
          <li class=" nav-item"><a href="javaScript:void(0)"><i class="fa fa-credit-card-alt fa-1x" data-icon="pie-chart"></i><span class="menu-title text-truncate" data-i18n="SCRATCH CARD">SCRATCH CARD</span></a>
            <ul class="menu-content">
               <li><a class="d-flex align-items-center" href="regPin"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Generate Pins">Admission Pins</span></a>
              </li>
               <li><a class="d-flex align-items-center" href="resPin"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Generate Pins">Result Pins</span></a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="javaScript:void(0)"><i class="fa fa-hotel fa-1x" data-icon="pie-chart"></i><span class="menu-title text-truncate" data-i18n="HOSTEL">HOSTEL</span></a>
            <ul class="menu-content">
               <li><a class="d-flex align-items-center" href="create_hostel"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Manage Hostel">Manage Hostel</span></a>
              </li>
            </ul>
          </li>
           <li class=" nav-item"><a href="javaScript:void(0)"><i class="fa fa-book fa-1x" data-icon="pie-chart"></i><span class="menu-title text-truncate" data-i18n="LIBRARY">LIBRARY</span></a>
            <ul class="menu-content">
               <li><a class="d-flex align-items-center" href="add_book"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Add Book">Add Book</span></a>
              </li>
               <li><a class="d-flex align-items-center" href="student_n_book"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Result Pin">Lend Book</span></a>
              </li>
              <li><a class="d-flex align-items-center" href="return_books"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Return Book">Return Book</span></a>
              </li>
            </ul>
          </li>
         
           <li class=" nav-item"><a href="javaScript:void(0)"><i class="fa fa-bus fa-1x" data-icon="pie-chart"></i><span class="menu-title text-truncate" data-i18n="SCHOOL BUS"> SCHOOL BUS </span></a>
            <ul class="menu-content">
               <li><a class="d-flex align-items-center" href="bus_route"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Manage Bus">Manage Bus</span></a>
              </li>
             
               <li><a class="d-flex align-items-center" href="student_n_bus"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Student & Bus">Student & Bus</span></a>
              </li>
              <li><a class="d-flex align-items-center" href="running_cost"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Student & Bus">Bus Maintenance</span></a>
              </li>
            </ul>
          </li>

          <li class=" nav-item"><a href="javaScript:void(0)"><i class="fa fa-calendar fa-1x" data-icon="retweet"></i><span class="menu-title text-truncate" data-i18n="blog & event"> EVENTS</span></a>
            <ul class="menu-content">
               <li><a class="d-flex align-items-center" href="add_event"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Manage Event">Manage Event</span></a> </li>
                <li><a class="d-flex align-items-center" href="add_holidays"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Manage Holiday">Manage Holiday</span></a> </li>
          
                <li><a class="d-flex align-items-center" href="visitor_book"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Manage Gallery">Vistors' Book</span></a>
              </li>
            </ul>
          </li>
        
        <li class=" navigation-header text-truncate"><span data-i18n="SETTINGS">SETTINGS</span>
          </li>
           <li class=" nav-item"><a href="javaScript:void(0)"><i class="fa fa-cogs fa-1x" data-icon="retweet"></i><span class="menu-title text-truncate"> Settings</span></a>
            <ul class="menu-content">
               <li class=" nav-item"><a href="app_settings"><i class="fa fa-cogs fa-1x" data-icon="morph-folder"></i><span class="menu-title text-truncate" data-i18n="Configuration">Settings</span></a>

          </li>
           <li class=" nav-item"><a href="account-settings"><i class="fa fa-edit fa-1x" data-icon="morph-folder"></i><span class="menu-title text-truncate" data-i18n="Configuration">Edit Profile</span></a>
          <li class=" nav-item"><a href="mybackup"><i class="fa fa-database fa-1x" data-icon="help"></i><span class="menu-title text-truncate" data-i18n="Backup Restore"> Backup & Restore</span></a>
          </li>
            </ul>
          </li>
           <li>
                <a class="d-flex align-items-center" onclick=" return confirm('<?php echo $lang["logout-sure?"];?>');" href="logout?action=logout"><i class="fa fa-power-off"></i>
                <span class="menu-item text-truncate"> <?php echo $lang['Logout'] ?></span></a>
               
              </li>
         
        </ul>
      </div>
    </div>