<?php
namespace Controller;
use Model\StoresModel;
use Model\StoresRepository;

class StoresController extends Controller
{
	//0.0 Homemade API methods
	//0.1 Display stores map method
	function displayMap()
	{
		ob_start();
		require 'view/front/map.php';
		$content=ob_get_clean();
		require 'view/front/templateFront.php';
	}
	//0.2 Convert sql data to json format method
	function jsonStores()
	{
		$storesRepository= new StoresRepository;
		$stores= $storesRepository->getAllStores();
		header('Content-Type: application/json');
		header('Access-Control-Allow-Origin: *');
		echo json_encode($stores);
		exit;
	}

	//1.0 Create stores methods
	//1.1 Display create store form method
	function displayCreateStoreForm()
	{
		$this->isAdmin();
		ob_start();
		require 'view/back/storesCreate.php';
		$content=ob_get_clean();
		require 'view/back/templateAdmin.php';
	}
	//1.2 Create store method
	function createStore()
	{
		$this->isAdmin();
		$storesModel= new StoresModel();
		$storesModel->setStorename(htmlspecialchars($_POST['storename']));
		$storesModel->setSiret(htmlspecialchars($_POST['siret']));
		$storesModel->setAddress(htmlspecialchars($_POST['address']));
		$storesModel->setZipcode(htmlspecialchars($_POST['zipcode']));
		$storesModel->setCity(htmlspecialchars($_POST['city']));
		$storesModel->setLatitude(htmlspecialchars($_POST['lat']));
		$storesModel->setLongitude(htmlspecialchars($_POST['lng']));
		$storesModel->setWebsite(htmlspecialchars($_POST['website']));
		$storesModel->setPhone(htmlspecialchars($_POST['phone']));
		$storesModel->setEmail(htmlspecialchars($_POST['email']));
		$storesModel->setGenre(htmlspecialchars($_POST['genre']));
		$storesRepository= new StoresRepository;
		$createStore= $storesRepository->createStore($storesModel);
		var_dump($storesModel);
		/*$this->redirect('index.php?action=StoresController-displayAllStores');*/
	}

	//2.0 Read stores methods
	//2.1 Display All Stores in admin panel
	function displayAllStores()
	{
	    $this->isAdmin();
	    $storesRepository= new StoresRepository;
		$stores= $storesRepository->getAllStores();
		ob_start();
		require 'view/back/storesRead.php';
		$content=ob_get_clean();
		require 'view/back/templateAdmin.php';
	}

	//3.0 Update stores methods
	//3.1 Display stores update form
	function displayUpdateStore()
	{
		$this->isAdmin();
		$storesRepository= new StoresRepository();
		$store= $storesRepository->getStore($_GET['id']);
		ob_start();
		require 'view/back/storesUpdate.php';
		$content=ob_get_clean();
		require 'view/back/templateAdmin.php';

	}
	//3.2 Update stores method
	function updateStore()
	{
		$this->isAdmin();
		$storesModel= new StoresModel();
		$storesModel->setId($_GET['id']);
		$storesModel->setStorename(htmlspecialchars($_POST['storename']));
		$storesModel->setSiret(htmlspecialchars($_POST['siret']));
		$storesModel->setAddress(htmlspecialchars($_POST['address']));
		$storesModel->setZipcode(htmlspecialchars($_POST['zipcode']));
		$storesModel->setCity(htmlspecialchars($_POST['city']));
		$storesModel->setLatitude(htmlspecialchars($_POST['lat']));
		$storesModel->setLongitude(htmlspecialchars($_POST['lng']));
		$storesModel->setWebsite(htmlspecialchars($_POST['website']));
		$storesModel->setPhone(htmlspecialchars($_POST['phone']));
		$storesModel->setEmail(htmlspecialchars($_POST['email']));
		$storesModel->setGenre(htmlspecialchars($_POST['genre']));
		$storesRepository= new StoresRepository();
		$storesRepository->updateStore($storesModel);
		$this->redirect('index.php?action=StoresController-displayAllStores');
	}

	//4.0 Delete stores methods
	//4.1 Delete store methods
	function deleteStore()
	{
		$this->isAdmin();
		$storesRepository= new StoresRepository();
		$store= $storesRepository->getStore($_GET['id']);
		$storesRepository->deleteStore($store);
		$this->redirect('index.php?action=StoresController-displayAllStores');
	}
	
}

