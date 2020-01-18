<!doctype html>
<html lang="en">
<head>
<title>Data Kasir</title>
<link href="css/bootstrap.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>
<body>
 
<div class="container">
  <h2>Data Kasir</h2>
  <p><a href="#" class="btn btn-success" data-target="#ModalAdd" data-toggle="arcademy">Add Data</a></p>      

<table id="mytable" class="table table-bordered">
    <thead>
      <th>No</th>
      <th>Cashier</th>
      <th>Product</th>
      <th>Category</th>
      <th>Price</th>
      <th>Action</th>
    </thead>
<?php
include "koneksi.php";
$data = mysqli_query($koneksi, "SELECT product.*, category.name AS category_name, cashier.name AS cashier_name FROM product
INNER JOIN category ON product.id_category = category.id
INNER JOIN Cashier ON product.id_cashier = cashier.id;");
while($print = mysqli_fetch_array($data)) {
?>
  <tr>
      <td><?php echo $print['id'] ?></td>
      <td><?php echo $print['cashier_name'] ?></td>
      <td><?php echo $print['name'] ?></td>
      <td><?php echo $print['category_name'] ?></td>
      <td><?php echo number_format($print['price'],0,',','.') ?></td>
      <td>
         <a href="#" class='open_modal' id='<?php echo  $print['id']; ?>'>Edit</a>
         <a href="#" onclick="confirm_modal('proses_delete.php?&id=<?php echo  $print['id']; ?>');">Delete</a>
      </td>
  </tr>
 

<?php } ?>
</table>
</div>

<!-- Modal Popup untuk Add--> 
<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Add Data</h4>
        </div>

        <div class="modal-body">
          <form action="proses_save.php" name="modal_popup" enctype="multipart/form-data" method="POST">
            
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Modal Name">Modal Name</label>
                  <input type="text" name="modal_name"  class="form-control" placeholder="Modal Name" required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Description">Description</label>
                   <textarea name="description"  class="form-control" placeholder="Description" required/></textarea>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Date">Date</label>
                  <input type="text" name="date"  class="form-control" plcaceholder="Timestamp" disabled value="Timestamp" required/>
                </div>

              <div class="modal-footer">
                  <button class="btn btn-success" type="submit">
                      Confirm
                  </button>

                  <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                    Cancel
                  </button>
              </div>

              </form>

           

            </div>

           
        </div>
    </div>
</div>

<!-- Modal Popup untuk Edit--> 
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>

<!-- Modal Popup untuk delete--> 
<div class="modal fade" id="modal_delete">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
      </div>
                
      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>



<!-- Javascript untuk popup modal Edit--> 
<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modal").click(function(e) {
      var m = $(this).attr("id");
       $.ajax({
             url: "modal_edit.php",
             type: "GET",
             data : {modal_id: m,},
             success: function (ajaxData){
               $("#ModalEdit").html(ajaxData);
               $("#ModalEdit").modal('show',{backdrop: 'true'});
             }
           });
        });
      });
</script>

<!-- Javascript untuk popup modal Delete--> 
<script type="text/javascript">
    function confirm_modal(delete_url)
    {
      $('#modal_delete').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>

</body>
</html>

  



