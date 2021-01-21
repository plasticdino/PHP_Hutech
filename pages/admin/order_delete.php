
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
             <label>Order ID</label>
             <input type="text" name="orderingid" id="txtdelete_orderingid" class="form-control" placeholder="Order ID" readonly="true">
           </div>
           <div class="form-group">
             <label>User ID</label>
             <input type="text" name="userid" id="txtdelete_userid" class="form-control" placeholder="User ID" readonly="true">
             </textarea>
           </div>
           <div class="form-group">
             <label>Order date</label>
             <input type="text" name="orderdate" id="txtdelete_orderdate" class="form-control" placeholder="Order date" readonly="true">
             </textarea>
           </div>
           <div class="form-group">
                <label>State</label>
                <br>
                <input type="radio" id="rdbdelete_done" name="state" value="1" disabled>
                <label for="rdbdone">Done</label>
                <input type="radio" id="rdbdelete_processing" name="state" value="0" disabled>
                <label for="rdbprocessing">Processing</label><br>
           </div>
       </div>
       <div class="modal-footer">
       <button type="submit" name="delete_order" class="btn btn-secondary">DELETE</button>
         <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
       </div>
     </form>
   </div>
 </div>
</div>
