<?php
session_start();
if(!isset($_SESSION["librarian"]))
{
    ?>
    <script type="text/javascript">
     window.location="login.php";
    </script>
    <?php
}
include "connection.php";
include "header.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Add Books</h3>
                    </div>

                   
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Add Books Info</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <form name="form1"  action="" method="post" class="col-lg-6" enctype="multipart/form-data">
                          <table class="table table-bordered">
                          <tr>
                          <td><input type="text"  class="form-control" name="booksname" placeholder="books_name" required=""></td>
                          </tr>
                          <tr>
                          <td>Books Image<input type="file"  name="f1"   required=""></td>
                          </tr>
                          <tr>
                          <td><input type="text"  class="form-control" name="bauthorname" placeholder="books_author_name" required=""></td>
                          </tr>
                          <tr>
                          <td><input type="text"  class="form-control" name="pname" placeholder="publication_name" required=""></td>
                          </tr>
                          <tr>
                          <td><input type="text"  class="form-control" name="bpurchasedt" placeholder="books_purchase_date" required=""></td>
                          </tr>
                          <tr>
                          <td><input type="text"  class="form-control" name="bprice" placeholder="books_price" required=""></td>
                          </tr>
                          <tr>
                          <td><input type="text"  class="form-control" name="bqty" placeholder="books_quantity" required=""></td>
                          </tr>
                          <tr>
                          <td><input type="text"  class="form-control" name="aqty" placeholder="available_quantity" required=""></td>
                          </tr>
                          <tr>
                          <td><input type="submit"  class="btn btn-default submit" name="submit1" value="insert books details" style="background-color:black; color:white;"></td>
                          </tr>
                          <table>
                          </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
        <?php
        if(isset($_POST["submit1"]))
        {
            $tm=md5(time());
            $fnm=$_FILES["f1"]["name"];
            $dst="./books_image/".$tm.$fnm;
            $dst1="books_image/".$tm.$fnm;
            move_uploaded_file($_FILES["f1"]["tmp_name"],$dst);
            mysqli_query($link,"insert into add_books values('','$_POST[booksname]','$dst1','$_POST[bauthorname]','$_POST[pname]','$_POST[bpurchasedt]','$_POST[bprice]','$_POST[bqty]','$_POST[aqty]',' $_SESSION[librarian]')");
            ?>
            <script type="text/javascript">
            alert("Books inserted successfully");
            </script>
            <?php
        }
        ?>

<?php
include "footer.php"
?>
