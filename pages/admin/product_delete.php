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
             <textarea type="text" id="delete_product_name" class="form-control" placeholder="Product Name" readonly="true">
             </textarea>
           </div>
           <div class="form-group">
             <label>Product price</label>
             <textarea type="text" id="delete_product_price" class="form-control" placeholder="Product Price" readonly="true">
             </textarea>
           </div>
           <div class="form-group">
             <label>Product storage</label>
             <textarea type="text" id="delete_product_storage" class="form-control" placeholder="Product Storage" readonly="true">
             </textarea>
           </div>
           <div class="form-group">
             <label>Category type</label>
             <textarea type="text" id="delete_category_id" class="form-control" placeholder="Category Type" readonly="true">
             </textarea>
           </div>
           <div class="form-group">
             <label>Product description</label>
             <textarea rows='4' type="text" id="delete_product_description" class="form-control" placeholder="Product Description" readonly="true">
             </textarea>
           </div>
           <div class="form-group">
             <label>Product image</label>
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
