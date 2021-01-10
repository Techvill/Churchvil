<?php include('../include/follower_header.php'); ?>

<!--actual area-->

<div class="respectMArgin">
    <div class="container">

        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">

                    <small class="text-muted">Recent</small>
                </div>

            </a>
            <?php

            $table = "notification";
            $data = "notification.notification_id,notification.details,notification.status,notification.moment";
            $condition = " notification.minister='$myIdentity'";
            $myData = $backend->conditionTableIN($data, $table, $condition);
            while ($row = $myData->fetch(PDO::FETCH_ASSOC)) {
                $notification_id = $row['notification_id'];
                $details = $row['details'];
                $status = $row['status'];
                $moment = $row['moment'];
                $newdate = $backend->time_ago($moment);

                $table_name = "notification";
                $idC = "notification_id= ?";
                $status = "viewed";
                $data = array($status, $notification_id);
                $cols = array("status");
                $message = "empty";
                $commit = $backend->newUpdate($table_name, $idC, $cols, $data, $message);
                ?>
                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">

                        <small class="text-muted"><?php echo $newdate; ?></small>
                    </div>
                    <p class="mb-1"><?php echo $details; ?> </p>
                    <small class="text-muted">View profile.</small>
                </a>

            <?php } ?>

        </div>


    </div>
</div>
<!--end actual area-->
</div>
<!--Content area----------->


</div> <!-- End Row -->


<hr>
<?php include('../include/user_footer.php'); ?>