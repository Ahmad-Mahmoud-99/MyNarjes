<div class="sidebar" data-color="rose" data-background-color="black" data-image="{{asset('assets/img/a.jpeg')}}">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="#" data-color="rose" class="simple-text logo-normal" style="font-size: 16px; text-align: center; color:white ; font-weight: bold;text-transform: capitalize;" >

             Patient's Friends Association
        </a>
       </div>
      <div class="sidebar-wrapper">
        <div class="user">
          <!-- <div class="photo">
            <img src="{{asset('assets/img/user.png')}}" />
          </div> -->
          <div class="user-info">
            <a data-toggle="collapse" href="#collapseExample" class="username">
              <span style="padding-left: 20px">
                Admin Name
                <b class="caret"></b>
              </span>
            </a>
            <div class="collapse" id="collapseExample">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="{{route('admin.myProfile')}}">
                    <span class="sidebar-mini"> MP </span>
                    <span class="sidebar-normal"> My Profile </span>
                  </a>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link" href="pages/EditProfile.html">
                    <span class="sidebar-mini"> EP </span>
                    <span class="sidebar-normal"> Edit Profile </span>
                  </a>
                </li> -->
                <li class="nav-item">
                  <a class="nav-link" href="{{route('admin.userManagment.create')}}">
                    <span class="sidebar-mini"> ANU </span>
                    <span class="sidebar-normal"> Add New User </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('admin.userManagment')}}">
                    <span class="sidebar-mini"> EP </span>
                    <span class="sidebar-normal"> User Management </span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <ul class="nav">
          <li class="nav-item active ">

            <a  class="nav-link" href="{{route('admin.dashboard')}}">
              <i class="material-icons">dashboard</i>
              <p> Dashboard </p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#patientsExamples">
              <i class="material-icons">supervised_user_circle</i>
              <p> Patients
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="patientsExamples">
              <ul class="nav">
                <li class="nav-item ">
                  <a class="nav-link" href="{{route('admin.patientManagment')}}">
                    <span class="sidebar-mini"> PM </span>
                    <span class="sidebar-normal"> Patients management
                    </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="{{route('admin.patientManagment.create')}}">
                    <span class="sidebar-mini"> AP </span>
                    <span class="sidebar-normal"> Add patients </span>
                  </a>
                </li>
              </ul>
            </div>

          </li>
          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#analysisExamples">
              <i class="material-icons">science</i>
              <p> Analysis
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="analysisExamples">
              <ul class="nav">

                <li class="nav-item ">
                  <a class="nav-link" href="{{route('admin.showAnalysis')}}">
                    <span class="sidebar-mini"> SA </span>
                    <span class="sidebar-normal"> Show Analysis </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="#">
                    <span class="sidebar-mini"> ANA </span>
                    <span class="sidebar-normal"> Add New Analysis</span>
                  </a>
                </li>

              </ul>
            </div>
          </li>

            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#formsExamples">
                    <i class="material-icons">paid
                    </i>
                    <p> Financial details

                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="formsExamples">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('admin.laboratryAnalysisPrice')}}">
                                <span class="sidebar-mini"> LAP </span>
                                <span class="sidebar-normal"> Laboratory Analysis Price  </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../../examples/forms/extended.html">
                                <span class="sidebar-mini"> APP </span>
                                <span class="sidebar-normal">Analysis Pending Payment </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#formsExamples">
              <i class="material-icons">content_paste</i>
              <p> Forms
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="formsExamples">
              <ul class="nav">
                <li class="nav-item ">
                  <a class="nav-link" href="../examples/forms/regular.html">
                    <span class="sidebar-mini"> RF </span>
                    <span class="sidebar-normal"> Regular Forms </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="../examples/forms/extended.html">
                    <span class="sidebar-mini"> EF </span>
                    <span class="sidebar-normal"> Extended Forms </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="../examples/forms/validation.html">
                    <span class="sidebar-mini"> VF </span>
                    <span class="sidebar-normal"> Validation Forms </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="../examples/forms/wizard.html">
                    <span class="sidebar-mini"> W </span>
                    <span class="sidebar-normal"> Wizard </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#tablesExamples">
              <i class="material-icons">grid_on</i>
              <p> Tables
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="tablesExamples">
              <ul class="nav">
                <li class="nav-item ">
                  <a class="nav-link" href="../examples/tables/regular.html">
                    <span class="sidebar-mini"> RT </span>
                    <span class="sidebar-normal"> Regular Tables </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="../examples/tables/extended.html">
                    <span class="sidebar-mini"> ET </span>
                    <span class="sidebar-normal"> Extended Tables </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="../examples/tables/datatables.net.html">
                    <span class="sidebar-mini"> DT </span>
                    <span class="sidebar-normal"> DataTables.net </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#mapsExamples">
              <i class="material-icons">place</i>
              <p> Maps
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="mapsExamples">
              <ul class="nav">
                <li class="nav-item ">
                  <a class="nav-link" href="../examples/maps/google.html">
                    <span class="sidebar-mini"> GM </span>
                    <span class="sidebar-normal"> Google Maps </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="../examples/maps/fullscreen.html">
                    <span class="sidebar-mini"> FSM </span>
                    <span class="sidebar-normal"> Full Screen Map </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="../examples/maps/vector.html">
                    <span class="sidebar-mini"> VM </span>
                    <span class="sidebar-normal"> Vector Map </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../examples/widgets.html">
              <i class="material-icons">widgets</i>
              <p> Widgets </p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../examples/charts.html">
              <i class="material-icons">timeline</i>
              <p> Charts </p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../examples/calendar.html">
              <i class="material-icons">date_range</i>
              <p> Calendar </p>
            </a>
          </li>
        </ul>
      </div>
      <div class="sidebar-background"></div>
    </div>
