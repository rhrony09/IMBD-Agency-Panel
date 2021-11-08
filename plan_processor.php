<?php
include 'includes/session.php';
include 'includes/header.php';
if (isset($_POST['create'])) : ?>

    <?php
    //grab client info
    $business_name = $_POST['business_name'];
    $business_email = $_POST['business_email'];
    $sender_email = $_POST['sender_email'];
    $business_number = $_POST['business_number'];
    $business_address = $_POST['business_address'];

    //grab object info
    $marketing_obj = "";
    if (isset($_POST['objective'])) {
        $marketing_objective = $_POST['objective'];
        foreach ($marketing_objective as $key => $value) {
            $marketing_obj .= '<i style="font-size: 12px" class="fa fa-dot-circle-o" aria-hidden="true"></i> ' . $value . " ";
        }
    }

    //grab duration info
    $duration = $_POST['duration'];
    $duration_for = $_POST['for'];

    //grab SWOT info
    $swot_strength = $_POST['swot_strength'];
    $swot_weakness = $_POST['swot_weakness'];
    $swot_opportunity = $_POST['swot_opportunity'];
    $swot_threat = $_POST['swot_threat'];

    //grab the content plan data
    $plan_content = $_POST["plan_content"];
    $plan_objective = $_POST["plan_objective"];
    $plan_min_cost = $_POST["plan_min_cost"];
    $plan_max_cost = $_POST["plan_max_cost"];
    $plan_approx_time = $_POST["plan_approx_time"];

    $content_plan_data = [];

    foreach ($plan_content as $key => $value) {
        $content_plan_data[$key]['content'] = $value;
    }
    foreach ($plan_objective as $key => $value) {
        $content_plan_data[$key]['objective'] = $value;
    }
    foreach ($plan_min_cost as $key => $value) {
        $content_plan_data[$key]['min_cost'] = $value;
    }
    foreach ($plan_max_cost as $key => $value) {
        $content_plan_data[$key]['max_cost'] = $value;
    }
    foreach ($plan_approx_time as $key => $value) {
        $content_plan_data[$key]['approx_time'] = $value . " Days";
    }

    //grab the content details data
    $details_content = $_POST["details_content"];
    $details_description = $_POST["details_description"];
    $details_required_resources = $_POST["details_required_resources"];

    $content_details_data = [];

    foreach ($details_content as $key => $value) {
        $content_details_data[$key]['details_content'] = $value;
    }
    foreach ($details_description as $key => $value) {
        $content_details_data[$key]['details_description'] = $value;
    }
    foreach ($details_required_resources as $key => $value) {
        $content_details_data[$key]['details_required_resources'] = $value;
    }

    //grab the content mapping data
    $content_mapping_data = [];
    if (isset($_POST["mapping_platforms"])) {
        $mapping_content = $_POST["mapping_content"];
        $mapping_date = $_POST["mapping_date"];
        $mapping_platforms = $_POST["mapping_platforms"];
        $mapping_duration = $_POST["mapping_duration"];

        foreach ($mapping_content as $key => $value) {
            $content_mapping_data[$key]['mapping_content'] = $value;
        }
        foreach ($mapping_date as $key => $value) {
            $mapping_date_arr = date_create($value);
            $mapping_date_formated = date_format($mapping_date_arr, "d M, Y");
            $content_mapping_data[$key]['mapping_date'] = $mapping_date_formated;
        }
        foreach ($mapping_platforms as $key => $value) {
            $content_mapping_data[$key]['mapping_platforms'] = $value;
        }
        foreach ($mapping_duration as $key => $value) {
            $content_mapping_data[$key]['mapping_duration'] = $value . " Days";
        }
    }

    //grab the promotional plan data
    $promotional_content = $_POST["promotion_content"];
    $promotion_objective = $_POST["promotion_objective"];
    $promotion_min_cost = $_POST["promotion_min_cost"];
    $promotion_max_cost = $_POST["promotion_max_cost"];
    $promotion_target = $_POST["promotion_target"];

    $promotional_plan_data = [];

    foreach ($promotional_content as $key => $value) {
        $promotional_plan_data[$key]['promotion_content'] = $value;
    }

    foreach ($promotion_objective as $key => $value) {
        $promotional_plan_data[$key]['promotion_objective'] = $value;
    }

    foreach ($promotion_min_cost as $key => $value) {
        $promotional_plan_data[$key]['promotion_min_cost'] = $value;
    }

    foreach ($promotion_max_cost as $key => $value) {
        $promotional_plan_data[$key]['promotion_max_cost'] = $value;
    }

    foreach ($promotion_target as $key => $value) {
        $promotional_plan_data[$key]['promotion_target'] = $value;
    }

    //grab the roi data
    $roi_data = [];
    if (isset($_POST["roi_month"])) {
        $roi_month = $_POST["roi_month"];
        $roi_expense = $_POST["roi_expense"];
        $roi_conversion = $_POST["roi_conversion"];
        $roi_sales_rate = $_POST["roi_sales_rate"];
        $roi_total_sale = $_POST["roi_total_sale"];
        $roi_return_type = $_POST["roi_return_type"];

        foreach ($roi_month as $key => $value) {
            $roi_data[$key]['roi_month'] = $value;
        }

        foreach ($roi_expense as $key => $value) {
            $roi_data[$key]['roi_expense'] = $value;
        }

        foreach ($roi_conversion as $key => $value) {
            $roi_data[$key]['roi_conversion'] = $value;
        }

        foreach ($roi_sales_rate as $key => $value) {
            $roi_data[$key]['roi_sales_rate'] = $value . "%";
        }

        foreach ($roi_total_sale as $key => $value) {
            $roi_data[$key]['roi_total_sale'] = $value . " BDT";
        }

        foreach ($roi_return_type as $key => $value) {
            $roi_data[$key]['roi_return_type'] = $value;
        }
    }

    //function for isset
    function print_data($var)
    {
        if ($var != null) {
            echo $var;
        } else {
            echo "n/a";
        }
    }
    ?>

    <body class="hold-transition skin-blue sidebar-mini">
        <link rel="stylesheet" href="./includes/pdf.css">
        <div class="wrapper">

            <?php
            include 'includes/navbar.php';
            include 'includes/menubar.php';
            ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-body">
                                    <!-- Start Header and Business Details -->
                                    <div class="head-section">
                                        <div class="logo"><img src="includes/logo_white.png" alt="" srcset=""></div>
                                        <div class="business-info">
                                            <h3>Marketing Plan for <?php print_data($business_name) ?></h3>
                                            <div class="col-xs-3">
                                                <p>Business Name: <?php print_data($business_name) ?></p>
                                            </div>
                                            <div class="col-xs-3">
                                                <p>Business Email: <?php print_data($business_email) ?></p>
                                            </div>
                                            <div class="col-xs-3">
                                                <p>Contact Number: <?php print_data($business_number) ?></p>
                                            </div>
                                            <div class="col-xs-3">
                                                <p>Sender Email: <?php print_data($sender_email) ?></p>
                                            </div>
                                            <div class="text-left col-xs-6">
                                                <p><strong>Business Address:</strong><br><?php print_data($business_address) ?></p>
                                            </div>
                                            <div class="text-left col-xs-4">
                                                <p><strong>Core Marketing Objective:</strong><br>
                                                    <?php print_data($marketing_obj) ?></p>
                                            </div>
                                            <div class="text-left col-xs-2">
                                                <p><strong>Plan For:</strong><br>
                                                    <?php if (!empty($duration && $duration_for)) {
                                                        echo $duration . " " . $duration_for;
                                                    } ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Header and Business Details -->
                                    <!-- Start SWOT Analysis -->
                                    <div class="swot_analysis">
                                        <h3 class="text-center heading">SWOT Analysis</h3>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th style="width: 50%;">Straight</th>
                                                <th style="width: 50%;">Weakness</th>
                                            </tr>
                                            <tr>
                                                <td><?php print_data($swot_strength) ?></td>
                                                <td><?php print_data($swot_weakness) ?></td>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%;">Opportunities</th>
                                                <th style="width: 50%;">Threats</th>
                                            </tr>
                                            <tr>
                                                <td><?php print_data($swot_opportunity) ?></td>
                                                <td><?php print_data($swot_threat) ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <!-- End SWOT Analysis -->
                                    <!-- Start Content Plan with Details -->
                                    <div class="content_plan">
                                        <h3 class="text-center heading">Content Plan with Details</h3>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th width="41%">Content</th>
                                                <th width="25%">Objective</th>
                                                <th class="text-center" width="11%">Min. Cost</th>
                                                <th class="text-center" width="11%">Max. Cost</th>
                                                <th class="text-center" width="12%">Approx. Time</th>
                                            </tr>
                                            <?php
                                            //content plan total count
                                            $content_plan_min_total = 0;
                                            $content_plan_max_total = 0;
                                            foreach ($content_plan_data as $key => $value) : ?>
                                                <tr>
                                                    <td><?php print_data($value['content']) ?></td>
                                                    <td><?php print_data($value['objective']) ?></td>
                                                    <td class="text-center"><?php
                                                                            if ($value['min_cost'] != "") {
                                                                                $content_plan_min_total += $value['min_cost'];
                                                                                print_data($value['min_cost']);
                                                                            } else {
                                                                                echo "0";
                                                                            }
                                                                            echo " BDT" ?></td>
                                                    <td class="text-center"><?php
                                                                            if ($value['min_cost'] != "") {
                                                                                $content_plan_max_total += $value['max_cost'];
                                                                                print_data($value['max_cost']);
                                                                            } else {
                                                                                echo "0";
                                                                            }
                                                                            echo " BDT" ?></td>
                                                    <td class="text-center"><?php print_data($value['approx_time']) ?></td>
                                                </tr>
                                            <? endforeach ?>
                                            <tr>
                                                <th colspan="2" class="text-center">
                                                    Total
                                                </th>
                                                <th class="text-center">
                                                    <?php echo $content_plan_min_total . " BDT" ?>
                                                </th>
                                                <th class="text-center">
                                                    <?php echo $content_plan_max_total . " BDT" ?>
                                                </th>
                                                <th class="text-center">-</th>
                                            </tr>
                                        </table>
                                    </div>
                                    <!-- End Content Plan with Details -->
                                    <!-- Start Content Details -->
                                    <div class="content_details">
                                        <h3 class="text-center heading">Content Details</h3>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th width="7%" class="text-center">S/N</th>
                                                <th width="35%">Content Title</th>
                                                <th width="30%">Description</th>
                                                <th width="28%">Required Resources</th>
                                            </tr>
                                            <?php
                                            foreach ($content_details_data as $key => $value) : ?>
                                                <tr>
                                                    <td class="text-center"><?php echo ++$key ?></td>
                                                    <td><?php print_data($value['details_content']) ?></td>
                                                    <td><?php print_data($value['details_description']) ?></td>
                                                    <td><?php print_data($value['details_required_resources']) ?></td>
                                                </tr>
                                            <? endforeach ?>

                                        </table>
                                    </div>
                                    <!-- End Content Details -->
                                    <!-- Start Content Mapping -->
                                    <div class="content_details">
                                        <h3 class="text-center heading">Content Mapping</h3>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th width="7%" class="text-center">S/N</th>
                                                <th width="42%">Content</th>
                                                <th width="18%" class="text-center">Publishing Date</th>
                                                <th width="18%" class="text-center">Platforms</th>
                                                <th width="15%" class="text-center">Campaign Duration</th>
                                            </tr>
                                            <?php
                                            foreach ($content_mapping_data as $key => $value) : ?>
                                                <tr>
                                                    <td class="text-center"><?php echo ++$key ?></td>
                                                    <td><?php print_data($value['mapping_content']) ?></td>
                                                    <td class="text-center"><?php print_data($value['mapping_date']) ?></td>
                                                    <td class="text-center"><?php print_data($value['mapping_platforms']) ?></td>
                                                    <td class="text-center"><?php print_data($value['mapping_duration']) ?></td>
                                                </tr>
                                            <? endforeach ?>
                                        </table>
                                    </div>
                                    <!-- End Content Mapping -->
                                    <!-- Start Promotion Plan -->
                                    <div class="promotion_plan">
                                        <h3 class="text-center heading">Promotion Plan</h3>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th width="41%">Content</th>
                                                <th width="25%">Objective</th>
                                                <th class="text-center" width="11%">Min. Cost</th>
                                                <th class="text-center" width="11%">Max. Cost</th>
                                                <th class="text-center" width="12%">Target</th>
                                            </tr>
                                            <?php
                                            //Promotion Plan total count
                                            $promotional_plan_min_total = 0;
                                            $promotional_plan_max_total = 0;
                                            foreach ($promotional_plan_data as $key => $value) : ?>
                                                <tr>
                                                    <td><?php print_data($value['promotion_content']) ?></td>
                                                    <td><?php print_data($value['promotion_objective']) ?></td>
                                                    <td class="text-center"><?php
                                                                            if ($value['promotion_min_cost'] != "") {
                                                                                $promotional_plan_min_total += $value['promotion_min_cost'];
                                                                                print_data($value['promotion_min_cost']);
                                                                            } else {
                                                                                echo "0";
                                                                            }
                                                                            echo " BDT" ?>
                                                    </td>
                                                    <td class="text-center"><?php
                                                                            if ($value['promotion_max_cost'] != "") {
                                                                                $promotional_plan_max_total += $value['promotion_max_cost'];
                                                                                print_data($value['promotion_max_cost']);
                                                                            } else {
                                                                                echo "0";
                                                                            }
                                                                            echo " BDT" ?>
                                                    </td>
                                                    <td class="text-center"><?php print_data($value['promotion_target']) ?></td>
                                                </tr>
                                            <? endforeach ?>
                                            <tr>
                                                <th colspan="2" class="text-center">
                                                    Total
                                                </th>
                                                <th class="text-center">
                                                    <?php echo $promotional_plan_min_total . " BDT" ?>
                                                </th>
                                                <th class="text-center">
                                                    <?php echo $promotional_plan_max_total . " BDT" ?>
                                                </th>
                                                <th class="text-center">-</th>
                                            </tr>
                                        </table>
                                    </div>
                                    <!-- End Promotion Plan -->
                                    <!-- Start ROI -->
                                    <div class="roi">
                                        <h3 class="text-center heading">ROI</h3>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th class="text-center">Month</th>
                                                <th class="text-center">Expense</th>
                                                <th class="text-center">Conversion</th>
                                                <th class="text-center">Sales Rate</th>
                                                <th class="text-center">Total Sales</th>
                                                <th class="text-center">Return Type</th>
                                            </tr>
                                            <?php
                                            foreach ($roi_data as $key => $value) : ?>
                                                <tr>
                                                    <td class="text-center"><?php print_data($value['roi_month']) ?></td>
                                                    <td class="text-center"><?php print_data($value['roi_expense']) ?></td>
                                                    <td class="text-center"><?php print_data($value['roi_conversion']) ?></td>
                                                    <td class="text-center"><?php print_data($value['roi_sales_rate']) ?></td>
                                                    <td class="text-center"><?php print_data($value['roi_total_sale']) ?></td>
                                                    <td class="text-center"><?php print_data($value['roi_return_type']) ?></td>
                                                </tr>
                                            <? endforeach ?>
                                        </table>
                                    </div>
                                    <!-- End ROI -->
                                    <div class="pdf-footer">
                                        <h3>IMBD Agency</h3>
                                        <p>A Internet Marketing & Business Development Agency</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <?php include 'includes/footer.php'; ?>
        </div>
        <?php include 'includes/scripts.php'; ?>
    </body>

    </html>
<? else : ?>
    <?php
    $_SESSION['error'] = 'Fill up the form first';
    header('location: plan_create.php');
    ?>
<? endif ?>