<div class="col-lg-12">
    <div class="card card-outline card-primary">
        <div class="card-header">

        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mx-auto mb-5">
                    <div class="row">
                        <?php
                        include 'connection.php';
                        if (isset($_SESSION['login_id'])) {
                            $user_id = $_SESSION['login_id'];

                            // Fetch comments for the current user
                            $comments_query = "SELECT c.comment, c.date_created, u.fullname
                                  FROM comments c
                                  JOIN users u ON c.user_id = u.id
                                  WHERE c.user_id = ?";
                            $comments_stmt = $conn->prepare($comments_query);
                            $comments_stmt->bind_param("i", $user_id);
                            $comments_stmt->execute();
                            $comments_result = $comments_stmt->get_result();

                            if ($comments_result->num_rows > 0) {
                                while ($comment_row = $comments_result->fetch_assoc()) {
                                    $comment = $comment_row['comment'];
                                    $date_created = $comment_row['date_created'];
                                    $full_name = $comment_row['fullname'];

                                    // Generate a card for each comment
                                    echo '<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-3 cat-items">';
                                    echo '<div class="card rounded-0 card-outline card-primary  h-100">';
                                    echo '<div class="card-img-top "></div>';
                                    echo '<div class="card-body rounded-0">';
                                    echo '<div class="container-fluid">';
                                    echo '<div>';
                                    echo '<h5 class="card-title">' . $full_name . '</h5>' . '<br>' . '<br>';
                                    echo '<div class="truncate">';
                                    echo $comment;
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '<div class="card-footer text-right">';
                                    echo '<div class="row justify-content-end">';
                                    echo '<h5 class="footer-title">' . '<b>' . 'Posted on:' . '</b>' . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $date_created . '<br>'; // Date created in card footer
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                            } else {
                                echo '<p>No comments available.</p>';
                            }
                            $comments_stmt->close();
                        } else {
                            echo 'User not logged in.';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>