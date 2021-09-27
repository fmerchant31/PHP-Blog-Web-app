<?php
require_once('Databases.php');
class Comment extends Databases
{
  public function AddComment($username, $id)
  {
    $comment = stripcslashes($_POST['comment']);
    $addC = mysqli_query($this->con, "Insert into comment (username,comment,post_id) VALUES ('$username','$comment','$id')");
    return $addC;
  }
  public function ShowComment($id)
  {
    $showC = mysqli_query($this->con, "SELECT * from comment where post_id=$id");
    return $showC;
  }
  public function DeleteComment($id)
  {
    $qr4 = mysqli_query($this->con, "DELETE FROM comment WHERE id='$id'");
    return $qr4;
  }
}
