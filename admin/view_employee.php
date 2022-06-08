<?php
require_once("../DBConnection.php");
if(isset($_GET['id'])){
$qry = $conn->query("SELECT e.*, d.name as department FROM `employee_list`e inner join department_list d on e.department_id = d.department_id where e.employee_id = '{$_GET['id']}'");
    foreach($qry->fetchArray() as $k => $v){
        $$k = $v;
    }
}
$thumbnail = '../uploads/employees/'.$employee_id.'.png';
?>
<style>
    #uni_modal .modal-footer{
        display:none;
    }
    #employee-image{
        width:calc(100%);
        height:20vh;
        padding-left: 60px;
        object-fit:scale-down;
        border: 5px solid #555;

    }
</style>

<div class="container-fluid" id="employee-details">

                <div>
                    <div>
                        <img src="<?php echo $thumbnail ?>" id="employee-image" alt="Img">
                    </div>
                </div>

  <table class="table">
  <tbody>
    <tr>
      <th class="text-info">Employee Code</th>
      <td class="ps-4"><b><?php echo isset($employee_code) ? $employee_code : '' ?></b></td>
      <th class="text-info">Fullname</th>
      <td class="ps-4"><b><?php echo isset($fullname) ? ucwords($fullname) : '' ?></b></td>



    </tr>
    <tr>
      <th class="text-info">Gender</th>
      <td class="ps-4"><b><?php echo isset($gender) ? $gender : '' ?></b></td>
      <th class="text-info">Date of Birth</th>
      <td class="ps-4"><b><?php echo isset($dob) ? date("M d, Y",strtotime($dob)) : '' ?></b></td>
    </tr>

    <tr>


      <th class="text-info">Contact Number</th>
      <td class="ps-4"><b><?php echo isset($contact) ? $contact : '' ?></b></td>
      <th class="text-info">Address</th>
      <td class="ps-4"><b><?php echo isset($address) ? $address : '' ?></b></td>
    </tr>
    <tr>
      <th class="text-info">Department</th>
      <td class="ps-4"><b><?php echo isset($department) ? $department : '' ?></b></td>
      <th class="text-info">Employee Type</th>
      <td class="ps-4"><b><?php echo isset($type) ? $type : '' ?></b></td>
    </tr>
    <tr>

      <th class="text-info">Email</th>
      <td class="ps-4"><b><?php echo isset($email) ? $email : '' ?></b></td>
      <th class="text-info"></th>
    </tr>

  </tbody>
</table>


            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="row justify-content-end">
            <div class="col-1">
                <div class="btn btn btn-dark btn-sm rounded-0" type="button" data-bs-dismiss="modal">Close</div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        if('<?php echo isset($_GET['borrowed_id']) ?>' == 1){
            $('#uni_modal').on('hidden.bs.modal',function(){
                if($('#uni_modal #employee-details').length > 0)
                uni_modal('Borrowed Details',"view_borrowed.php?id=<?php echo isset($_GET['borrowed_id']) ? $_GET['borrowed_id'] : '' ?>",'large')
            })
        }
    })
    function delete_img($path){
        $('#confirm_modal button').attr('disabled',true)
        $.ajax({
            url:"../Actions.php?a=delete_img",
            method:"POST",
            data:{path:$path},
            dataType:'json',
            error:err=>{
                console.log(err)
                alert("An error occurred.")
            },
            success:function(resp){
                if(resp.status == 'success'){
                    $('.img-del-btn>.btn[data-path="'+$path+'"]').closest('.img-item').remove()
                    $('#confirm_modal').modal('hide')
                }else{
                    console.log(resp)
                    alert("An error occurred.")
                }
            $('#confirm_modal button').attr('disabled',false)
            }
        })
    }
</script>
