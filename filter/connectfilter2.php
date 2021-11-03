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

if(isset($_POST['tabll']) && isset($_POST['vals']) && isset($_POST['ca1'])){
	echo $dt->get_dbres($cats = $_POST['ca1'],$vals = $_POST['vals'],$table = $_POST['tabll']);
}

if(isset($_POST['dawadu'])){
	$uniqidd = uniqid();
	$newProject = fopen("NewProject(".$uniqidd.").xls", "w");
	fwrite($newProject, $_SESSION['tabldatar']);
} 


?>
