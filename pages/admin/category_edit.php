
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
             <label>ID</label>
             <input type="text" name="category_id" id="category_id" class="form-control" placeholder="ID" readonly="true">
           </div>
           <div class="form-group">
             <label>Category name</label>
             <textarea type="text" name="category_name" id="category_name" class="form-control" placeholder="Category Name">
             </textarea>
           </div>
           <div class="form-group">
             <label>Category description</label>
             <textarea rows='4' type="text" name="category_description" id="category_description" class="form-control" placeholder="Category Description">
             </textarea>
           </div>
           <div class="form-group">
             <label>Category Image</label>
             </br>
             <img class="img-responsive py-1 img-fluid" id="show_category_image" alt="Image" src="#">
             <input type="file" class="form-control" id="category_image" onchange="readURL(this);" name="category_image"
              accept=".PNG, .GIF, .JPG">
           </div>
       </div>
       <div class="modal-footer">
       <button type="submit" name="update_category" class="btn btn-secondary">EDIT</button>
         <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
       </div>
     </form>
   </div>
 </div>
</div>
