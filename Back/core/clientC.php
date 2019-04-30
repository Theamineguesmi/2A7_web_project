<?PHP
include "client.php";
include "config.php";
class clientC {
function afficherclient ($client){
		echo "nom : ".$client->getnom ()."<br>";
		echo "prenom : ".$client->getprenom()."<br>";
		echo "email: ".$client->getemail()."<br>";
		echo "date: ".$client->getdate()."<br>";
		echo "mdp : ".$client->getmdp()."<br>";
	}
	
	function ajouterclient($client){
		$sql="insert into client (nom,prenom,email,date,mdp) values (:nom,:prenom,:email,:date,:mdp)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
        
		$nom=$client->getnom();
        $prenom=$client->getprenom();
		$email=$client->getemail();
		$date=$client->getdate();
		$mdp=$client->getmdp();


		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':email',$email);
		$req->bindValue(':date',$date);
		$req->bindValue(':mdp',$mdp);

		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherclients(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From client";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function deleteclient($email){
		$sql="DELETE FROM client where email= :email";
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
        function modifierclient($ref,$new,$modwhat){
        if ($modwhat=="nom") {
            $sql="UPDATE client SET nom=:input WHERE email=:ref";
        }
        if ($modwhat=="prenom") {
            $sql="UPDATE client SET prenom=:input WHERE email=:ref";
        }
        if ($modwhat=="email") {
            $sql="UPDATE client SET email=:input WHERE email=:ref";
        }
        if ($modwhat=="mdp") {
            $sql="UPDATE client SET mdp=:input WHERE email=:ref";
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


	
}

?>