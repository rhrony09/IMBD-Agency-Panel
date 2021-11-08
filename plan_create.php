<?php
include 'includes/session.php';
include 'includes/header.php';

// create platform list from database function
function getPlatforms()
{
    $platforms = '<option value="" selected disabled>- Select -</option>';
    $conn = new mysqli('localhost', 'root', '', 'panel');
    $sql = "SELECT * FROM working_platforms";
    $query = $conn->query($sql);
    while ($prow = $query->fetch_assoc()) {
        $platforms .= '<option value="' . $prow['social_media'] . '">' . $prow['social_media'] . '</option>';
    }
    return $platforms;
}

//month name array
function getMonthName()
{
    $month_name = '<option value="" selected disabled>- Select -</option>';
    $month_arr = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    foreach ($month_arr as $key => $value) {
        $month_name .= '<option value="' . $value . '">' . $value . '</option>';
    }
    return $month_name;
}
?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php
        include 'includes/navbar.php';
        include 'includes/menubar.php';
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Create a New marketing Plan
                </h1>
                <ol class="breadcrumb">
                    <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li>Create Plan</li>
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
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-body">
                                <form class="form-horizontal" method="POST" action="plan_processor.php" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label for="business_name" class="control-label">Business Name <span>*</span></label>
                                            <input type="text" class="form-control" id="business_name" name="business_name" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="business_email" class="control-label">Business Email <span>*</span></label>
                                            <input type="email" class="form-control" id="business_email" name="business_email" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="sender_email" class="control-label">Sender Email <span>*</span></label>
                                            <input type="email" class="form-control" id="sender_email" name="sender_email" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="business_number" class="control-label">Business Contact Number <span>*</span></label>
                                            <input type="tel" class="form-control" id="business_number" name="business_number" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="business_address" class="control-label">Business Address</label>
                                            <textarea class="form-control" name="business_address" id="business_address" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <label for="business_address" class="control-label">Core Marketing Objective</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="branding" name="objective[]" value="Branding">
                                                <label class="form-check-label fw-400" for="branding">Branding</label>
                                                <input class="form-check-input" type="checkbox" id="sales" name="objective[]" value="Sales">
                                                <label class="form-check-label fw-400" for="sales">Sales</label>
                                                <input class="form-check-input" type="checkbox" id="engagement" name="objective[]" value="Engagement">
                                                <label class="form-check-label fw-400" for="engagement">Engagement</label>
                                                <input class="form-check-input" type="checkbox" id="awareness" name="objective[]" value="Awareness">
                                                <label class="form-check-label fw-400" for="awareness">Awareness</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="duration" class="control-label">Duration</label>
                                            <input type="number" class="form-control" id="duration" name="duration" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="for" class="control-label">For</label>
                                            <select class="form-control" name="for" id="for" required>
                                                <option value="Days" selected>Days</option>
                                                <option value="Week(s)">Week(s)</option>
                                                <option value="Month(s)">Month(s)</option>
                                                <option value="Year(s)">Year(s)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Start SWOT Analysis -->
                                    <div class="form-group">
                                        <h4 class="text-center" style="margin-top: 40px; text-decoration: underline;">SWOT Analysis</h4>
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <label for="swot_strength" class="control-label">Straight</label> <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="(Idea: Product USP, New market, New Product, After sale service, Certification, Experience, Testimonials, Sourcing)"></i>
                                                <textarea class="form-control" name="swot_strength" id="swot_strength" rows="4"></textarea>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="swot_weakness" class="control-label">Weakness</label> <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, quam."></i>
                                                <textarea class="form-control" name="swot_weakness" id="swot_weakness" rows="4"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <label for="swot_opportunity" class="control-label">Opportunities</label> <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quas, eaque."></i>
                                                <textarea class="form-control" name="swot_opportunity" id="swot_opportunity" rows="4"></textarea>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="swot_threat" class="control-label">Threats</label> <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="(Idea: Low competition, Recurring model, Community build up)"></i>
                                                <textarea class="form-control" name="swot_threat" id="swot_threat" col="4" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End SWOT Analysis -->
                                    <!-- Start Content Plan with Details -->
                                    <div class="form-group">
                                        <h4 class="text-center" style="margin-top: 40px; text-decoration: underline;">Content Plan with Details</h4>
                                        <div class="col-md-12">
                                            <table width="100%" class="table table-striped table-bordered text-center" id="content_plan">
                                                <tr>
                                                    <th width="40%">Content</th>
                                                    <th width="20%">Objective</th>
                                                    <th width="10%">Min. Cost</th>
                                                    <th width="10%">Max. Cost</th>
                                                    <th width="12%">Approx. Time (Days)</th>
                                                    <th width="8%">Action</th>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="plan_content[]" placeholder="Content"></td>
                                                    <td><input type="text" class="form-control" name="plan_objective[]" placeholder="Objective"></td>
                                                    <td><input type="number" class="form-control" name="plan_min_cost[]" placeholder="Min. Cost"></td>
                                                    <td><input type="number" class="form-control" name="plan_max_cost[]" placeholder="Max. Cost"></td>
                                                    <td><input type="number" class="form-control" name="plan_approx_time[]" placeholder="Approx. Time"></td>
                                                    <td><input type="button" class="fa btn btn-success" id="plan_add" name="add_content_plan" value="&#xf067"></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- End Content Plan with Details -->
                                    <!-- Start Content Details -->
                                    <div class="form-group">
                                        <h4 class="text-center" style="margin-top: 40px; text-decoration: underline;">Content Details</h4>
                                        <div class="col-md-12">
                                            <table width="100%" class="table table-striped table-bordered text-center" id="content_details">
                                                <tr>
                                                    <th width="32%">Content Title</th>
                                                    <th width="30%">Description</th>
                                                    <th width="30%">Required Resources </th>
                                                    <th width="8%">Action</th>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="details_content[]" placeholder="Content Title"></td>
                                                    <td><input type="text" class="form-control" name="details_description[]" placeholder="Description"></td>
                                                    <td><input type="text" class="form-control" name="details_required_resources[]" placeholder="Required Resources"></td>
                                                    <td><input type="button" class="fa btn btn-success" id="details_add" name="add_content_details" value="&#xf067"></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- End Content Details -->
                                    <!-- Start Content Mapping -->
                                    <div class="form-group">
                                        <h4 class="text-center" style="margin-top: 40px; text-decoration: underline;">Content Mapping</h4>
                                        <div class="col-md-12">
                                            <table width="100%" class="table table-striped table-bordered text-center" id="content_mapping">
                                                <tr>
                                                    <th width="35%">Content</th>
                                                    <th width="17%">Publishing Date</th>
                                                    <th width="20%">Platforms</th>
                                                    <th width="20%">Campaign Duration (Days)</th>
                                                    <th width="8%">Action</th>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="mapping_content[]" placeholder="Content"></td>
                                                    <td><input type="date" class="form-control" name="mapping_date[]" placeholder="Publishing Date"></td>
                                                    <td><select class="form-control" name="mapping_platforms[]" id="mapping_platforms"><?php echo getPlatforms() ?>
                                                        </select></td>
                                                    <td><input type="text" class="form-control" name="mapping_duration[]" placeholder="Campaign Duration"></td>
                                                    <td><input type="button" class="fa btn btn-success" id="mapping_add" name="add_content_mapping" value="&#xf067"></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- End Content Mapping -->
                                    <!-- Start Promotion Plan -->
                                    <div class="form-group">
                                        <h4 class="text-center" style="margin-top: 40px; text-decoration: underline;">Promotion Plan</h4>
                                        <div class="col-md-12">
                                            <table width="100%" class="table table-striped table-bordered text-center" id="promotion_plan">
                                                <tr>
                                                    <th width="30%">Description</th>
                                                    <th width="20%">Objective</th>
                                                    <th width="10%">Min. Cost</th>
                                                    <th width="10%">Max. Cost</th>
                                                    <th width="22%">Target</th>
                                                    <th width="8%">Action</th>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="promotion_content[]" placeholder="Description"></td>
                                                    <td><input type="text" class="form-control" name="promotion_objective[]" placeholder="Objective"></td>
                                                    <td><input type="number" class="form-control" name="promotion_min_cost[]" placeholder="Min. Cost"></td>
                                                    <td><input type="number" class="form-control" name="promotion_max_cost[]" placeholder="Max. Cost"></td>
                                                    <td><input type="text" class="form-control" name="promotion_target[]" placeholder="Target"></td>
                                                    <td><input type="button" class="fa btn btn-success" id="promotion_add" name="add_promotion_plan" value="&#xf067"></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- End Promotion Plan -->

                                    <!-- Start ROI -->
                                    <div class="form-group">
                                        <h4 class="text-center" style="margin-top: 40px; text-decoration: underline;">ROI</h4>
                                        <div class="col-md-12">
                                            <table width="100%" class="table table-striped table-bordered text-center" id="roi">
                                                <tr>
                                                    <th width="15%">Month</th>
                                                    <th width="14%">Expense (TK)</th>
                                                    <th width="14%">Conversion</th>
                                                    <th width="14%">Sales Rate (%)</th>
                                                    <th width="14%">Total Sales Amount (TK)</th>
                                                    <th width="21%">Return Type</th>
                                                    <th width="8%">Action</th>
                                                </tr>
                                                <tr>
                                                    <td><select class="form-control" name="roi_month[]"><?php echo getMonthName() ?></select></td>
                                                    <td><input type="text" class="form-control" name="roi_expense[]" placeholder="Expense"></td>
                                                    <td><input type="text" class="form-control" name="roi_conversion[]" placeholder="Conversion"></td>
                                                    <td><input type="text" class="form-control" name="roi_sales_rate[]" placeholder="Sales Rate (%)"></td>
                                                    <td><input type="text" class="form-control" name="roi_total_sale[]" placeholder="Total Sales Amount"></td>
                                                    <td><input type="text" class="form-control" name="roi_return_type[]" placeholder="Return Type"></td>
                                                    <td><input type="button" class="fa btn btn-success" id="roi_add" name="add_roi" value="&#xf067"></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- End ROI -->

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary btn-flat" name="create"><i class="fa fa-file-pdf-o"></i> Create</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include 'includes/footer.php'; ?>
        <?php include 'includes/admin_modal.php'; ?>
    </div>
    <?php include 'includes/scripts.php'; ?>
    <script>
        $(document).ready(function() {

            var max = 10;

            // Content Plan Dynamic Add
            var plan_html = '<tr><td><input type = "text" class = "form-control" name = "plan_content[]" placeholder = "Content"> </td> <td> <input type = "text" class = "form-control" name = "plan_objective[]" placeholder =  "Objective"> </td> <td> <input type = "number" class = "form-control" name = "plan_min_cost[]" placeholder = "Min. Cost"> </td> <td> <input type = "number" class = "form-control" name = "plan_max_cost[]" placeholder = "Max. Cost" > </td> <td > <input type = "number" class = "form-control" name = "plan_approx_time[]" placeholder = "Approx. Time"> </td> <td><input type="button" class="fa btn btn-success" id="plan_add" name="add_content_plan" value="&#xf067"> <input type="button" id="plan_remove" class="fa btn btn-danger" name="remove_content_plan" value = "&#xf00d"></td> </tr>';

            var plan_i = 1;

            $('#content_plan').on("click", "#plan_add", function() {
                if (plan_i < max) {
                    $(this).closest('tr').after(plan_html);
                    plan_i++;
                }
            });
            $('#content_plan').on("click", "#plan_remove", function() {
                $(this).closest('tr').remove();
                plan_i--;
            });

            // Content Details Dynamic Add
            var details_html = '<tr><td><input type = "text" class = "form-control" name = "details_content[]" placeholder = "Content Title"> </td> <td> <input type = "text" class = "form-control" name = "details_description[]" placeholder =  "Description"> </td> <td> <input type = "text" class = "form-control" name = "details_required_resources[]" placeholder = "Required Resources"> </td> <td><input type="button" class="fa btn btn-success" id="details_add" name="add_content_details" value="&#xf067"> <input type="button" id="details_remove" class="fa btn btn-danger" name="remove_content_details" value = "&#xf00d"></td> </tr>';

            var details_i = 1;

            $('#content_details').on("click", "#details_add", function() {
                if (details_i < max) {
                    $(this).closest('tr').after(details_html);
                    details_i++;
                }
            });
            $('#content_details').on("click", "#details_remove", function() {
                $(this).closest('tr').remove();
                details_i--;
            });

            // Content Mapping Dynamic Add
            var mapping_html = '<tr><td><input type = "text" class = "form-control" name = "mapping_content[]" placeholder = "Content"> </td> <td> <input type = "date" class = "form-control" name = "mapping_date[]" placeholder =  "Publishing Date"> </td> <td><select class="form-control" name="mapping_platforms[]" id="mapping_platforms"><?php echo getPlatforms(); ?></select> </td> <td> <input type = "text" class = "form-control" name = "mapping_duration[]" placeholder = "Campaign Duration"> </td> <td><input type="button" class="fa btn btn-success" id="mapping_add" name="add_content_mapping" value="&#xf067"> <input type="button" id="mapping_remove" class="fa btn btn-danger" name="remove_content_mapping" value = "&#xf00d"></td> </tr>';

            var mapping_i = 1;

            $('#content_mapping').on("click", "#mapping_add", function() {
                if (mapping_i < max) {
                    $(this).closest('tr').after(mapping_html);
                    mapping_i++;
                }
            });
            $('#content_mapping').on("click", "#mapping_remove", function() {
                $(this).closest('tr').remove();
                mapping_i--;
            });

            // Promotion Plan Dynamic Add
            var promotion_html = '<tr><td><input type = "text" class = "form-control" name = "promotion_content[]" placeholder = "Description"> </td> <td> <input type = "text" class = "form-control" name = "promotion_objective[]" placeholder =  "Objective"> </td> <td> <input type = "number" class = "form-control" name = "promotion_min_cost[]" placeholder = "Min. Cost"> </td> <td> <input type = "number" class = "form-control" name = "promotion_max_cost[]" placeholder = "Max. Cost" > </td> <td > <input type = "text" class = "form-control" name = "promotion_target[]" placeholder = "Target"> </td> <td><input type="button" class="fa btn btn-success" id="promotion_add" name="add_promotion_plan" value="&#xf067"> <input type="button" id="promotion_remove" class="fa btn btn-danger" name="remove_promotion_plan" value = "&#xf00d"></td> </tr>';

            var promotion_i = 1;

            $('#promotion_plan').on("click", "#promotion_add", function() {
                if (promotion_i < max) {
                    $(this).closest('tr').after(promotion_html);
                    promotion_i++;
                }
            });
            $('#promotion_plan').on("click", "#promotion_remove", function() {
                $(this).closest('tr').remove();
                promotion_i--;
            });

            // ROI Plan Dynamic Add
            var roi_html = '<tr><td><select class="form-control" name="roi_month[]"><?php echo getMonthName() ?></select></td><td><input type="text" class="form-control" name="roi_expense[]" placeholder="Expense"></td><td><input type="text" class="form-control" name="roi_conversion[]" placeholder="Conversion"></td><td><input type="text" class="form-control" name="roi_sales_rate[]" placeholder="Sales Rate (%)"></td><td><input type="text" class="form-control" name="roi_total_sale[]" placeholder="Total Sales Amount"></td><td><input type="text" class="form-control" name="roi_return_type[]" placeholder="Return Type"></td><td><input type="button" class="fa btn btn-success" id="roi_add" name="add_roi" value="&#xf067"> <input type="button" id="roi_remove" class="fa btn btn-danger" name="remove_promotion_plan" value = "&#xf00d"></td> </tr>';

            var roi_i = 1;

            $('#roi').on("click", "#roi_add", function() {
                if (roi_i < max) {
                    $(this).closest('tr').after(roi_html);
                    roi_i++;
                }
            });
            $('#roi').on("click", "#roi_remove", function() {
                $(this).closest('tr').remove();
                roi_i--;
            });

        });
    </script>
</body>

</html>