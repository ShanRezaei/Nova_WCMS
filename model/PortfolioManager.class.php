
<?php
/**
	 * Class DbManager
	 * Handles all Content queries CRUD (Create ReadOne ReadAll Update Delete)
	 */
class PortfolioManager extends DbConnector {

//get all content
public function getAllProduct(){
    $product_obj = array();
    // query to get all content db
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



//delete
public function deleteProduct(int $id){
    
    // query to delete new product db
    $query=$this->db->prepare("DELETE FROM `portfolio` WHERE `id`=?");
    $query->execute(array( $id));
    
    $result = $query->fetchAll();
    return $result;

}


//return row count
public function countProduct(){
    
    // query to count product db
    $query=$this->db->prepare("SELECT * FROM `portfolio`");
    $query->execute();
    
   
    return $query;

}

// update one
public function updatePortfolio(Portfolio $portfolio){
    $query1 = $this->db->prepare("UPDATE `portfolio` SET `img`=?,`name`=?,`text`=? WHERE `id`=?;") ;
    $query1->execute(array(
        $portfolio->getImg(),
        $portfolio->getName(),
        $portfolio->getText(),
        $portfolio->getId(),
         

    ));

    $result1 = $query1->fetchAll();
    return $result1;

}

//update two
public function updatePortfoliotwo(Portfolio $portfolio){
    $query1 = $this->db->prepare("UPDATE `portfolio` SET `name`=?,`text`=? WHERE `id`=?;") ;
    $query1->execute(array(
       
        $portfolio->getName(),
        $portfolio->getText(),
        $portfolio->getId(),
         

    ));

    $result1 = $query1->fetchAll();
    return $result1;

}




}




?>




































































