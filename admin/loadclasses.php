<?php
require 'includes/functions.php';

if(isset($_POST['onlyactives'])) {
    $classInfo = new ClassInfo;
    $classesResult = $classInfo->getInfo($_POST['onlyactives']);
    $classes = array();
	while($row = mysqli_fetch_array($classesResult)) { $classes[] = $row; }
    echo json_encode($classes);
} else {
	$classInfo = new ClassInfo;
	$classesResult = $classInfo->getInfo(false);
	$classes = array();
	while($row = mysqli_fetch_array($classesResult)) { $classes[] = $row; }
	echo json_encode($classes);
}
	
?>