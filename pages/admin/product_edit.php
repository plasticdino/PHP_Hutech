
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title">EDIT</h5>
       <button type="button" class="close" data-dismiss="modal" >
         <span>&times</span>
       </button>
     </div>
     <form action="" method="POST"  enctype="multipart/form-data">
       <div class="modal-body">
           <div class="form-group">
             <label>Product Id</label>
             <input type="text" name="product_id" id="product_id" class="form-control" placeholder="ID" readonly="true">
           </div>
           <div class="form-group">
             <label>Product Name</label>
             <textarea type="text" name="product_name" id="product_name" class="form-control" placeholder="Product Name">
             </textarea>
           </div>
           <div class="form-group">
             <label>Product Description</label>
             <textarea rows='4' type="text" name="product_description" id="product_description" class="form-control" placeholder="Product Description">
             </textarea>
           </div>
           <div class="form-group">
             <label>Product Image</label>
             </br>
             <img class="img-responsive py-1 img-fluid" id="show_product_image" alt="Image" src="#">
             <input type="file" class="form-control" id="product_image" onchange="readURL(this);" name="product_image"
              accept=".PNG, .GIF, .JPG">
           </div>
       </div>
       <div class="modal-footer">
       <button type="submit" name="edit_product" class="btn btn-secondary">EDIT</button>
         <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
       </div>
     </form>
   </div>
 </div>
</div>
