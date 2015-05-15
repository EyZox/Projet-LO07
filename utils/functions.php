<?php
function build_template($content,  $params=null, $nav=TRUE) {
	global $flashbag;

	if(empty($params['title'])) {
		$params['title'] = 'Projet-LO07';
	}

	if(empty($params['user'])) {
		$params['user'] = getUser();
	}
	include ROOT.'tpl/head.php';
	include ROOT.'tpl/header.php';
	?>
	<div id="wrapper-body">
		<?php if($nav) include ROOT.'tpl/nav.php';?>
		<div id="wrapper-content-out">
			<div id="wrapper-content-in">
				<section id="content">
					<?php 
						if(!is_array($content)) $content = array($content);
						foreach ($content as $tpl) {
							include ROOT.'tpl/'.$tpl;
						}
					?>
				</section>
			</div>
		</div>
		<div class="clear-both"></div>
	</div>
	<?php include ROOT.'tpl/footer.php';
}

function isAuth() {
	return isset($_SESSION['UID']) && $_SESSION['UID'];
}

function getUser($id = null) {
	global $DB;
	require_once ROOT.'utils/sql.php';
	
	
	if($id == null) {
		if(isAuth()) {
			$id = $_SESSION['UID'];
		}else {
			return array();
		}
	}

	$stmt = $DB->prepare('SELECT * FROM individu WHERE id=?');
	$stmt->execute(array($id));
	$user = $stmt->fetch(PDO::FETCH_ASSOC);
	if($user) {
		$user['pass'] = '';
		if(!$user['photo']) {
			$user['photo'] = ROOT_URL.'img/avatar/'.$user['id'];
		}
		return $user;
	}else {
		return array();
	}
}

function getVehicule($id=null) {
	global $DB;
	require_once ROOT.'utils/sql.php';
	
	
	if($id == null) {
		if(isAuth()) {
			$id = $_SESSION['UID'];
		}else {
			return array();
		}
	}
	
	$stmt = $DB->prepare('SELECT * FROM vehicule WHERE conducteur=?');
	$stmt->execute(array($id));
	return $stmt->fetch(PDO::FETCH_ASSOC);
	
}

function validateAvatar(&$bdd_param) {
	if (! empty ( $_POST ['avatar-input'] )) {
		if ($_POST ['avatar-input'] == 'file' && ! empty ( $_FILES ['avatar-file'] )) {
			if ($_FILES ['avatar-file'] ['error'] !== UPLOAD_ERR_OK) {
				$_SESSION ['flashbag'] ['error'] = 'Echec de l\'envoie de l\'image (errcode: ' . $_FILES ['avatar-file'] ['error'] . ')';
			} else {
				$info = getimagesize ( $_FILES ['avatar-file'] ['tmp_name'] );
				if ($info === FALSE || (($info [2] !== IMAGETYPE_GIF) && ($info [2] !== IMAGETYPE_JPEG) && ($info [2] !== IMAGETYPE_PNG))) {
					$_SESSION ['flashbag'] ['error'] = 'Ce format d\'image n\'est pas supporté';
				} else if ($_FILES ['avatar-file'] ['size'] > 2000000 /*2Mo*/){
					$_SESSION ['flashbag'] ['error'] = 'La taille du fichier est trop grande (Max : 2 Mo)';
				} else {
					move_uploaded_file ( $_FILES ['avatar-file'] ['tmp_name'], ROOT . 'img/avatar/' . $_SESSION ['UID'] );
					$bdd_param = PDO::PARAM_NULL;
					return true;
				}
			}
		}elseif (! empty ( $_POST ['avatar-url'] )) {
			$bdd_param = htmlspecialchars ( $_POST ['avatar-url'] );
			return true;
		}
	}
	return false;
}
?>