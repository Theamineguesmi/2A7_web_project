<?PHP
include "carte.php";
include "../config.php";
class carteC {
function affichercarte ($carte){
        echo "nom : ".$carte->getnom ()."<br>";
        echo "prenom : ".$carte->getprenom()."<br>";
        echo "email: ".$carte->getemail()."<br>";
        echo "pointt: ".$carte->getpointt()."<br>";
        echo "idClient: ".$carte->getidClient()."<br>";
    }
    
    function ajoutercarte($carte){
        $sql="insert into carte (idClient,email,nom,prenom,pointt) values (:idClient,:email,:nom,:prenom,:pointt)";
        $db = config::getConnexion();
        try{
        $req=$db->prepare($sql);
        
        $nom=$carte->getnom();
        $prenom=$carte->getprenom();
        $email=$carte->getemail();
        $pointt=$carte->getpointt();
        $idClient=$carte->getidClient();



        $req->bindValue(':idClient',$idClient);
        $req->bindValue(':email',$email);
        $req->bindValue(':nom',$nom);
        $req->bindValue(':prenom',$prenom);
        $req->bindValue(':pointt',$pointt);

        
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
        
    }
    
    function affichercartes(){
        //$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
        $sql="SElECT * From carte";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }   
    }
    function deletecarte($email){
        $sql="DELETE FROM carte where email= :email";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':email',$email);
        try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function modifiercarte($ref,$new,$modwhat){

        if ($modwhat=="pointt") {
            $sql="UPDATE carte SET pointt=:input WHERE email=:ref";
        }

        
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':input',$new);
        $req->bindValue(':ref',$ref);

        try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
        }
        function recuperercarte($email){
        //$sql="SElECT * From client where email=$email";
        $sql="SELECT * from client where email='$email'";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function recuperercommande($idClient){
        //$sql="SElECT * From client where email=$email";
        $sql="SELECT * from commande where idClient='$idClient'";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
}
    

?>