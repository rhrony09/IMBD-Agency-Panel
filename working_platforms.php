<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/menubar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Working Platforms</h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Working Platforms</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <?php
                if (isset($_SESSION['error'])) {
                    echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              " . $_SESSION['error'] . "
            </div>
          ";
                    unset($_SESSION['error']);
                }
                if (isset($_SESSION['success'])) {
                    echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              " . $_SESSION['success'] . "
            </div>
          ";
                    unset($_SESSION['success']);
                }
                ?>

                <!-- /.row -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
                            </div>
                            <div class="box-body">
                                <table id="example" class="table table-bordered" width="100%">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%; text-align: center;">S/N</th>
                                            <th>Platform Name</th>
                                            <?php if ($user['role'] == 1) : ?>
                                                <th>Action</th>
                                            <? endif ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM working_platforms";
                                        $query = $conn->query($sql);
                                        $i = 1;
                                        while ($row = $query->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td style="width: 5%; text-align: center;"><?php echo $i;
                                                                                            $i++; ?></td>
                                                <td><?php echo $row['social_media']; ?></td>
                                                <?php if ($user['role'] == 1) : ?>
                                                    <td style="width: 10%;">
                                                        <a href='<?php echo "working_platforms_delete.php?delete=role&id=" . $row['id']; ?>' class=" btn btn-danger btn-sm delete btn-flat"><i class="fa fa-trash"></i> Delete</a>
                                                    </td>
                                                <? endif ?>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <!-- right col -->
        </div>
        <?php include 'includes/footer.php'; ?>
        <?php include 'includes/working_platform_modal.php'; ?>

    </div>
    <!-- ./wrapper -->


    <?php include 'includes/scripts.php'; ?>

</body>

</html>