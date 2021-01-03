
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title">DELETE</h5>
       <button type="button" class="close" data-dismiss="modal" >
         <span>&times</span>
       </button>
     </div>
     <form action="" method="POST"  enctype="multipart/form-data">
       <div class="modal-body">
           <div class="form-group">
             <label>ID</label>
             <input type="text" name="delete_product_id" id="delete_product_id" class="form-control" placeholder="ID" readonly="true">
           </div>
           <div class="form-group">
             <label>Product name</label>
             <textarea type="text" name="product_name" id="delete_product_name" class="form-control" placeholder="Product Name" readonly="true">
             </textarea>
           </div>
           <div class="form-group">
             <label>Product description</label>
             <textarea rows='4' type="text" name="product_description" id="delete_product_description" class="form-control" placeholder="Product Description" readonly="true">
             </textarea>
           </div>
           <div class="form-group">
             <label>Product Image</label>
             </br>
             <img class="img-responsive py-1 img-fluid" id="show_delete_product_image" alt="Image" src="#">
           </div>
       </div>
       <div class="modal-footer">
       <button type="submit" name="delete_product" class="btn btn-primary">DELETE</button>
         <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
       </div>
     </form>
   </div>
 </div>
</div>
