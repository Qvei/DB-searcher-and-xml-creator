<?php 
session_start();


include "connectClass.php";

if(isset($_SESSION['pars'])){
	$dbhost = $_SESSION['pars'][0]; 
	$dbname = $_SESSION['pars'][1];
	$username =  $_SESSION['pars'][2];
	$password =  $_SESSION['pars'][3];
	$dt->connect($dbhost,$dbname,$username,$password);
	
}

if(isset($_POST['localhost']) && $_POST['dbname'] !== ''){
	unset($_SESSION['pars']);
	$dt->pars($_POST['localhost'],$_POST['dbname'],$_POST['username'],$_POST['pas']);
	$dt->connect($dbhost=$_POST['localhost'],$dbname=$_POST['dbname'],$username=$_POST['username'],$password=$_POST['pas']);
	$das = $db->query("show tables")->fetchAll(PDO::FETCH_NUM);
	$tos = [];
	foreach ($das as $key) {
		$tos .='<option value="'.$key[0].'">'.$key[0].'</option>';
	}
	echo $tos;
}

if(isset($_POST['tabll']) && $_POST['tab']==='tab'){
	$cells1 = $dt->get_cells($base = $_POST['tabll']);
	echo $cells1;
}

if(isset($_POST['selll']) && isset($_POST['tabll'])){
	$sa = $dt->get_c($categ=$_POST['selll'],$base=$_POST['tabll']);
	$asd = [];
	foreach($sa as $f=>$j){ 
    	$asd .= '<option value="'.$j[$categ].'">'.$j[$categ].'</option>';
	}
	echo $asd;
}

if(isset($_POST['tabll']) && isset($_POST['vals'])){
	$_SESSION['check'] = [];
	$_SESSION['table'] = $_POST['tabll'];
	$_SESSION['cat1'] = $_POST['ca1'];
	
		$_SESSION['check'] = $_POST['vals'];
	
	

	
	if(isset($_POST['tabll']) && isset($_POST['vals'])){
	  	$queryd = "SELECT * FROM ".$_SESSION['table']." WHERE ".$_SESSION['cat1']." IN ('".$_SESSION['check'][0]."','".$_SESSION['check'][1]."','".$_SESSION['check'][2]."')";	
	}

	$getfiles = $db->query($queryd);
	$countfiles = $getfiles->rowCount();
	$gototable = $getfiles->fetchAll(PDO::FETCH_ASSOC);
	$ge = $db->query("SELECT * FROM ".$_SESSION['table']." LIMIT 1");
	$fields = array_keys($ge->fetch(PDO::FETCH_ASSOC));
	if ($gototable) {
		global $db;
		foreach($fields as $column_name){
				$name .= '<th>'.$column_name.'</th>';
		}
		foreach ($gototable as $row){
		    foreach($row as $col_name => $val){
 				$vallls .='<td>'.$val.'</td>';    
		     }
		    $vallls ='<tr>'.$vallls.'</tr>';
		}
	}

	$_SESSION['tabldatar'] = '<table class="table table-bordered" cellspacing="0"><caption style="caption-side:top;">'.$countfiles.' matches!</caption><thead><tr>'.$name.'</tr></thead><tbody>'.$vallls.'</tbody></table>';
	
	echo $_SESSION['tabldatar'];

}

if(isset($_POST['dawadu'])){
	$uniqidd = uniqid();
	$newProject = fopen("NewProject(".$uniqidd.").xls", "w");
	fwrite($newProject, $_SESSION['tabldatar']);
} 


?>
