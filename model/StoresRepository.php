<?php
namespace Model;
use\PDO;

class StoresRepository extends ParentModel
{
	//StoresRepository
	//1.0 Create store methods
	//1.1 Create a new store method
	public function createStore($store)
	{
		$createStore= $this->db->prepare('INSERT INTO stores (storename, siret, address, zipcode, city, lat, lng, phone, email, website, genre) VALUES (:storename, :siret, :address, :zipcode, :city, :lat, :lng, :phone, :email, :website, :genre)');
		$createStore->bindParam(":storename", $store->getStorename(), PDO::PARAM_STR);
		$createStore->bindParam(":siret", $store->getSiret(), PDO::PARAM_STR);
		$createStore->bindParam(":address", $store->getAddress(), PDO::PARAM_STR);
		$createStore->bindParam(":zipcode", $store->getZipcode(), PDO::PARAM_INT);
		$createStore->bindParam(":city", $store->getCity(), PDO::PARAM_STR);
		$createStore->bindParam(":lat", $store->getLatitude(), PDO::PARAM_STR);
		$createStore->bindParam(":lng", $store->getLongitude(), PDO::PARAM_STR);
		$createStore->bindParam(":phone", $store->getPhone(), PDO::PARAM_STR);
		$createStore->bindParam(":email", $store->getEmail(), PDO::PARAM_STR);
		$createStore->bindParam(":website", $store->getWebsite(), PDO::PARAM_STR);
		$createStore->bindParam(":genre", $store->getGenre(), PDO::PARAM_STR);
		$createStore->execute();
		return $createStore;
	}

	//2.0 Read stores method
	//2.1 Get all stores method
	public function getAllStores()
	{
		$req= $this->db->prepare('SELECT id, storename, siret, address, zipcode, city, lat, lng, phone, email, website, genre FROM stores ORDER BY storename ASC');
		$req->execute();
		$result= $req->fetchAll();
		$stores= [];
		foreach ($result as $store){
			$storesModel= new StoresModel();
			$storesModel->setId($store['id']);
			$storesModel->setStorename($store['storename']);
			$storesModel->setSiret($store['siret']);
			$storesModel->setAddress($store['address']);
			$storesModel->setZipcode($store['zipcode']);
			$storesModel->setCity($store['city']);
			$storesModel->setLatitude($store['lat']);
			$storesModel->setLongitude($store['lng']);
			$storesModel->setPhone($store['phone']);
			$storesModel->setEmail($store['email']);
			$storesModel->setWebsite($store['website']);
			$storesModel->setGenre($store['genre']);
			$stores []= $storesModel;
		}

		return $stores;
	}
	//2.1 Get one specific store method
	public function getStore($id)
	{
		$req= $this->db->prepare('SELECT * FROM stores WHERE id=:id');
		$req->bindParam(':id', $id, PDO::PARAM_INT);
		$req->execute();
		$result= $req->fetch();
		$storesModel= new StoresModel();
		$storesModel->setId($result['id']);
		$storesModel->setStorename($result['storename']);
		$storesModel->setSiret($result['siret']);
		$storesModel->setAddress($result['address']);
		$storesModel->setZipcode($result['zipcode']);
		$storesModel->setCity($result['city']);
		$storesModel->setLatitude($result['lat']);
		$storesModel->setLongitude($result['lng']);
		$storesModel->setPhone($result['phone']);
		$storesModel->setEmail($result['email']);
		$storesModel->setWebsite($result['website']);
		$storesModel->setGenre($result['genre']);
		$store= $storesModel;

		return $store;
	}
	//2.2 Count numbers of stores method
	public function getStoresCount(){
        $req = $this->db->prepare("SELECT COUNT(id) as storesNb FROM stores");
        $req->execute();
        $storesNb= $req->fetch(); 
        return $storesNb;    
    }

	//3.0 Update stores methods
	//3.1 Update store mehod
	public function updateStore($store)
	{
		$updateStore= $this->db->prepare('UPDATE stores 
										  SET storename=:storename, siret=:siret, address=:address, zipcode=:zipcode, city=:city, lat=:lat, lng=:lng, phone=:phone, email=:email, website=:website, genre=:genre 
										  WHERE id=:id');
		$updateStore->bindParam(":id", $store->getId(), PDO::PARAM_STR);
		$updateStore->bindParam(":storename", $store->getStorename(), PDO::PARAM_STR);
		$updateStore->bindParam(":siret", $store->getSiret(), PDO::PARAM_STR);
		$updateStore->bindParam(":address", $store->getAddress(), PDO::PARAM_STR);
		$updateStore->bindParam(":zipcode", $store->getZipcode(), PDO::PARAM_INT);
		$updateStore->bindParam(":city", $store->getCity(), PDO::PARAM_STR);
		$updateStore->bindParam(":lat", $store->getLatitude(), PDO::PARAM_STR);
		$updateStore->bindParam(":lng", $store->getLongitude(), PDO::PARAM_STR);
		$updateStore->bindParam(":phone", $store->getPhone(), PDO::PARAM_STR);
		$updateStore->bindParam(":email", $store->getEmail(), PDO::PARAM_STR);
		$updateStore->bindParam(":website",$store->getWebsite(), PDO::PARAM_STR);
		$updateStore->bindParam(":genre", $store->getGenre(), PDO::PARAM_STR);
		$updateStore->execute();

		return $updateStore;
	}

	//4.0 Delete stores methods
	//4.1 Delete store methods
	public function deleteStore($id)
	{
		$deleteStore= $this->db->prepare('DELETE FROM stores WHERE id=:id');
		$deleteStore->bindParam(":id", $id->getId(), PDO::PARAM_INT);
		$deleteStore->execute();
		return $deleteStore;
	}


}	