<?php
include('install_db.php');

class SHOWDOWN
{

    public function SetUPQuery($state)
    {
        try {
            $pdo = INSTALLSYS::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "$state";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo "failed: " . $e->getMessage() . "\n";
            exit;
        }
    }


}


?>