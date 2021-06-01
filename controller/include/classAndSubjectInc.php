<?
$list_school_class=listSchoolClassDtls($school_id,"order by c.ord");
/*echo "<pre>";
print_r($list_school_clas);
echo "</pre>";*/
?>
<div class="content-wrapper ss-wrapper"> 
        <!-- Content Header (Page header) -->
        <? require_once("breadCrumb.php")?>
        <!-- /.content-header --> 
        
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row ss-row-2">
                    <div class="col-12 p-0">
                        <div class="card card-primary ss-card-main"> 
                            <!-- /.card-header -->
                            <div class="card-header ss-card-header">
                                <h3 class="card-title">Add Classes and Sections</h3>
                            </div>
                            <!-- form start -->
                            <div class="card-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="text-center col-sm-12">
                                            <button type="button" class="btn-outlined btn btn-lg btn-success ss-sub-btn1" style="background: rgb(232, 255, 229); color: black; border-radius: 5px;" data-toggle="modal" data-target="#modal-default12">
                                            <div class="flex">
                                                <div>Add New Class&nbsp;&nbsp;&nbsp;<i class="fas fa-plus"></i></div>
                                            </div>
                                            </button>
                                        </div>
                                        <div class="col-sm-12 mt-2">
										<?
										foreach($list_school_class as $school_class)
										{
											$list_section=$list_subject="";
											$list_section=listClassSection($school_id,$school_class['class_id']);	
											$list_subject=listClassSubject($school_id,$school_class['class_id']);
										?>
                                            <div class="row" style="background: rgb(232, 255, 229);">
                                                <div class="col-sm-2 ss-cs-lh">
                                                    <div class="checkbox" style="color: rgb(48, 62, 82); font-size: 16px;">
                                                        <label title="">
                                                            <input type="checkbox" value="<?=$school_class['class_id']?>">
                                                            <?=$school_class['class_name']?></label>
                                                    </div>
                                                </div>
                                                <div div class="col-sm-10 ss-cs-rh" style="">
                                                    <div role="toolbar" class="btn-toolbar">
<button type="button" class="btn-outlined btn btn-sm btn-success edit-class" style="background: white; color: black; border-radius: 5px;" data-ssi="<?=$school_class['school_class_id']?>" data-snm="<?=$school_class['class_name']?>">Edit Class&nbsp;&nbsp;<i class="fas fa-pencil-alt"></i></button>
<button type="button" class="btn-outlined btn btn-sm btn-success add-sec" style="background: white; color: black; border-radius: 5px;" data-ci="<?=$school_class['class_id']?>" data-cnm="<?=$school_class['class_name']?>">Add Sections&nbsp;&nbsp;<i class="fas fa-plus"></i></button>
<!--<? if(count($list_subject)<=0) {?>disabled<?}?>-->
<button  type="button" class="btn-outlined btn btn-sm btn-success edit-subject-modal" data-ci="<?=$school_class['class_id']?>" data-cnm="<?=$school_class['class_name']?>" data-count-subject="<?=count($list_subject)?>" style="background: white; color: black; border-radius: 5px;">Edit Subjects&nbsp;&nbsp;<i class="fas fa-pencil-alt"></i></button>
<button type="button" class="btn-outlined btn btn-sm btn-danger del_class" style="background: white; border-radius: 5px; color: rgb(217, 83, 79);" data-ci="<?=$school_class['class_id']?>">Delete Class&nbsp;&nbsp;<i class="far fa-trash-alt"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ss-parent-cont-class" style="">
                                                <div class="flex" style="justify-content: space-between; padding: 10px 0px 20px;">
                                                    <div><b>Section and Subjects</b></div>
                                                </div>
											<?
											if(count($list_section)>0)
											{
												foreach($list_section as $section)
												{
											?>
                                                <div class="row ss-sc-row" style="">
                                                    <div class="ss-lh-cd-sub1-sc" style="">
                                                        <div style="border: 1px solid rgba(109, 109, 109, 0.18); border-radius: 5px; padding: 0px 10px; min-width: 130px;">
                                                            <div class="checkbox" style="padding: 0px; margin: 0px;">
                                                                <label title="" class="ss-sec-label-sc" >
                                                                    <input type="checkbox">
                                                                    <?=$section['section']?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ss-lh-cd-sub2-sc" style="">
                                                        <div class="ss-sub-bxcont" style="">
                                                            <div class="row" style="flex-wrap: wrap;min-height: 17px;">
                                                              
<?
foreach($list_subject as $subject)
{
	if(checkOptionalOrGradeSubject($section['school_class_section_id'],$school_id,$subject['school_subject_id'],"school_subject_option"))
	{
	?>
		<div class="subject-box subject-op col-auto row" style="">
			<div class="ss-sub-name" style=""><?=$subject['subject_name']?></div>
			<div class="ss-sub-del-btn" style=""><button class="subject-remove-icon" style=""><i class="fas fa-times"></i></button></div>
			<div class="subject-op-ext" style=""><span class="subject-op-ext-txt" style="">OP</span></div>
		</div>
	<?
	}
	else if(checkOptionalOrGradeSubject($section['school_class_section_id'],$school_id,$subject['school_subject_id'],"school_subject_graded"))
	{
	?>
		<div class="subject-box subject-gd col-auto row" style="">
			<div class="ss-sub-name" style=""><?=$subject['subject_name']?></div>
			<div class="ss-sub-del-btn" style=""><button class="subject-remove-icon" style=""><i class="fas fa-times"></i></button></div>
			<div class="subject-gd-ext" style=""><span class="subject-gd-ext-txt" style=""><img src="images/SVG/grade.svg" alt=""></span></div>
		</div>															
	<?
	}
	else
	{
	?>
	<div class="subject-box col-auto row" style="">
		<div class="ss-sub-name" style=""><?=$subject['subject_name']?></div>
		<div class="ss-sub-del-btn" style=""><button class="subject-remove-icon" style=""><i class="fas fa-times"></i></button></div>
	</div>	
											
<?
	}
}
?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ss-action-btn-cont">
                                                        <div class="ss-btn-wrapper-sc">
<button class="subject-action-button shadow-sm subject_options" data-ci="<?=$school_class['class_id']?>" data-sci="<?=$section['school_class_section_id']?>">
	<i class="fas fa-list-ul"></i>&nbsp;&nbsp; Subjects Options
</button>
                                                        </div>
                                                        <div class="ss-btn-wrapper-sc">
                                                        <button class="subject-action-button shadow-sm" id="sc-drop1" data-toggle="dropdown"><i class="far fa-eye"></i>&nbsp;&nbsp; View Syllabus</button>
                                                            <div class="dropdown-menu" aria-labelledby="sc-drop1">
                                                                    <div class="dropdown-item ss-dp-sc-item" data-target="#modal-default11" data-toggle="modal"> Mathematics</div>
                                                            </div>
                                                        </div>    
                                                        <div class="ss-btn-wrapper-sc">     
                                                        <button class="subject-action-button shadow-sm" id="sc-drop2" data-toggle="dropdown"><i class="fas fa-chevron-down"></i>&nbsp;&nbsp;More</button>
                                                            <div class="dropdown-menu" aria-labelledby="sc-drop1">
<div class="dropdown-item ss-dp-sc-item edit_sec" data-seci="<?=$section['school_class_section_id']?>" data-sec="<?=$section['section']?>" data-ci="<?=$school_class['class_id']?>" data-cnm="<?=$school_class['class_name']?>">&nbsp;<i class="fas fa-pencil-alt"></i>&nbsp;&nbsp;&nbsp;Edit Section</div>
                                                                    <!--<hr style="margin: 2px;">
                                                                    <div class="dropdown-item ss-dp-sc-item" data-toggle="modal" data-target="#modal-default7">&nbsp;<i class="fas fa-pencil-alt"></i>&nbsp;&nbsp;&nbsp;Edit Subjects</div>
                                                                    <hr style="margin: 2px;">
                                                                    <div class="dropdown-item ss-dp-sc-item" data-toggle="modal" data-target="#modal-default10">&nbsp;<i class="fas fa-paperclip"></i>&nbsp;&nbsp;&nbsp;Assign Syllabus</div>
                                                                    <hr style="margin: 2px;">
                                                                    <div class="dropdown-item ss-dp-sc-item">&nbsp;<i class="far fa-trash-alt"></i>&nbsp;&nbsp;&nbsp;Delete Item</div>-->
                                                            </div>
                                                        </div>     
                                                    </div>
                                                </div>
											<?
												}
											}
											?>  
                                        </div>
										<?
										}
										?>
                            	</div>
                            <br>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>