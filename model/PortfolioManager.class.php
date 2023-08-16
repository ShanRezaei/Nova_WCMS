
<?php
/**
	 * Class DbManager
	 * Handles all Content queries CRUD (Create ReadOne ReadAll Update Delete)
	 */
class PortfolioManager extends DbConnector {

//get all content
public function getAllProduct(){
    $product_obj = array();
    // query to get all users comments from posts db
    $query = $this->db->query("SELECT id,img,name,text FROM portfolio ;");
    $products = $query->fetchAll(PDO::FETCH_ASSOC);

   
        foreach ( $products as $obj ) {
            $product_obj[] = new Portfolio( $obj["id"],$obj["img"],$obj["name"],$obj["text"]);
        }

        return $product_obj;

    
   
   

}


//add new content
public function addNewProduct(Portfolio $portfolio){
    
    // query to add new product db
    $query=$this->db->prepare("INSERT INTO `portfolio`( `img`, `name`, `text`) VALUES (?,?,?)");
    $query->execute(array(
        $portfolio->getImg(),
        $portfolio->getName(),
        $portfolio->getText(),
    
    ));
    
    $result = $query->fetchAll();
    return $result;

}











}




?>




































































