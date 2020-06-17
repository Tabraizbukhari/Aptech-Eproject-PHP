<?php include '../../database/database.php' ?>
 <?php include '../../function/function.php' ?>
 <?php include '../includes/header.php' ?>
 <?php include '../includes/navbar.php' ?>
 <?php include '../includes/sidebar.php' ?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Frequently Asked Questions</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">faq's</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

                <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                    <div class="row">
                    <div class="col-md-4">
                    <h3 class="card-title">Faq's</h3>

                    </div>
                    <div class="col-md-4 offset-md-4">
                        <a class="btn btn-primary float-right getmodal" href="">Add new Faq's</a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <div class="card">
                    <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-info collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Q1: Collapsible Group Item #2
                        </button>
                       
                        <a href="#" class="btn mx-1 btn-outline-danger btn-lg float-right" >
                            <i class="fa fa-trash-o"> </i>
                        </a>
                        <button class="btn btn-outline-success float-right" >
                            Edit
                        </button>
                    </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                    </div>
                </div>
                
                </div>
                </div>

            </div>
        </div>
    </section>
    </div>

  
<?php include '../includes/footer.php' ?>
