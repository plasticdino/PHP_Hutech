
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
             <label>Order ID</label>
             <input type="text" name="orderingid" id="txtedit_orderingid" class="form-control" placeholder="Order ID" readonly="true">
           </div>
           <div class="form-group">
             <label>User ID</label>
             <input type="text" name="userid" id="txtedit_userid" class="form-control" placeholder="User ID" readonly="true">
             </textarea>
           </div>
           <div class="form-group">
             <label>Order date</label>
             <input type="text" name="orderdate" id="txtedit_orderdate" class="form-control" placeholder="Order date" readonly="true">
             </textarea>
           </div>
           <div class="form-group">
                <label>State</label>
                <br>
                <input type="radio" id="rdbedit_done" name="state" value="1">
                <label for="rdbdone">Done</label>
                <input type="radio" id="rdbedit_processing" name="state" value="0">
                <label for="rdbprocessing">Processing</label><br>
           </div>
       </div>
       <div class="modal-footer">
       <button type="submit" name="update_order" class="btn btn-secondary">EDIT</button>
         <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
       </div>
     </form>
   </div>
 </div>
</div>
