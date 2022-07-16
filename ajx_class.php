<?php include ('inc_controlls.php');
$department= $_REQUEST['department'];
$course_det_arr = $COURSE_ARR[$department];
if(isset($_REQUEST['course_name'])){?> 
	<select id="sel_course" name="sel_course" class = "form-control" onchange="search_by_course('<?=$department?>',this.value)" >
	    <option value="0">All</option>
	    <?php    
	    foreach($course_det_arr as $course){?>
	        <option <?php if($_REQUEST['course_name']==$course) echo " selected";?>><?=$course?></option>
	    <?php } ?>
	</select>
<?php } else {?>
	<select id="sel_course" name="sel_course" class = "form-control" onchange="search_by_course('<?=$department?>',this.value)" required>
	    <option value="">Select</option>
	    <?php    
	    foreach($course_det_arr as $course){?>
	        <option><?=$course?></option>
	    <?php } ?>
	</select>
<?php }?>