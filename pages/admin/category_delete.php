
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
             <input type="text" name="delete_category_id" id="delete_category_id" class="form-control" placeholder="ID" readonly="true">
           </div>
           <div class="form-group">
             <label>Category name</label>
             <textarea type="text" name="category_name" id="delete_category_name" class="form-control" placeholder="Category Name" readonly="true">
             </textarea>
           </div>
           <div class="form-group">
             <label>Category description</label>
             <textarea rows='4' type="text" name="category_description" id="delete_category_description" class="form-control" placeholder="Category Description" readonly="true">
             </textarea>
           </div>
           <div class="form-group">
             <label>Category Image</label>
             </br>
             <img class="img-responsive py-1 img-fluid" id="show_delete_category_image" alt="Image" src="#">
           </div>
       </div>
       <div class="modal-footer">
       <button type="submit" name="delete_category" class="btn btn-primary">DELETE</button>
         <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
       </div>
     </form>
   </div>
 </div>
</div>
