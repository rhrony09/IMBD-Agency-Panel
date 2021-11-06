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
    if (isset($_POST['objeobjectivect_name'])) {
        $objective = $_POST['objective'];
        $marketing_object = "";

        foreach ($objective as $key => $value) {
            $marketing_object .= $value . ",";
        }
    }


    //grab duration info
    $duration = $_POST['duration'];
    $duration_for = $_POST['for'];

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
        $content_plan_data[$key]['approx_time'] = $value;
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
    if (isset($_POST["mapping_platforms"])) {
        $mapping_content = $_POST["mapping_content"];
        $mapping_date = $_POST["mapping_date"];
        $mapping_platforms = $_POST["mapping_platforms"];
        $mapping_duration = $_POST["mapping_duration"];

        $content_mapping_data = [];

        foreach ($mapping_content as $key => $value) {
            $content_mapping_data[$key]['mapping_content'] = $value;
        }
        foreach ($mapping_date as $key => $value) {
            $content_mapping_data[$key]['mapping_date'] = $value;
        }
        foreach ($mapping_platforms as $key => $value) {
            $content_mapping_data[$key]['mapping_platforms'] = $value;
        }
        foreach ($mapping_duration as $key => $value) {
            $content_mapping_data[$key]['mapping_duration'] = $value;
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
    if (isset($_POST["roi_month"])) {
        $roi_month = $_POST["roi_month"];
        $roi_expense = $_POST["roi_expense"];
        $roi_conversion = $_POST["roi_conversion"];
        $roi_sales_rate = $_POST["roi_sales_rate"];
        $roi_total_sale = $_POST["roi_total_sale"];
        $roi_return_type = $_POST["roi_return_type"];

        $roi_data = [];

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
            $roi_data[$key]['roi_sales_rate'] = $value;
        }

        foreach ($roi_total_sale as $key => $value) {
            $roi_data[$key]['roi_total_sale'] = $value;
        }

        foreach ($roi_return_type as $key => $value) {
            $roi_data[$key]['roi_return_type'] = $value;
        }
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
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">

                        </div>
                </section>
            </div>
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