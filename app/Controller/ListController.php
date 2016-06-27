<?php /* app/Model/CommentModel.php */
namespace Controller;

use \W\Controller\Controller;
use \Model\ListModel as ListModel;
use \Model\CardsModel as CardsModel;
use \Controller\EventController;

class ListController extends Controller
{

	/**
	 * Génère une liste
	 */
	public function addList() {
		$post = [];
		$inputMaxLength = 151; // restrict list name length

		if(!empty($_POST)) {
			// clean received data
			foreach ($_POST as $key => $value) {
				$post[$key] = trim(strip_tags($value));
			}
			// if our name input exists in correst state
			if(isset($post['newList']) && !empty($post['newList']) && strlen($post['newList']) < $inputMaxLength) {
				$user = $this->getUser();
				$id = $user['id'];
				// create variable to prevent empty insertions
				$listName = $post['newList'];
				$timestamp = date('Y-m-d H:i:s');
				//form data to insert to the database
				$entryData = [
					'title' 		=> $listName,
				  'id_event' 	=> $id,
				  'date_add'	=> $timestamp,
				];
				// call model
				$insertList = new ListModel();
				// insert
				if($insertList->insert($entryData)) {
					$this->showJson(['answer' => 'success']);
				}
			}
		}
	}

	/**
	 * Ajoute une chexbox
	 */
	public function addCard() {
		$post = [];
		$errors = [];
		$inputMaxLength = 151; // restrict list name length
		$responsible = 0;

		if(!empty($_POST)) {

			// clean received data
			foreach ($_POST as $key => $value) {
				$post[$key] = trim(strip_tags($value));
			}
			// if our name input exists in correst state
			if(!isset($post['card_title']) && empty($post['card_title']) && strlen($post['card_title']) > $inputMaxLength) {
				$errors[] = 'Titre de la tache est incorrect';
			}
			if(!isset($post['card_desc']) && empty($post['card_desc']) && strlen($post['card_desc']) > $inputMaxLength) {
				$errors[] = 'Description de la tache est incorrect';
			}
			if(!isset($post['card_quantity']) && empty($post['card_quantity']) && !intval($post['card_quantity'])) {
				$errors[] = 'Qantite de la tache est incorrect';
			}
			if(!isset($post['card_price']) && empty($post['card_price']) && !intval($post['card_price'])) {
				$errors[] = 'Prix de la tache est incorrect';
			}
			if(count($errors) == 0) {
				$user = $this->getUser();
				$id = $user['id'];
				// create variable to prevent empty insertions
				$responsible = $post['card_person'];
				$timestamp = date('Y-m-d H:i:s');
				//form data to insert to the database
				$entryData = [
					'title' 			=> $post['card_title'],
				  'description' => $post['card_desc'],
				  'quantity' 		=> $post['card_quantity'],
				  'price' 			=> $post['card_price'],
				  'id_user' 		=> $responsible,
					//'id_list' 	=> $idList,
				  'id_event' 		=> $id,
				  'date_add'		=> $timestamp,
				];
				// call model
				$insertList = new CardsModel();
				// insert
				if($insertList->insert($entryData)) {
					$this->showJson(['answer' => 'success']);
				}
			}
		}
	}

	/**
	 * Récupere les listes
	 */
	public function getList() {

		$id = $_POST['eventId'];

		if(isset($_POST['myDate']) && !empty($_POST['myDate'])) {
			$lastDate = $_POST['myDate'];
		} else {
			$lastDate = 0;
		}
		$lastDateLists = null;
		$lastDateCards = null;

		$listsData = new ListModel();
		$newLists = $listsData->findLists($id, $lastDate);
 		$newCards = $listsData->findCards($id, $lastDate);

		if(!empty($newLists)) {
			$lastDateLists = end($newLists)['date_add'];
		}
		if(!empty($newCards)) {
			$lastDateCards = end($newCards)['date_add'];
		}
		if($lastDateLists != null && $lastDateCards != null) {
			if($lastDateLists > $lastDateCards) {
				$lastDate = $lastDateLists;
			}
			else {
				$lastDate = $lastDateCards;
			}
		}
		elseif($lastDateLists == null && $lastDateCards != null) {
			$lastDate = $lastDateLists;
		}
		elseif($lastDateLists != null && $lastDateCards == null) {
			$lastDate = $lastDateCards;
		}
		$this->showJson(['newList' => $newLists, 'newCard' => $newCards, 'newDate' => $lastDate]);
	}
}
